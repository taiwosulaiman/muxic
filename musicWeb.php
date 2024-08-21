<?php
class musicWeb {
    public $link;
    
    public function __construct($host = "localhost", $username = "root", $password = "", $dbname) {
        $this->link = mysqli_connect($host, $username, $password); 
        $this->createDb($dbname); 
        $this->link = mysqli_connect($host, $username, $password, $dbname); 
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

    // To get the music file from the database
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

// THIS FUNCTION IS FOR DISPLAYING THE PICTURE,TITLE,ARTIST FOR PLAYLIST IN playMusic page
    public function playlistMusic($table){
        $playlistQuery = "SELECT * FROM $table";
        $playlistResult = mysqli_query($this->link, $playlistQuery);
        $_SESSION['playlist'] = array(); // Initialize playlist session variable to an array

        while ($row = mysqli_fetch_array($playlistResult)) {
            $_SESSION['playlist'][] = $row; // Store each song information in the playlist array
            echo '<li id="play-list">';
            echo '<form action="playmusic.php" method="post">';
            // echo '<a href="#"  onclick="this.closest(\'form\').submit();">';
            // Pass the music_picture value in a hidden input field
            echo '<input type="hidden" name="music_picture" value="' . $row['music_picture'] . '">';
            echo '<img src="' . $row['music_picture'] . '" alt="' . $row['song_title'] . '" onclick="this.closest(\'form\').submit();">';
           // echo '</a>';
            echo '<div id="title-artist">';
            echo '<span id="title">' . $row['song_title'] . "\n" .'</span>';
            echo '<span id="artist">' . "By" . "\n" . $row['artist'] . '</span>';
            /* echo '<audio controls class="custom-audio">';
            echo '<source src="' . $row['music_file'] . '" type="audio/mpeg">';
            echo 'Your browser does not support the audio element.';
            echo '</audio>'; */ 
            echo '</div>';
            echo '</form>';
            echo '</li>';
            echo '<hr>';
        }
    }  

    // THIS FUNCTION IS FOR DISPLAYING THE PICTURE,TITLE,ARTIST FOR ALL THE SONGS IN THE HOME PAGE 
    // {BASICALLY FOR ALL CURRENTLY PLAYING SONGS}
    public function getTitleArtist($music_picture,$table) {
        // Prepare the SQL query to fetch song details based on the music_picture
        $query = "SELECT song_title, artist, music_file FROM $table WHERE music_picture = '$music_picture'";
        $result = mysqli_query($this->link, $query);

            // Fetch the song details
            if ($result && mysqli_num_rows($result) > 0) {
             $row = mysqli_fetch_array($result);
            $song_title = $row['song_title'];
            $artist = $row['artist'];
            $music_file = $row['music_file'];

            // Display the song details
            echo "<div class='current-song'>";
            echo "<h2 id='current-title'>$song_title</h2>";
            echo "<h3 id='current-artist'>By $artist</h3>";
           // echo '<form action="" method="post">';
           // echo '<input type="hidden" name="previous" value="true">';
            //echo '<button type="submit" id="prev-next">' . "&lt;" . '</button>';// For Previous song
           // echo '</form>';

            echo "<img src='$music_picture' alt='$song_title' class='current-img'>";

           // echo '<form action="" method="post">';
            //echo '<input type="hidden" name="next" value="true">';
            //echo '<button type="submit" id="prev-next">' . "&gt;" . '</button>';// For Next Song
            //echo '</form>';
            /*echo "<audio controls>
                    <source src='$music_file' type='audio/mpeg'>
                    Your browser does not support the audio element.
                  </audio>"; */
            echo "</div>";
            }
            else {
                echo "No song found or query failed.";
            }  
    }    

    // // TO FIND/GET THE PREVIOUS AND NEXT SONGS
    // public function getPrevNext($music_picture){
    //     $query = "SELECT * FROM songlist_table WHERE music_picture = $music_picture";
    //     $result = mysqli_query($this->link, $query);

    //     while ($row = mysqli_fetch_array($result)) {
    //         // $music_picture = $row['music_picture']; // $row['music_picture'] is the value retrieved from the database 
    //         // and 'music_picture' is the key with the value of whatever is stored in $row['music_picture']
    //         // $song_title = $row['song_title'];
    //         // $artist = $row['artist'];
    //         // $music_file = $row['music_file'];

    //          // we'll store the songs in array so that we can get an index
    //         $playlistSongs [] = [
    //             'picture' => $row['music_picture'],
    //             'title' => $row['song_title'],
    //             'artist' => $row['artist'],
    //             'file' => $row['music_file'],
    //             'id' => $row['song_id']
    //         ];
    //     }
    // } 

}

?>
