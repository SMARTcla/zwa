<?php error_reporting(0); ?>
<?php
session_start();
if ($_SESSION['user_type'] !== "admin") {
    header('Location: index.php');
}
?>
<?php
include("database/topics.php");
?>
<!DOCTYPE html>

<!-- html code -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- check theme -->
    <link rel="stylesheet" type="text/css" href="css/print.css">
    <?php if (isset($_SESSION['id']) === False) : ?>
        <link rel="stylesheet" type="text/css" href="css/dark/front.css">
        <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
        <link rel="stylesheet" type="text/css" href="css/dark/section.css">
        <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
        <link rel="stylesheet" type="text/css" href="css/dark/register.css">
    <?php elseif (isset($_SESSION['id'])) : ?>
        <?php if ($_SESSION['mode'] === 'white') : ?>
            <link rel="stylesheet" type="text/css" href="css/white/front_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/footer_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/section_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/menu_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/register_white.css">
        <?php elseif ($_SESSION['mode'] === 'dark') : ?>
            <link rel="stylesheet" type="text/css" href="css/dark/front.css">
            <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
            <link rel="stylesheet" type="text/css" href="css/dark/section.css">
            <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
            <link rel="stylesheet" type="text/css" href="css/dark/register.css">
        <?php endif; ?>
    <?php endif; ?>
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
            <!-- add film form -->
            <form action="admin.php" class="form" id="form" method="post">
                <!-- add info film -->
                <h3>Add new film</h3>
                <hr>
                <p><? echo $error_message ?> </p>
                <div class="form-control">

                    <label for="name_film" class="whit">Name of the film</label>
                    <p class="inform">Use only Lowercase Latin letter and digits, min. 1 characters, max. 25 characters</p>
                    <input type="text" name="name_film" value="" placeholder="Enter name of the film (Required)" required pattern='[A-Za-z].{1,25}' id="login">
                    <span class="error"></span>


                </div>
                <hr>

                <div class="form-control">
                    <label for="year_film" class="whit">Year</label>
                    <p class="inform">Use only numbers</p>
                    <input type="date" name="year_film" value="" placeholder="Enter year of the film (Required)" required pattern='[A-Za-z0-9].{2,10}'>
                    <span class="error"></span>


                </div>
                <hr>

                <div class="form-control">
                    <label for="country_film" class="whit">Country</label>
                    <p class="inform">Use only Latin letter, min. 2 characters, max. 25 characters</p>
                    <input type="text" name="country_film" value="" placeholder="Enter country of the film (Required)" required pattern='[A-Za-z].{2,25}'>
                    <span class="error"></span>


                </div>
                <hr>

                <div class="form-control">
                    <label for="genre_film" class="whit">Genre</label>
                    <p class="inform">Use only Latin letter, min. 2 characters, max. 25 characters</p>
                    <input type="text" name="genre_film" value="" placeholder="Enter genre of the film (Required)" required pattern='[A-Za-z].{2,25}'>
                    <span class="error"></span>


                </div>
                <hr>

                <div class="form-control">
                    <label for="director_film" class="whit">Director</label>
                    <p class="inform">Use only Latin letter, min. 2 characters, max. 25 characters</p>
                    <input type="text" name="director_film" value="" placeholder="Enter director of the film (Required)" required pattern='[A-Za-z].{2,25}'>
                    <span class="error"></span>


                </div>
                <hr>

                <div class="form-control">
                    <label for="scenario_film" class="whit">Scenario</label>
                    <p class="inform">Use only Latin letter, min. 2 characters, max. 20 characters</p>
                    <input type="text" name="scenario_film" value="" placeholder="Enter scenario of the film (Required)" required pattern='[A-Za-z].{2,25}'>
                    <span class="error"></span>


                </div>
                <hr>

                <div class="form-control">
                    <label for="mounting_film" class="whit">Mounting</label>
                    <p class="inform">Use only Latin letter, min. 2 characters, max. 20 characters</p>
                    <input type="text" name="mounting_film" value="" placeholder="Enter mounting of the film (Required)" required pattern='[A-Za-z].{2,25}'>
                    <span class="error"></span>


                </div>
                <hr>
                <div class="form-control">
                    <label for="composer_film" class="whit">Composer</label>
                    <p class="inform">Use only Latin letter, min. 2 characters, max. 20 characters</p>
                    <input type="text" name="composer_film" value="" placeholder="Enter composer of the film (Required)" required pattern='[A-Za-z].{2,25}'> <span class="error"></span>


                </div>
                <hr>
                <div class="form-control">
                    <label for="budget_film" class="whit">Budget</label>
                    <p class="inform">Use only Latin letter, min. 2 characters, max. 12 characters</p>
                    <input type="number" name="budget_film" min="0" max="999999999999" placeholder="Enter budget of the film (Required)" required pattern="[0-9].{2, 25}">
                    <span class="error"></span>


                </div>
                <hr>
                <div class="form-control">
                    <label for="fees_film" class="whit">Fees in the world</label>
                    <p class="inform">Use only Latin letter, min. 0 characters, max. 12 characters</p>
                    <input type="number" name="fees_film" min="0" max="999999999999" placeholder="Enter fees in the world of the film (Required)" required pattern='[0-9].{2, 25}'>
                    <span class="error"></span>


                </div>
                <hr>
                <div class="form-control">
                    <label for="age_film" class="whit">Age from</label>
                    <p class="inform">Use only Latin letter, min. 0 characters, max. 3 characters</p>
                    <input type="number" name="age_film" min="0" max="120" placeholder="Enter age of the film (Required)" required pattern='[0-9].{0, 3}'>
                    <span class="error"></span>


                </div>
                <hr>
                <div class="form-control">
                    <label for="info_film" class="whit">Short info<label>
                            <p class="inform">Use only Latin letter, min. 2 characters, max. 200 characters</p>
                            <input type="text" name="info_film" value="" placeholder="Enter film's info (Required)" required pattern='[A-Za-z0-9].{2,200}'>
                            <span class="error"></span>

                </div>
                <hr>
                <div class="form-control">
                    <label for="full_info_film" class="whit">Full info<label>
                            <p class="inform">Use only Latin letter, min. 100 characters, max. 1000 characters</p>
                            <input type="text" name="full_info_film" value="" placeholder="Enter full film's info (Required)" required pattern='[A-Za-z0-9].{100,1000}'>
                            <span class="error"></span>

                </div>
                <hr>
                <!-- image film name -->
                <div class="form-control">
                    <label class="whit">Photo name</label>
                    <select name="film_image">
                        <?php foreach ($film_photos as $key => $film_photo) : ?>
                            <option value="<?= $film_photo['photo_name']; ?>"><?= $film_photo['photo_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <hr>


                <!-- button submit -->
                <input type="submit" name="submit_movie" value="submit" class="form-btn">
            </form>
        </div>

    </section>















    <!-- footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>