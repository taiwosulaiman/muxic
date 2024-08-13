<?php
class musicWeb {
    public $link;
    
    public function __construct($dbname, $host = "localhost", $username = "root", $password = "") {
        $this->link = mysqli_connect($host, $username, $password); // Initial connection without selecting a database
        $this->createDb($dbname); // Create the database if it doesn't exist
        $this->link = mysqli_connect($host, $username, $password, $dbname); // Connect to the newly created or existing database
        return $this->link;
    }

    private function createDb($dbname) {
        mysqli_query($this->link, "CREATE DATABASE IF NOT EXISTS $dbname");
    }

    public function createTable($sql) {
        mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }

    public function postData($sql) {
        $query = mysqli_query($this->link, $sql);
        if (mysqli_affected_rows($this->link)) {
            $res = array('message'=> "Registration successful!");
            return json_encode($res);
        } else {
            $res = array('message'=> "Server Busy");
            return json_encode($res);
        }
    }
}

?>