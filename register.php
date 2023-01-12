<?php error_reporting(0); ?>
<?php
session_start();
if ($_SESSION['id']) {
    header('Location: index.php');
}
?>
<?php include("controllers/users.php");?>
<!-- html code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <section class="section-reg">
        <div class="form-container" id="registration">
            <!-- register form -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form" id="register_form" method="post">
                <h3>Register</h3>


                <hr>
                <div class="form-control error whit">
                    <p><?php echo $error_message ?> </p>
                </div>
                <!-- login -->
                <div class="form-control">

                    <label for="login" class="whit">Login</label>
                    <p class="inform">Use only Lowercase Latin letter and digits, min. 4 characters, max. 20 characters</p>
                    <input type="text" name="login" value="<?= htmlspecialchars($login); ?>" placeholder="Enter login (Required)" required pattern='[a-z0-9].{3,19}' id="login">
                    <span class="error"></span>


                </div>
                <hr>
                <!-- name -->
                <div class="form-control">
                    <label for="firstname" class="whit"> Firstname</label>
                    <p class="inform">Use only Latin letter, min. 2 characters, max. 20 characters</p>
                    <input type="text" name="firstname" value="<?= htmlspecialchars($firstname); ?>" placeholder="Enter firstname (Required)" required pattern='[A-Za-z].{1,19}' id="firstname">
                    <span class="error"></span>


                </div>
                <hr>
                <!-- email -->
                <div class="form-control">
                    <label for="email" class="whit">Email</label>
                    <p class="inform">Use an email like - example@mail.cz, do not use specialcharacters</p>
                    <input type="email" name="email" value="<?= $email; ?>" placeholder="Enter email (Required)" required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$' id="email">
                    <span class="error"></span>

                </div>

                <hr>
                <!-- enter pass -->
                <div class="form-control">
                    <label for="password" class="whit">Password</label>
                    <p class="inform">Use at least 1 digit, 1 Lowercase and 1 Uppercase Latin letter,min. 6 characters, max. 60 characters</p>
                    <input type="password" name="password" placeholder="Enter password (Required)" required pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,60}' id="password">
                    <span class="error"></span>


                </div>
                <hr>
                <!-- pass check -->
                <div class="form-control">
                    <label for="password" class="whit">Password check</label>
                    <p class="inform">Use the same password</p>
                    <input type="password" name="cpassword" placeholder="Confirm password (Required)" required pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,60}' id="cpassword">
                    <span class="error"></span>

                </div>
                <hr>


                <!-- type of user -->
                <div class="form-control">
                    <label class="whit">Type of user</label>
                    <select name="user_type">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <hr>


                <!-- button -->
                <input type="submit" name="button_register" value="register now" class="form-btn">

                <p class="redirect whit">Already have an account?
                    <a href="login.php">
                        <i class="fas fa-sign-in-alt"></i> Login</a>
                </p>
                <!-- redirect -->
                <p class="index.php">
                    <i class="fas fa-home"></i> Home</a>
                </p>
            </form>
        </div>
    </section>
















    <!-- footer -->
    <?php include("includes/footer.php"); ?>
</body>

</html>