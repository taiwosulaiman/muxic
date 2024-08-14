<?php
include('auth.php');
// $signed_loggedIn = isset($_SESSION['signUp']) === true;  //&& $_SESSION['logged_in'] === true;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}
// Check if the form was submitted and if the music_picture field is set
if (isset($_POST['music_picture'])) {
    //echo "hiii";
    // Retrieve the music_picture value from POST data
    $music_picture = $_POST['music_picture'];
    // Fetch the file paths from the database
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
    } else {
        echo "No audio file found.";
    }
} 


?> 






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="css/profile.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.css">
    <title>Music Project</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- FOR THE ARTISTS MENU -->
            <button class="menu-button" onclick="toggleMenu()">☰ Artists</button>

            <div class="menu" id="menu">
                <div class="menu-header">
                    <h2>Artists</h2>
                    <button class="exit-button" onclick="toggleMenu()">✖</button>
                </div>
                <div class="artist">
                    <li class="art1">
                        <span><img src="images/artists/beyonce.jpeg" alt=""></span>
                        <h3>Beyonce</h3>
                    </li>
                    <li class="art1">
                        <span><img src="images/artists/John Legend.jpeg" alt=""></span>
                        <h3>John Legend</h3>
                    </li>
                    <li class="art1">
                        <span><img src="images/artists/ed sheeran.jpeg" alt=""></span>
                        <h3>Ed Sheeran</h3>
                    </li>
                    <li class="art1">
                        <span><img src="images/artists/ayra starr.jpeg" alt=""></span>
                        <h3>Ayra Starr</h3>
                    </li>
                    <li class="art1">
                        <span><img src="images/artists/asake.jpeg" alt=""></span>
                        <h3>Asake</h3>
                    </li>
                    <li class="art1">
                        <span><img src="images/artists/celine dion.jpeg" alt=""></span>
                        <h3>Celine Dion</h3>
                    </li>
                    <li class="art1">
                        <span><img src="images/artists/remajpeg.jpeg" alt=""></span>
                        <h3>Rema</h3>
                    </li>
                </div>
            </div>


            <h3 id="musWeb">TUNE PLAY</h3>

           <?php         
if (isset($_SESSION['signUp']) && $_SESSION['signUp'] === true) {
    // User is logged in, display profile icon
    $profileIcon = '<div id="profile-content">
        <input type="checkbox" id="profile-toggle" class="profile-toggle">
        <label for="profile-toggle" class="profile-container">
            <img src="images/th.jpeg" alt="" style="display: block;" >
        </label>

        <div class="profile-pic">
            <div class="profile-header">
                <h2>Profile</h2>
                <label for="profile-toggle" class="exitbutton">✖</label>
            </div>
            <div class="profile">
                <li>
                  <a href="" class="prof1"><h3>View Profile</h3></a>
                </li>
                <hr>
                <li>
                  <a href="" class="prof1"><h3>Monetization</h3></a>
                </li>
                <hr>
                <li>
                   <a href="" class="prof1"><h3>Settings</h3></a>
                </li>
                <hr>
                <li>
                   <a href="" class="prof1"><h3>Log out</h3></a>
                </li>
            </div>
        </div>
    </div>';
} else {
    // User is not logged in, do not display anything
    $profileIcon = '';
}

?>

<!-- rest of your HTML code -->
<div id="sign-log">
<<<<<<< HEAD
    <?php echo $profileIcon; ?>
    <?php if (!isset($_SESSION['signUp']) || $_SESSION['signUp'] !== true) { ?>
        <a href="sign-up.php">Sign Up</a>
        <a href="login.html">Login</a>
    <?php } ?> 
</div>


</div>
=======
            <a href="sign-up.php">Sign up</a>
            <a href="login.html">Login</a>
</div>

<!--  >>>> PROFILE >>>>-->
<div id="profile-content">
    <input type="checkbox" id="profile-toggle" class="profile-toggle">
    <label for="profile-toggle" class="profile-container">
        <img src="images/th.jpeg" alt="">
    </label>

    <div class="profile-pic">
        <div class="profile-header">
            <h2>Profile</h2>
            <label for="profile-toggle" class="exitbutton">✖</label>
        </div>
        <div class="profile">
            <li class="prof1">
                <h3>Account</h3>
            </li>
            <li class="prof1">
                <h3>View Profile</h3>
            </li>
            <li class="prof1">
                <h3>Monetization</h3>
            </li>
            <li class="prof1">
                <h3>Settings</h3>
            </li>
            <li class="prof1">
                <h3>Log out</h3>
            </li>
        </div>
    </div>
</div>

<!-- >>>>-->
>>>>>>> 2513a3273ba7aa71682a51fed9c8393fa6c1eeaf
        </div>
        <div class="content">

<!-- KPOP PLAYLIST -->              
<section>
    <h2 class="kpop-rnb">K-Pop Playlist</h2>
