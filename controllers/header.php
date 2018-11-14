<?php
Request::model('links');
$infoPage = new Links();
if(isset($_POST['exit'])){
    unset($_SESSION['auth']);
    header('Location: /index.php/?route=auth');
}
Request::view('header', $infoPage->links());
