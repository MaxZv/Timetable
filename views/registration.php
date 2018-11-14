<div class="container form">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
    <form method="post">
        <h3><span class="badge badge-danger"><?= !empty($_SESSION['errorRegEmpty']) ? $_SESSION['errorRegEmpty'] : '';?></span></h3>
        <div class="form-group">
            <input type="text" name="login" class="form-control" placeholder="login" value="<?= empty($_SESSION['errorRegLoginLen']) && empty($_SESSION['errorRegRepeatLogin']) ? $_POST['login'] : '';?>" /><br/>
            <h3><span class="badge badge-danger"><?php if(!empty($_SESSION['errorRegLoginLen'])){ echo $_SESSION['errorRegLoginLen'];}elseif(!empty($_SESSION['errorRegRepeatLogin'])){ echo $_SESSION['errorRegRepeatLogin'];} ?></span></h3>

            <input type="password" name="password" class="form-control" placeholder="password" value="<?= empty($_SESSION['errorRegPassLen']) ? $_POST['password'] : '';?>" /><br/>
            <h3><span class="badge badge-danger"><?= !empty($_SESSION['errorRegPassLen']) ? $_SESSION['errorRegPassLen'] : '';?></span></h3>

            <input type="email" name="email" class="form-control" placeholder="email" value="<?= empty($_SESSION['errorRegEmail']) && empty($_SESSION['errorRegRepeatEmail']) ? $_POST['email'] : '';?>" /><br/>
            <h3><span class="badge badge-danger"><?php if(!empty($_SESSION['errorRegEmail'])){ echo $_SESSION['errorRegEmail'];}elseif(!empty($_SESSION['errorRegRepeatEmail'])){ echo $_SESSION['errorRegRepeatEmail'];} ?></span></h3>

            <input type="text" name="name" class="form-control" placeholder="name" value="<?= !empty($_POST['name']) ? $_POST['name'] : '';?>"/><br/>

            <input type="date"  name="birth" class="form-control" placeholder="birth" value="<?= !empty($_POST['birth']) ? $_POST['birth'] : '';?>"/><br/>
            <select name="country" size="1" class="form-control">
                <option label="Выберите страну"></option>
                <?php
                    foreach ($data as $country){?>
                        <option value="<?= $country['id'];?>" <?= !empty($_POST['country']) ? 'selected' : '';?>><?= $country['name'];?></option>
                <?php }?>
            </select><br/>
            <h3><span class="badge badge-danger"><?= !empty($_SESSION['errorRegEmpty']) ? $_SESSION['errorRegEmpty'] : '';?></span></h3>
            <input type="checkbox" name="agree"  id="agree"> <label for="agree">Я согласен с условиями</label><br/>
            <h3><span class="badge badge-danger"><?= !empty($_SESSION['errorRegAgree']) ? $_SESSION['errorRegAgree'] : '';?></span></h3>
            <button type="submit" class="btn btn-success" name="reg">Зарегистрироваться</button>
        </div>
    </form>

        </div>
        <div class="col-md-4"></div>
    </div>
</div>