<div class="playlists">
    <div class="item">
        <form action="" method="post">
            <input type="hidden" name="music_picture" value="images/songsPictures/bst.jpeg">
        <img src="images/songsPictures/bst.jpeg" alt="" id="eve" onclick= "this.parentNode.submit();">
        </form>
        <h3>Blood, Sweat & Tears By BTS</h3>
    </div>
    
    <div class="item">
        <form action="" method="post">
            <input type="hidden" name="music_picture" value="images/songsPictures/Eve.jpeg">
        <img src="images/songsPictures/Eve.jpeg" alt="" id="eve" onclick= "this.parentNode.submit();">
        </form>
        <h3>Christmas Eve By STRAY KIDS</h3>
    </div>

    <div class="item">
    <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/but.png">
        <img src="images/songsPictures/but.png" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Butter By BTS</h3>
</form>
    </div>
   
    <div class="item">
        <form action="" method="post">
            <input type="hidden" name="music_picture" value="images/songsPictures/dyn.jpeg">
        <img src="images/songsPictures/dyn.jpeg" alt="" id="eve" onclick= "this.parentNode.submit();">
        <h3>Dynamite By BTS</h3>
        </form>
    </div>

    <div class="item">
        <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/Taemin_Advice_EP_cover.jpg">
        <img src="images/songsPictures/Taemin_Advice_EP_cover.jpg" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Advice By TAEMIN</h3>
</form>
    </div>

    <div class="item">
         <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/dwc.jpeg">
        <img src="images/songsPictures/dwc.jpeg" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Don't Wanna Cry By SEVENTEEN</h3>
        </form>
    </div>

    <div class="item">
         <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/ls.jpeg">
        <img src="images/songsPictures/ls.jpeg" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Love Scenario By iKON</h3>
        </form>
    </div>

    <div class="item">
         <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/Jessi_-_Zoom.png">
        <img src="images/songsPictures/Jessi_-_Zoom.png" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Zoom By JESSI</h3>
        </form>
    </div>

    <div class="item">
         <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/Pink_Venom_Cover.jpg">
        <img src="images/songsPictures/Pink_Venom_Cover.jpg" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Pink Venom By BLACKPINK</h3>
        </form>
    </div>

    <div class="item">
         <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/LGO.jpeg">
        <img src="images/songsPictures/LGO.jpeg" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Life Goes On By BTS</h3>
        </form>
    </div>
    


</div>
</section>

<!-- POP/R&B PLAYLIST -->
<section>
    <h2 class="kpop-rnb">POP/R&B Playlist</h2>
<div class="playlists">
    <div class="item">
        <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/Best_Part_of_Me.png">
        <img src="images/songsPictures/Best_Part_of_Me.png" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Best Part Of Me By ED SHEERAN</h3>
        </form>
    </div>

    <div class="item">
        <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/Demi_Lovato_-_Heart_Attack.png">
        <img src="images/songsPictures/Demi_Lovato_-_Heart_Attack.png" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Heart Attack By DEMI LOVATO</h3>
        </form>
    </div>

    <div class="item">
        <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/Dan_+_Shay_and_Justin_Bieber_-_10,000_Hours.png">
        <img src="images/songsPictures/Dan_+_Shay_and_Justin_Bieber_-_10,000_Hours.png" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>10,000 Hours By DAN, SHAY, JUSTIN BEIBER</h3>
        </form>
    </div>

    <div class="item">
        <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/am.jpeg">
        <img src="images/songsPictures/am.jpeg" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>2002 By ANNE MARIE</h3>
        </form>
    </div>

    <div class="item">
        <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/duncan.jpeg">
        <img src="images/songsPictures/duncan.jpeg" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Arcade By DUNCAN LAURENCE </h3>
        </form>
    </div>

    <div class="item">
        <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/Ed_Sheeran_-_Beautiful_People.png">
        <img src="images/songsPictures/Ed_Sheeran_-_Beautiful_People.png" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Beautiful People By ED SHEERAN</h3>
        </form>
    </div>

    <div class="item">
        <form action="" method="post">
    <input type="hidden" name="music_picture" value="images/songsPictures/rock.jpeg">
        <img src="images/songsPictures/rock.jpeg" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Rockabye By CLEAN BANDIT</h3>
        </form>
    </div>

    <div class="item">
        <img src="images/songsPictures/outside.jpeg" alt="" id="eve">
        <h3>Car's Outside By JAMES ARTHUR</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/Benson_Boone_-_Beautiful_Things.png" alt="" id="eve">
        <h3>Beautiful Things By BENSON BOONE</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/perfect.jpeg" alt="" id="eve">
        <h3>Perfect By ED SHEERAN</h3>
    </div>
    


</div>
</section>

<!-- HIPPOP PLAYLIST -->
<section>
    <h2 class="kpop-rnb">HIP-POP Playlist</h2>
