<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/views/style/style.css" type='text/css'>
    <link rel="stylesheet" href="/views/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css" type='text/css'>

    <link rel="stylesheet" href="/views/libs/bootstrap/css/bootstrap.min.css" type='text/css'>

    <title>Document</title>
    <script src="/views/js/main.js" type="text/javascript"></script>
    <script src="/views/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/ckeditor/ckeditor.js" type="text/javascript"></script>


    <script src="/views/libs/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="/views/libs/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="head">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="/index.php/?route=auth">Тестовый проект</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                    <?php if($_SESSION['auth'] == 'Admin'){?>
                <li class="nav-item">
                        <a class="nav-link" href="/index.php/?route=timetable">Расписание</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="/index.php/?route=admin">Создать новую страницу</a>
                </li>
                    <?php }?>

                <?php if(empty($_SESSION['auth'])){?>
                            <li class="nav-item">
                                <a class="nav-link" href="/index.php/?route=auth">Войти</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/index.php/?route=registration">Зарегистрироваться</a>
                            </li>
                <?php }else{?>
                    <?php
                        if(!empty($data)){
                            foreach ($data as $infoPage){?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/index.php/?route=<?= $infoPage['url']?>"><?= $infoPage['title']?></a>
                                </li>
                    <?php   }
                         }?>


                            <li class="nav-item">
                                <form method="post">
                                    <input type="submit" class="btn btn-primary btn-outline-danger" name="exit" value="Выйти">
                                </form>
                            </li>
                <?php }?>
            </ul>
        </div>
    </nav>

</div>


