<?php
class Links{
    public function links(){
        $sql = "SELECT title, url FROM page";
        $query = mysqli_query(ConDB::connect(), $sql);
        while($res[] = mysqli_fetch_assoc($query)){
            $infoPage = $res;
        }
        return $infoPage;
    }
}