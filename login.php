<?php
session_start();
if (isset($_SESSION['id'])) {
    header('Location: index.php');
}
?>
<?php include("controllers/users.php"); ?>
<!DOCTYPE html>
<!-- start session, check login valid -->
<!-- include file with check login form -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- check theme -->
    <link rel="stylesheet" type="text/css" href="css/print.css">
    <?php if (isset($_SESSION['id']) === False) : ?>
        <link rel="stylesheet" type="text/css" href="css/dark/front.css">
        <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
        <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
        <link rel="stylesheet" type="text/css" href="css/dark/register.css">
        <link rel="stylesheet" type="text/css" href="css/dark/section.css">
    <?php elseif (isset($_SESSION['id'])) : ?>
        <?php if ($_SESSION['mode'] === 'white') : ?>
            <link rel="stylesheet" type="text/css" href="css/white/front_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/footer_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/menu_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/register_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/section_white.css">
        <?php elseif ($_SESSION['mode'] === 'dark') : ?>
            <link rel="stylesheet" type="text/css" href="css/dark/front.css">
            <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
            <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
            <link rel="stylesheet" type="text/css" href="css/dark/register.css">
            <link rel="stylesheet" type="text/css" href="css/dark/section.css">

        <?php endif; ?>
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link href="styles/slider.css" rel="stylesheet" type="text/css">
    <link href='https://css.gg/image.css' rel='stylesheet'>
    <link rel="icon" href="images/logo_x2.png" type="image/x-icon">
    <title>ZWA</title>
</head>

<body>

    <!-- header -->
    <?php include("includes/header.php"); ?>
    <section class="section-log">
        <div class="form-container" id="registration">
            <!-- login form -->
            <form action="login.php" class="form" id="login_form" method="post">

                <h3>Login</h3>
                <hr>
                <div class="form-control error whit">
                    <p><?php echo $error_message ?> </p>
                </div>
                <hr>
                <!-- login -->
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
                <!-- password -->
                <div class="form-control">
                    <label for="password">Password</label>
                    <p class="inform">Use at least 1 digit, 1 Lowercase and 1 Uppercase Latin letter,min. 6 characters, max. 60 characters</p>
                    <input type="password" name="password" placeholder="Enter password (Required)" required pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,60}' id="password">
                    <span class="error"></span>

                </div>

                <hr>
                <!-- button -->
                <input type="submit" name="button_login" value="login now" class="form-btn">

                <!-- redirect to register -->
                <p class="redirect whit">Do not have an account?
                    <a href="register.php">
                        <i class="fas fa-user-plus"></i> Register</a>
                </p>
                <!-- go home without login -->
                <p class="redirect whit"> Go to Website
                    <a href="index.php">
                        <i class="fas fa-home"></i> Home</a>
                </p>
            </form>
        </div>
    </section>




    <!-- footer -->
    <?php include("includes/footer.php"); ?>
</body>

</html>