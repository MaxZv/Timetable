<div class="container form">
    <div class="row">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <select name="chooseCouriers" class="form-control">
                        <option>Выберите курьера</option>
                        <?php foreach ($data['couriers'] as $courier){?>
                            <option value="<?= $courier['id']?>" <?= $_POST['chooseCouriers'] == $courier['id'] ? 'selected' : '';?>><?= $courier['cour_name']?></option>
                        <?php }?>
                    </select><br/>
                    <select name="chooseDestination" class="form-control">
                        <option>Выберите пункт назначения</option>
                        <?php foreach ($data['destinations'] as $destination){?>
                            <option value="<?= $destination['id']?>" <?= $_POST['chooseDestination'] == $destination['id'] ? 'selected' : '';?>><?= $destination['dest_name']?></option>
                        <?php }?>
                    </select><br/>

                    <h5><span class="badge badge-danger"><?php
                            if(!empty($_SESSION['errorDate'])){
                                echo $_SESSION['errorDate'];
                            }elseif(!empty($_SESSION['errorWorkingTime'])){
                                echo $_SESSION['errorWorkingTime'];
                            }elseif(!empty($_SESSION['errorCourBusy'])){
                                echo $_SESSION['errorCourBusy'];
                            }
                            ?></span></h5>

                    <label for="startDateTime">Дата начала</label>
                    <input type="datetime-local" id="startDateTime" name="startDateTime" class="form-control" value="<?= empty($_SESSION['errorBusy']) && empty($_SESSION['errorDate']) && empty($_SESSION['errorWorkingTime']) && !empty($_POST['startDateTime']) ? $_POST['startDateTime'] : '';?>"/>
                    <label for="endDateTime">Дата завершения</label>
                    <input type="datetime-local" id="endDateTime" name="endDateTime" class="form-control" value="<?= empty($_SESSION['errorBusy']) && empty($_SESSION['errorDate']) && empty($_SESSION['errorWorkingTime']) && !empty($_POST['endDateTime']) ? $_POST['endDateTime'] : '';?>"/><br/>

                <h3><span class="badge badge-danger"><?= !empty($_SESSION['errorCreateNewInfoEmpty']) ? $_SESSION['errorCreateNewInfoEmpty'] : '';?></span></h3>
                    <button type="submit" name="insertCourInfo" class="btn btn-success">Добавить</button>
                </div>
            </form>
            <br/>
        </div>

        <div class="col-md-6">

            <form method="post">
                <h5><span class="badge badge-warning">Для фильтрации по дате выберите один из предложенных вариантов</span></h5>
                <label for="filterStartDate">Фильтр по дате начала</label>
                <input type="date" id="filterStartDate" class="form-control" name="filterStartDate" />
                <label for="filterEndDate">Фильтр по дате завершения</label>
                <input type="date" id="filterEndDate" class="form-control" name="filterEndDate" /><br/>
                <button type="submit" class="btn btn-success">Фильтровать</button>
            </form><br/>
            <form method="post">
                <button class="btn btn-warning" type="submit" name="refreshTable">Обновить таблицу</button>
            </form>
<table class="table table-primary">
    <tr>
        <td>Курьер</td>
        <td>Пункт назначения</td>
        <td width="170px">Дата начала</td>
        <td width="170px">Дата завершения</td>
    </tr>
    <?php
        if(!empty($data['info'])) {
            foreach ($data['info'] as $info) { ?>
                <tr>
                    <td scope="row"><?= $info['cour_name'] ?></td>
                    <td><?= $info['dest_name'] ?></td>
                    <td width="170px"><?= $info['datetime_start'] ?></td>
                    <td width="170px"><?= $info['datetime_end'] ?></td>
                </tr>

                <?php
            }
        }?>
</table>
        </div>
    </div>
</div>



