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

    // To get the music file
    public function getFilePath($music_picture, $table) {
        $sql = "SELECT music_file FROM $table WHERE music_picture = '$music_picture'";
        //echo "<p>SQL Query: $sql</p>"; // Debugging output
        $query = mysqli_query($this->link, $sql);
        $result = array();
    
        while ($row = mysqli_fetch_array($query)) {
            array_push($result, $row['music_file']);
        }
    
        if (!empty($result)) {
            return json_encode($result);
        } else {
            return null;
        }
    }
    
}
?>