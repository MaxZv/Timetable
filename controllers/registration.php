<?php
Request::model('user');
$regUser = new User();
if(isset($_POST['reg'])){
    $regUser->validReg($_POST['login'], $_POST['password'], $_POST['email'], $_POST['name'], $_POST['birth'], $_POST['country'], $_POST['agree']);
    if(empty($_SESSION['errorRegLoginLen']) && empty($_SESSION['errorRegPassLen']) && empty($_SESSION['errorRegEmail']) && empty($_SESSION['errorRegAgree']) && empty($_SESSION['errorRegEmpty']) && empty($_SESSION['errorRegRepeatLogin']) && empty($_SESSION['errorRegRepeatEmail'])){
        header('Location: /index.php/?route=auth');
    }
}

Request::header();
Request::view('registration', $regUser->getCountries());
unset($_SESSION['errorRegLoginLen']);
unset($_SESSION['errorRegPassLen']);
unset($_SESSION['errorRegEmail']);
unset($_SESSION['errorRegAgree']);
unset($_SESSION['errorRegEmpty']);
unset($_SESSION['errorRegRepeatLogin']);
unset($_SESSION['errorRegRepeatEmail']);
?>