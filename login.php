<?php
include("auth.php");

$error = "";
if (isset($_POST['LogIn'])) {
   $email = mysqli_real_escape_string($mw->link,$_POST['email']);
    $_SESSION["email"] = $email;
    
    $_SESSION["password"] = mysqli_real_escape_string($mw->link,$_POST['ps']);
    // Encrypt the password
    $encr_ps = sha1($_SESSION["password"]);

    $error = json_decode($mw->login($email,$encr_ps,"userinfo_table"));
    //$error = json_decode($mw->login($query));
    //header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <main>
        <section>

        <div id="log-in">
            <form action="" method="POST">
                <h2 id="log">LOG IN</h2><span style="color: white;"><?php echo (@$error->message); ?></span>

                <div>
                    <label for="email" class="mail">Email:
                        <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                    </label>
                </div>

                <div>
                    <label for="password">Password:
                        <input type="password" id="password" name="ps" placeholder="Enter Your Password" required>
                    </label>
                </div>

                <button type="submit" name="LogIn">Login</button>
                
                <p id="forgot">Forgot Password? <a href="forgotp.html">Click here</a></p>
        <h6 style="color: white; padding: 20px;">___________________________________________________________________________________</h6>
                <h4 id="dont">Don't have an account? <a href="sign-up.html" id="login-here"> Register here</a></h4>
                
                    
                </div>

                
            
            </form>
        </div>
        </section>
    </main>

</body>
</html>