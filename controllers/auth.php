<?php
unset ($_SESSION['auth']);
unset($_SESSION['errorAuth']);
unset($_SESSION['errorAuthEmpty']);;

Request::model('user');
$user = new User();
if(isset($_POST['sub'])) {
    $user->validAuth($_POST['login'], $_POST['password']);
    if (!empty($_SESSION['auth']) && $_SESSION['auth'] != 'Admin') {
        header('Location: /index.php?route=timetable');
    } elseif ($_SESSION['auth'] == 'Admin') {
        header('Location: /index.php/?route=admin');
    }

}

Request::header();
Request::view('auth');