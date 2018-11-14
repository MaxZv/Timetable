<?php
class User{
    public function validAuth($login, $password){
        $login = trim($login);
        $password = trim(md5($password));
        if(!empty($login) && !empty($password)){
            foreach ($this->getUser() as $user){
                if(($login == $user['login'] || $login == $user['email']) && $password === $user['password']){
                     $_SESSION['auth'] = $user['name'];
                }else{

                     $_SESSION['errorAuth'] = 'Неправильный логин или пароль';
                }
            }
        }else{
            return $_SESSION['errorAuthEmpty'] = 'Заполните поля логин и Пароль';
        }
    }
    public function validReg($login, $password, $email, $name, $birth, $country, $agree){
        $login = trim($login);
        $password = trim($password);
        $email = trim($email);
        $name = trim($name);
        if(!empty($login && $password && $email && $name && $birth && $country )){
            if($agree == true){
                if(strlen($login)<5){
                    $_SESSION['errorRegLoginLen'] = 'Логин слишком короткий';
                }
                if(strlen($password)<8){
                    $_SESSION['errorRegPassLen'] = 'Пароль слишком короткий';
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['errorRegEmail'] = 'Ваш email не соответсвует стандарту';
                }
                foreach ($this->getUser() as $user){
                   if($login == $user['login']){
                       $_SESSION['errorRegRepeatLogin'] = 'Такой логин уже используется';
                   }
                   if($email == $user['email']){
                       $_SESSION['errorRegRepeatEmail'] = 'Такой email уже используется';
                   }
                }
                if(empty($_SESSION['errorRegRepeatLogin'] || $_SESSION['errorRegRepeatEmail'])) {

                    if (empty($_SESSION['errorRegLoginLen']) && empty($_SESSION['errorRegPassLen']) && empty($_SESSION['errorRegEmail'])) {
                        $userInfo = array(
                            'login' => $login,
                            'pass' => md5($password),
                            'email' => $email,
                            'name' => $name,
                            'birth' => $birth,
                            'country' => $country
                        );
                        $this->insertUserInfo($userInfo);
                    }


                }elseif($_SESSION['errorRegRepeatLogin']){
                    return $_SESSION['errorRegRepeatLogin'];
                }elseif ($_SESSION['errorRegRepeatEmail']){
                    return $_SESSION['errorRegRepeatEmail'];
                }
            }else{
                return $_SESSION['errorRegAgree'] = 'Для регистрации необходимо ознакомиться с условиями и принять соглашение';
            }
        }else{
            return $_SESSION['errorRegEmpty'] = 'Заполните поля';
        }
    }

    public function insertUserInfo($info){
        $sqlUserInfo = "INSERT INTO user SET email='".$info['email']."', login='".$info['login']."', password='".$info['pass']."', name='".$info['name']."', birth='".$info['birth']."', country_id='".$info['country']."', reg_date = '..'";
        mysqli_query(ConDB::connect(), $sqlUserInfo);
    }
    public function getUser(){
        $getUser = "SELECT login, password, name, email FROM user";
        $query = mysqli_query(ConDB::connect(), $getUser);
        while($res[] = mysqli_fetch_assoc($query)){
            $authUser = $res;
        }
        return $authUser;
    }
    public function getCountries(){
       $sqlGetCountries = "SELECT * FROM countries";
       $query = mysqli_query(ConDB::connect(), $sqlGetCountries);
       while($res[] = mysqli_fetch_assoc($query)){
           $countries = $res;
       }
       return $countries;
    }

}