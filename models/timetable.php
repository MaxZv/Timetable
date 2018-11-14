<?php
class Timetable{
    public function getCouriers(){
        $sql = "SELECT * FROM couriers";
        $query = mysqli_query(ConDB::connect(), $sql);
        while($res[] = mysqli_fetch_assoc($query)){
            $couriers = $res;
        }
        return $couriers;
    }
    public function getDestinations(){
        $sql = "SELECT * FROM destinations";
        $query = mysqli_query(ConDB::connect(), $sql);
        while($res[] = mysqli_fetch_assoc($query)){
            $destinations = $res;
        }
        return $destinations;
    }
    public function insertInfoToTimetable($courId, $destId, $startDateTime, $endDateTime){
        if(!empty($courId) && !empty($destId) && !empty($startDateTime) && !empty($endDateTime)) {
          if($this->isBusy($startDateTime, $endDateTime, $courId)) {
              if (strtotime($startDateTime) < strtotime($endDateTime)) {
                  $arrStartDate = explode('T', $startDateTime);
                  $unixStart = strtotime($arrStartDate[0]);
                  $arrEndDate = explode('T', $endDateTime);
                  $unixEnd = strtotime($arrEndDate[0]);
                  $sql = "INSERT INTO timetable SET courier_id='" . $courId . "', destination_id='" . $destId . "', datetime_start='" . $startDateTime . "', datetime_end='" . $endDateTime . "', unix_start='" . $unixStart . "', unix_end='" . $unixEnd . "'";
                  mysqli_query(ConDB::connect(), $sql);
              } else {
                  return $_SESSION['errorDate'] = "Не правильно указана дата или время, пожалуйста обратите внимание";
              }
          }
        }else{
            return $_SESSION['errorCreateNewInfoEmpty'] = 'Заполните поля';
        }

    }
    public function getInfoTimetable($postFilterStart = '', $postFilterEnd = ''){
        $filterStart = strtotime($postFilterStart);
        $filterEnd = strtotime($postFilterEnd);
        if(!empty($postFilterStart)) {
            $sql = "SELECT  *, cour.cour_name, dest.dest_name FROM timetable t LEFT JOIN couriers cour ON(t.courier_id=cour.id) LEFT JOIN destinations dest ON(t.destination_id=dest.id) WHERE unix_start='" . $filterStart . "'";
        }elseif(!empty($postFilterEnd)){
            $sql = "SELECT  *, cour.cour_name, dest.dest_name FROM timetable t LEFT JOIN couriers cour ON(t.courier_id=cour.id) LEFT JOIN destinations dest ON(t.destination_id=dest.id) WHERE unix_end='" . $filterEnd . "'";
        }else{
            $sql = "SELECT  *, cour.cour_name, dest.dest_name FROM timetable t LEFT JOIN couriers cour ON(t.courier_id=cour.id) LEFT JOIN destinations dest ON(t.destination_id=dest.id)";
        }
            $query = mysqli_query(ConDB::connect(), $sql);
            while($res[] = mysqli_fetch_assoc($query)){
                $infoTt = $res;
            }
            return $infoTt;


    }

    public function isBusy($postStartDateTime, $postEndDateTime, $courier_id){
        $arrStartDate = explode('T', $postStartDateTime);
        $startDate = strtotime($arrStartDate[1]);
        $arrEndDate = explode('T', $postEndDateTime);
        $endDate = strtotime($arrEndDate[1]);
        $startDay = strtotime("08:00");
        $endDay = strtotime("19:00");
        if($startDate >= $startDay && $endDate >= $startDay && $startDate < $endDay && $endDate <= $endDay){
            if(!empty($this->getInfoTimetable())) {
                foreach ($this->getInfoTimetable() as $info){
                    if($courier_id == $info['courier_id']){
                        $postStartUnix = strtotime($postStartDateTime);
                        $postEndUnix = strtotime($postEndDateTime);
                        $dbStartUnix = strtotime($info['datetime_start']);
                        $dbEndUnix = strtotime($info['datetime_end']);
                        if($postEndUnix < $dbStartUnix || $dbEndUnix < $postStartUnix){
                            true;
                        }else{
                            return $_SESSION['errorBusy'] = 'Курьер ' . $info['cour_name'] . ' занят в это время';
                        }
                    }
                }
                return true;
            }else{
                return true;
            }
        }else{
            return $_SESSION['errorWorkingTime'] = 'Время работы: с 8:00 до 19:00';
        }
    }

}