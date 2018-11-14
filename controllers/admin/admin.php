<?php
if($_SESSION['auth'] != 'Admin'){
    header('Location:/index.php/?route=404');
}
Request::model('admin');
$admin = new PageControl();
if(isset($_POST['createPage'])) {
    $admin->validCreatePage($_POST['title'], $_POST['meta'], $_POST['content'], $_POST['url']);
    header('Location:/index.php/?route=admin');
}
if(!empty($admin->getAllPages())){
    foreach ($admin->getAllPages() as $page){
        $pageData[] = array(
            'url' => $page['url'],
            'title' => $page['title']
        );
    }
}



if(isset($_POST['deletePage']) && !empty($_POST['page'])){
    $admin->deletePage($_POST['page']);
    header('Location:/index.php/?route=admin');
}
Request::header();
Request::viewAdmin($pageData);
unset( $_SESSION['errorUrl']);
unset( $_SESSION['errorNewPageEmpty']);
?>