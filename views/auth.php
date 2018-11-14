<div class="container auth">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post">
                <div class="form-group">
                   <input type="text" name="login" class="form-control" placeholder="login" value="<?= !empty($_SESSION['errorAuth']) || !empty($_SESSION['errorAuthEmpty']) ? $_POST['login'] : '';?>" /><br/>
                   <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="pass" /><br/>
                    <h3><span class="badge badge-danger"><?php if(!empty($_SESSION['errorAuth'])){ echo $_SESSION['errorAuth'];}elseif(!empty($_SESSION['errorAuthEmpty'])){ echo $_SESSION['errorAuthEmpty'];}?></span></h3><br/>
                    <button type="submit" class="btn btn-success" name="sub">Войти</button>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