<div class="playlists">
    <div class="item">
        <img src="images/songsPictures/band.jpeg" alt="" id="eve">
        <h3>Not Like Us by KENDRICK LAMAR</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/lala.jpeg" alt="" id="eve-lrwb">
        <h3>The Box by RODDY RICCH</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/work.jpeg" alt="" id="eve-lrwb">
        <h3>God's Plan by DRAKE</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/rockstar.jpeg" alt="" id="eve-lrwb">
        <h3>Not Afraid by EMINEM</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/bouncy.jpeg" alt="" id="eve-lrwb">
        <h3>Monsters You Made by BURNA BOY</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/Ed_Sheeran_-_Beautiful_People.png" alt="" id="eve">
        <h3>Mockingbird by EMINEM</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/rock.jpeg" alt="" id="eve">
        <h3>In The Bible by DRAKE</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/outside.jpeg" alt="" id="eve">
        <h3>Rules by DOJA CAT</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/Benson_Boone_-_Beautiful_Things.png" alt="" id="eve">
        <h3>Mask Off by FUTURE</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/perfect.jpeg" alt="" id="eve">
        <h3>Street by DOJA CAT</h3>
    </div>
    
<!-- GOSPEL PLAYLIST -->
<section>
    <h2 class="kpop-rnb">GOSPEL Playlist</h2>
<div class="playlists">
    <div class="item">
        <img src="images/songsPictures/maverickfirm.jpeg" alt="" id="eve">
        <h3>Firm Foundation by MAVERICK CITY MUSIC</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/rescue lauren.jpeg" alt="" id="eve-lrwb">
        <h3>Rescue by LAUREN DIAGLE</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/iba nath.jpeg" alt="" id="eve-lrwb">
        <h3>Iba by NATHANIEL BASSEY</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/takeovertheo.jpeg" alt="" id="eve-lrwb">
        <h3>Takeover by THEOPHILUS SUNDAY</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/lauren.jpeg" alt="" id="eve-lrwb">
        <h3>Remember by LAUREN DIAGLE</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/yet maverick.jpeg" alt="" id="eve">
        <h3>Yet by MAVERICK CITY</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/yousay.jpeg" alt="" id="eve">
        <h3>You Say By LAUREN DIAGLE</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/mosesbliss.jpeg" alt="" id="eve">
        <h3>You I Live For by MOSES BLISS</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/larageorge.jpeg" alt="" id="eve">
        <h3>Ijoba Orun by LARA GEORGE</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/fragrancetofire.jpeg" alt="" id="eve">
        <h3>Fragrance To Fire by DUNSIN OYEKAN</h3>
    </div>
</div>
</section>

<!-- AFROBEAT PLAYLIST -->
<section>
    <h2 class="kpop-rnb">AFROBEAT Playlist</h2>
<div class="playlists">
    <div class="item">
        <img src="images/songsPictures/asake.jpeg" alt="" id="eve">
        <h3>I Swear by ASAKE</h3>   
    </div>
    <div class="item">
        <img src="images/songsPictures/asake.jpeg" alt="" id="eve-lrwb">
        <h3>Mentally by ASAKE</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/forever psquare.jpeg" alt="" id="eve-lrwb">
        <h3>Forever by P-SQUARE</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/runtown.jpeg" alt="" id="eve-lrwb">
        <h3>Mad Over You by RUNTOWN</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/nwababy.jpeg" alt="" id="eve-lrwb">
        <h3>Nwa Baby by DAVIDO</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/frames wizkid.jpeg" alt="" id="eve">
        <h3>Frames by WIZKID</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/demodavido.jpeg" alt="" id="eve">
        <h3>Demo by DAVIDO</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/noone psquare.jpeg" alt="" id="eve">
        <h3>No One Like You by P-SQUARE</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/ozebarema.jpeg" alt="" id="eve">
        <h3>Ozeba by REMA</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/asake.jpeg" alt="" id="eve">
        <h3>Wave by ASAKE</h3>
    </div>
</div>
</section>

            <div class="main-content">
                <div class="image-container">
                   <!-- <img src="black-rappers-caps-stage-with-spotlights_266732-8536.png" alt="Main content image"> -->
                </div>
            </div>

<!-- <div id="trending-songs">
    <h2 id="trending">Top 10 Trending Songs</h2>
    <ul>
   <li> <a href="">+ Dreamers by JungKook feat. Fahad Al Kubaisi</a> </li>
   <li> <a href="">+ Christmas Tree by V</a> </li>
   <li> <a href="">+ Dancing In The Dark by Rihanna</a> </li>
   <li> <a href="">+ HeartBreak Anniversary by Giveon</a> </li>
   <li> <a href="">+ Perfect by Ed Sheeran</a> </li>
   <li> <a href="">+ Happily Ever After by TXT</a> </li>
   <li> <a href="">+ LOST! by RM</a> </li>
   <li> <a href="">+ Nuts by RM</a> </li>
   <li> <a href="">+ SPOT! by ZICO feat. JENNIE</a> </li>
   <li> <a href="">+ In The Room by Maverick City feat. Tasha Cobbs</a> </li>
</ul>
</div>  -->

        </div>
       <footer>
        <p>&copy; 2024 TUNE PLAY. All Rights Reserved.</p>
       </footer>
    </div>
</body>
</html>
<script src="script.js"></script>