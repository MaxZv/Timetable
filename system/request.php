<?php
class Request{
    public static function view($name, $data=''){
        return require_once $_SERVER['DOCUMENT_ROOT'].'/views/' .$name. '.php';
    }

    public static function model($name, $data=''){
        return require_once $_SERVER['DOCUMENT_ROOT'].'/models/' .$name. '.php';
    }

    public static function controller($name, $data=''){
        return require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/' .$name. '.php';
    }

    public static function header($data=''){
        return require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/header.php';
    }

    public static function footer($data=''){
        return require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/footer.php';
    }

    public static function viewAdmin($data=''){
        return require_once $_SERVER['DOCUMENT_ROOT'].'/views/admin/admin.php';
    }

}
?>