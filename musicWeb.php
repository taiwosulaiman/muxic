<?php
class musicWeb {
    public $link;
    
    public function __construct($host = "localhost", $username = "root", $password = "", $dbname) {
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

// After registering
public function login($email, $password, $table) {
    $encr_ps = sha1($password); 
    $sql = "SELECT * FROM $table WHERE email='$email' AND password='$encr_ps'";
    $query = mysqli_query($this->link, $sql);
    $data = mysqli_fetch_array($query);

    if ($data) {
        $res = array('message' => "Login Successful");
        return json_encode($res);
    } else {
        $res = array('message' => "Invalid Email or Password");
        return json_encode($res); 
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