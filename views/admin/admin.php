<div class="container form">
    <div class="row">
        <div class="col-md-6">
<form method="post">
    <div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="title" value="<?= !empty($_POST['title']) ? $_POST['title'] : '';?>"/><br/>
        <input type="text" name="meta" class="form-control" placeholder="meta description" value="<?= !empty($_POST['meta']) ? $_POST['meta'] : '';?>"/><br/>
        <textarea name="content" class="form-control"><?= !empty($_POST['content']) ? $_POST['content'] : '';?></textarea>
        <input type="text" name="url" class="form-control" placeholder="url" value="<?= empty($_SESSION['errorUrl']) && !empty($_POST['url']) ? $_POST['url'] : '';?>" /><br/>
        <h3><span class="badge badge-danger"><?= !empty($_SESSION['errorUrl']) ? $_SESSION['errorUrl'] : '';?></span></h3>
        <button type="submit" class="btn btn-success" name="createPage">Создать страницу</button>
        <h3><span class="badge badge-danger"><?= !empty($_SESSION['errorNewPageEmpty']) ? $_SESSION['errorNewPageEmpty'] : '';?></span></h3>
    </div>
</form>


        </div>
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <select name="page" class="form-control">
                        <option>Выберите страницу</option>
                        <?php foreach ($data as $page){?>
                            <option value="<?= $page['url'];?>"><?= $page['title'];?></option>
                        <?php }?>
                    </select><br/>
                    <button type="submit" class="btn btn-danger" name="deletePage">Удалить страницу</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace("content");
</script>

<?php
?>