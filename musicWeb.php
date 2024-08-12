<?php
class musicWeb{
    public $link;
    public function __construct($host = "localhost", $username = "root", $password = "",$dbname){
        $this->link = mysqli_connect($host,$username,$password); // we're using $this->link bcoz we've already declared link as public
        $this->createDb($dbname);
        $this->link = mysqli_connect($host,$username,$password,$dbname);
        return $this->link;
    }

    private function createDb($dbname){
        mysqli_query($this->link,"CREATE DATABASE IF NOT EXISTS $dbname");
    }

    public function createTable($sql){
        mysqli_query($this->link,$sql) or die(mysqli_error($this->link));
    }

    // To save data to the database
    public function postData($sql){
        $query = mysqli_query($this->link,$sql);
        if (mysqli_affected_rows($this->link)) {
            $res = array('message'=> "Registration successful! ");
            return (json_encode ($res));
        }
        else {
            $res = array('message'=> "Server Busy");
            return (json_encode ($res));
        }
    }
}
?>