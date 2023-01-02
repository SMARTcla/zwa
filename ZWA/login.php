<?php

include("includes/header.php");

?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/front.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link href="styles/slider.css" rel="stylesheet" type="text/css">
    <link href='https://css.gg/image.css' rel='stylesheet'>
    <link rel="icon" href="images/logo_x2.png" type="image/x-icon">
    <title>ZWA</title>
</head>

<body>
    


    <section class="section-log">
        <div class="form-container" id="registration">
            <form action="/~krossale/login_form.php" class="login_form" id="login_form" method="post">

                <h3>Login</h3>
                <hr>

                <div class="form-control">

                    <label for="login">Login</label>
                    <p class="inform">Use only Lowercase Latin letter and digits, min. 4 characters, max. 20 characters</p>
                    <input type="text" name="login" value="" placeholder="Enter login (Required)" required pattern='[a-z0-9].{3,19}' id="login">
                    <div>
                        <p>Suggestions: <span class="ajax" id="txtHint"></span></p>
                    </div>
                    <span class="error"></span>


                </div>
                <hr>

                <div class="form-control">
                    <label for="password">Password</label>
                    <p class="inform">Use at least 1 digit, 1 Lowercase and 1 Uppercase Latin letter,min. 6 characters, max. 60 characters</p>
                    <input type="password" name="password" placeholder="Enter password (Required)" required pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,60}' id="password">
                    <span class="error"></span>

                </div>

                <hr>
                <input type="submit" name="do_login" value="login now" class="form-btn">


                <p class="redirect">Do not have an account?
                    <a href="register_form.php">
                        <i class="fas fa-user-plus"></i> Register</a>
                </p>

                <p class="redirect"> Go to Website
                    <a href="home.php">
                        <i class="fas fa-home"></i> Home</a>
                </p>
            </form>
        </div>
    </section>

















    <?php include("includes/footer.php");?>
</body>

</html>