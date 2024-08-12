<?php
include('auth.php');

if (isset($_POST['upload'])) {
    $_SESSION["title"] = mysqli_real_escape_string($mw->link, $_POST['title']);
    $_SESSION["artist"] = mysqli_real_escape_string($mw->link, $_POST['artist']);
    $_SESSION["genre"] = mysqli_real_escape_string($mw->link, $_POST['genre']);
//----------->>> to upload the music file
    $audiofileName = $_FILES['audio']['name'];
    $audiofileTmpName = $_FILES['audio']['tmp_name'];// temporary location of the file
    $audiofileSize = $_FILES['audio']['size'];
    $audiofileError = $_FILES['audio']['error'];
    $audiofileType = $_FILES['audio']['type'];
# to get the file extension
    $audiofileExt = explode('.', $audiofileName);
    $audiofileActualExt = strtolower(end($audiofileExt));
# file extensions that'll be allowed in the website
    $allowedAudio = array('mp3');
// to check if the listed extension is in the uploaded file
    if (in_array($audiofileActualExt, $allowedAudio)) {
        if ($audiofileError === 0) { //if there are no errors uploaded the file    
        // a unique name will be given to the file and also include the extension
            $audiofileNameNew = uniqid('', true) . "." . $audiofileActualExt;
        // where we want to upload the file in our root folder
            $audiofileDestination = 'uploads/' . $audiofileNameNew;
        // a function for the new location of a file    
            move_uploaded_file($audiofileTmpName, $audiofileDestination);
            $_SESSION['audioFile'] = $audiofileDestination;
        // to print out a successful message
            echo("Music Successfully Uploaded!"); 
        }
        else {
            echo "There was an error uploading this audio file!". $_FILES['audio']['error'];
        }
    } 
    else {
        echo "You cannot upload audio files of this type!";
    }
//------------>>>>

//----------->>> to upload the picture file
    $picturefileName = $_FILES['picture']['name'];
    $picturefileTmpName = $_FILES['picture']['tmp_name'];
    $picturefileSize = $_FILES['picture']['size'];
    $picturefileError = $_FILES['picture']['error'];
    $picturefileType = $_FILES['picture']['type'];

    $picturefileExt = explode('.', $picturefileName);
    $picturefileActualExt = strtolower(end($picturefileExt));

    $allowedPicture = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($picturefileActualExt, $allowedPicture)) {
        if ($picturefileError === 0) {
            $picturefileNameNew = uniqid('', true) . "." . $picturefileActualExt;
            $picturefileDestination = 'uploads/' . $picturefileNameNew;
            move_uploaded_file($picturefileTmpName, $picturefileDestination);
            $_SESSION['pictureFile'] = $picturefileDestination;
            echo("Picture Successfully Uploaded!"); 
        } 
        else {
            echo "There was an error uploading this image file!";
        }
    } 
    else {
        echo "You cannot upload image files of this type!";
    }
//------------>>>>
    $query = "INSERT INTO songlist_table(song_title, artist, music_file, music_picture, genre)";
    $query .= "VALUES('".$_SESSION['title']."', '".$_SESSION['artist']."', '".$_SESSION['audioFile']."', '".$_SESSION['pictureFile']."','".$_SESSION['genre']."')";
    mysqli_query($mw->link, $query);
    //$error = json_decode($mw->postData($query));
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOAD MUSIC</title>
    <link rel="stylesheet" href="css/upload-music.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <h2>UPLOAD MUSIC</h2>
        <label for="title">Music Title:</label>
        <input type="text" id="title" name="title" required><br>
    
        <label for="artist">Artist:</label>
        <input type="text" id="artist" name="artist" required><br>
    
        <label for="audio">Upload Audio File:</label>
        <input type="file" id="audio" name="audio" accept="audio/*" required><br>

        <label for="picture">Upload Picture:</label>
        <input type="file" id="picture" name="picture" accept="image/*" required><br>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required><br>
    
        <input type="submit" value="Add Music" name="upload">
    </form>
    
</body>
</html>