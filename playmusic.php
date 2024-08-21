<?php
include('auth.php');
// Initialize variables to prevent error display
$music_picture = '';
// $song_title = '';
// $artist = '';
// $audio_file = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAY MUSIC</title>

<style>
*{
    margin: 0;
    padding: 0;  
    background-color: #023c73;
}

    #playlists{ /* THIS IS FOR PLAYLISTS */
        background-color: #023c73;
        max-height: 650px; /* Adjust this value to control the height of the scrollable area */
        overflow-y: auto;
        padding-right: 10px; /* Add padding to avoid overlapping scrollbar */
        border: 1px solid #ccc; /* Optional: Add border for better visibility */
        width: 24%;
    }

    /* THIS IS FOR THE IMAGE, TITLE, ARTIST */
    #play-list{  
        list-style-type: none;
        margin-bottom: 20px;
        display: flex;
        margin-left: 20px;
        cursor: pointer;
    }

    #play-list img{
        width: 35px;
        border-radius: 10px;
    }

    #title{
        color: #fff;
        display: block;
        font-family: calibri;
         font-size: 20px;
         font-weight: bold;
    }
 
    #artist{
        color: #dbd5d5;
        display: block;
        font-family: Arial, sans-serif;
         font-size: 13px;
    }

    #title-artist{
        margin: -42px 0 0 50px;
    }

    /*  this is for the audio in the playlists 
    #audio {
    background-color: #f1f1f1;
    border-radius: 10px;
    padding: 5px;
    height: 30px;
    width: 220px;
    margin-top:10px;
    margin-right: 30px;
    } */

    hr{
        width: 300px;
        margin-left: 0px;
        margin-bottom: 20px;
        margin-top: 0px;
    }

    #first-line{ /* for the first <hr> */
        width: 300px;
        margin-left: 0px;
        margin-bottom: 20px;
        margin-top: 0px;
    }
    /* >>>>>>>><<<<<<< */

    #play{ /* this is for 'Playlist' heading */
        font-size: 2.7em;
        font-family: calibri;
        padding: 10px ;
        color: #0e7de6; 
    }

    #play-song{ /* this is general for the whole page */
        display: flex;
    }


    /* -->>>>> FOR THE CURRENTLY PLAYING SONG <<<<<-- */
.custom-audio {
    background-color: #f1f1f1;
    width: 500px; 
    border-radius: 10px;
    margin-left: 0px; /* 110px */
}

#current-music-playing{
    margin: 40px 40px 40px 80px;
}

#current-title{
    color: #fff;
    font-family: calibri;
    font-size: 2.5em;
}

#current-artist{
    color: #dbd5d5;
    font-family: Arial, sans-serif;
    font-size: 1em;
    font-weight: lighter;
}

.current-img{
    width: 350px;
    margin:10px;
}

.current-song{
    margin-left: 0px; /* 110px */
    text-align: center;
}
 /* -->>>>> ........ <<<<<-- */


 /* FOR PREVIOUS AND NEXT SONG BUTTON */
 #prev-next{
    background-color: #f1f1f1;
    padding: 10px;
    font-size: 1.8em;
    border: none;
    border-radius: 50%;
    height: 50px;
    width: 50px;
    text-align: center;
    margin: 5px;
   /* justify-content: center;
    align-items: center; */
 }

/* #next{
    background-color: #f1f1f1;
    padding: 10px;
    font-size: 1.8em;
    border: none;
    border-radius: 50%;
    height: 50px;
    width: 50px;
    text-align: center;
    margin-top: 300px;
    margin-left: 30px;
 } */

 #prev-next:hover{
    background-color: #0e7de6;
    color: #fff;
 }
/* >>><<< */

</style>

</head>
<body>

<section id="play-song">

<!-- BEGINNING OF PLAYLIST -->
<div id="playlists">
    <h3 id="play">Playlist</h3>
    <hr id="first-line">
    <ul>
        <?php
        // Retrieve and display all songs as a playlist
        $mw->playlistMusic("songlist_table");
        ?>
    </ul>
</div>
<!-- END OF PLAYLIST -->

<!-- FOR PREV AND NEXT BUTTON -->
<form action="" method="post">
    <input type="hidden" name="previous" value="true">
    <button type="submit" id="prev-next">&lt;</button>
</form>

<form action="" method="post">
    <input type="hidden" name="next" value="true">
    <button type="submit" id="prev-next">&gt;</button>
</form>
<!-- END OF PREV AND NEXT BUTTON -->

<!-- BEGINNING OF CURRENTLY PLAYING SONG -->
<div id="current-music-playing">
    <?php

if (isset($_POST['music_picture'])) {
    //echo '<button type="submit" id="prev">' . "&lt;" . '</button>'; 
    $music_picture = $_POST['music_picture'];

    // Find the current song index { FOR NEXT AND PREVIOUS BUTTON }
    foreach ($_SESSION['playlist'] as $index => $song) {
        if ($song['music_picture'] == $music_picture) {
            $_SESSION['current_song_index'] = $index;
            break;
        }
    }

    $mw->getTitleArtist($music_picture, "songlist_table");
    
 } 
//else {
//     echo "No song was selected.";
// }

if (isset($_POST['previous'])) {
    // Decrement the current song index, making sure it doesn't go below 0
    $_SESSION['current_song_index'] = max($_SESSION['current_song_index'] - 1, 0);
    $music_picture = $_SESSION['playlist'][$_SESSION['current_song_index']]['music_picture'];
    $mw->getTitleArtist($music_picture, "songlist_table");
}

if (isset($_POST['next'])) {
    // Increment the current song index, making sure it doesn't exceed the playlist length
    $_SESSION['current_song_index'] = min($_SESSION['current_song_index'] + 1, count($_SESSION['playlist']) - 1);
    $music_picture = $_SESSION['playlist'][$_SESSION['current_song_index']]['music_picture'];
    $mw->getTitleArtist($music_picture, "songlist_table");
}

 $audioPaths = json_decode($mw->getFilePath($music_picture, "songlist_table"), true);

    if ($audioPaths) {
        foreach ($audioPaths as $filePath) {
            echo "<div class='audio-container'>
            <audio class='custom-audio' controls>
                <source src='$filePath' type='audio/mpeg'>
                Your browser does not support the audio element.
            </audio>
            
          </div>";
        }// or mp3
    }
    //  else {
    //     echo "No audio file found.";
    // } 
    
     ?>
</div>
<!-- END OF CURRENTLY PLAYING SONG -->

</section>
</body>
</html>