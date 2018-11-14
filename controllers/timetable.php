<?php
if(empty($_SESSION['auth'])){
    header('Location:/index.php/?route=404');
}
Request::model('timetable');
$courTime = new Timetable();
    $data = array(
        'couriers' => $courTime->getCouriers(),
        'destinations' => $courTime->getDestinations(),
    );

    if(!empty($_POST['filterStartDate']) || !empty($_POST['filterEndDate'])){
        $data['info'] = $courTime->getInfoTimetable($_POST['filterStartDate'], $_POST['filterEndDate']);
    }else{
        $data['info'] = $courTime->getInfoTimetable();
    }

if(isset($_POST['insertCourInfo'])){
            $courTime->insertInfoToTimetable($_POST['chooseCouriers'], $_POST['chooseDestination'], $_POST['startDateTime'], $_POST['endDateTime']);
}
if(isset($_POST['refreshTable'])){
    header('Location:/index.php/?route=timetable');
}

Request::header();
Request::view('timetable', $data);
unset ($_SESSION['errorDate']);
unset ($_SESSION['errorCreateNewInfoEmpty']);
unset ($_SESSION['errorBusy']);
unset ($_SESSION['errorWorkingTime']);