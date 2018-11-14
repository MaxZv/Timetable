<?php
class ConDB{
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DATABASE = 'testingProject';
    public $connect;
    public function connect(){
        $connect =  mysqli_connect(self::HOST, self::USER, self::PASSWORD, self::DATABASE) or die('ERROR: Cannot connect to the database!');
        mysqli_query($connect, "SET CHARSET UTF8");
        return $connect;

    }
}
?>