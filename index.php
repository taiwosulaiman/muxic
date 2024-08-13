<?php
include('auth.php');

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
<div id="sign-log">
            <a href="sign-up.php">Sign up</a>
            <a href="login.html">Login</a>
</div>
        
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
    <input type="hidden" name="music_picture" value="images/songsPictures/but.jpeg">
        <img src="images/songsPictures/but.png" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Butter By BTS</h3>
</form>
    </div>

    <div class="item">
        <img src="images/songsPictures/dyn.jpeg" alt="" id="eve">
        <h3>Dynamite By BTS</h3>
    </div>

    <div class="item">
        <form action="" method="post">
    <input type="hidden" name="music_picture" value="Taemin_Advice_EP_cover.jpg">
        <img src="Taemin_Advice_EP_cover.jpg" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Advice By TAEMIN</h3>
</form>
    </div>

    <div class="item">
        <img src="images/songsPictures/dwc.jpeg" alt="" id="eve">
        <h3>Don't Wanna Cry By SEVENTEEN</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/ls.jpeg" alt="" id="eve">
        <h3>Love Scenario By iKON</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/Jessi_-_Zoom.png" alt="" id="eve">
        <h3>Zoom By JESSI</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/Pink_Venom_Cover.jpg" alt="" id="eve">
        <h3>Pink Venom By BLACKPINK</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/LGO.jpeg" alt="" id="eve">
        <h3>Life Goes On By BTS</h3>
    </div>
    


</div>
</section>

<!-- POP/R&B PLAYLIST -->
<section>
    <h2 class="kpop-rnb">POP/R&B Playlist</h2>
<div class="playlists">
    <div class="item">
        <img src="images/songsPictures/Best_Part_of_Me.png" alt="" id="eve">
        <h3>Best Part Of Me By ED SHEERAN</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/Demi_Lovato_-_Heart_Attack.png" alt="" id="eve">
        <h3>Heart Attack By DEMI LOVATO</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/Dan_+_Shay_and_Justin_Bieber_-_10,000_Hours.png" alt="" id="eve">
        <h3>10,000 Hours By DAN, SHAY, JUSTIN BEIBER</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/am.jpeg" alt="" id="eve">
        <h3>2002 By ANNE MARIE</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/duncan.jpeg" alt="" id="eve">
        <h3>Arcade By DUNCAN LAURENCE </h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/Ed_Sheeran_-_Beautiful_People.png" alt="" id="eve">
        <h3>Beautiful People By ED SHEERAN</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/rock.jpeg" alt="" id="eve">
        <h3>Rockabye By CLEAN BANDIT</h3>
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
        <h3>Band4Band By CENTRAL CEE</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/lala.jpeg" alt="" id="eve-lrwb">
        <h3>Lalali by SEVENTEEN</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/work.jpeg" alt="" id="eve-lrwb">
        <h3>Work By ATEEZ</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/rockstar.jpeg" alt="" id="eve-lrwb">
        <h3>RockStar By LISA</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/bouncy.jpeg" alt="" id="eve-lrwb">
        <h3>Bouncy By ATEEZ </h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/Ed_Sheeran_-_Beautiful_People.png" alt="" id="eve">
        <h3>Beautiful People By ED SHEERAN</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/rock.jpeg" alt="" id="eve">
        <h3>Rockabye By CLEAN BANDIT</h3>
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






<!--<audio controls>
    <source  src="songs/Stray%20Kids%20-%20Christmas%20EveL%20%20.mp3" type="audio/mpeg">
</audio> -->

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
       <!-- <div class="footer">
            <p>Footer content</p>
        </div> -->
    </div>
</body>
</html>
<script src="script.js"></script>