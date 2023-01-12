<?php
session_start();
include("./controllers/mode.php");
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
?>
<?php include("database/topics.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- check theme -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/print.css">
    <?php if (isset($_SESSION['id']) === False) : ?>
        <link rel="stylesheet" type="text/css" href="css/dark/front.css">
        <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
        <link rel="stylesheet" type="text/css" href="css/dark/section.css">
        <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
        <link rel="stylesheet" type="text/css" href="css/dark/movies_bar.css">
    <?php elseif (isset($_SESSION['id'])) : ?>

        <?php if ($_SESSION['mode'] === 'white') : ?>
            <link rel="stylesheet" type="text/css" href="css/white/front_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/footer_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/section_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/menu_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/movies_bar_white.css">

        <?php elseif ($_SESSION['mode'] === 'dark') : ?>
            <link rel="stylesheet" type="text/css" href="css/dark/front.css">
            <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
            <link rel="stylesheet" type="text/css" href="css/dark/section.css">
            <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
            <link rel="stylesheet" type="text/css" href="css/dark/movies_bar.css">
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
    <!-- list what project recommend -->
    <section class="recommend-services">
        <h1 class="h1-name-section">WHAT WE CAN OFFER</h1>
        <div class="container-b">
            <div class="btn"><a href="movies_list.php">Short info about films</a></div>
            <div class="btn"><a href="movie_page.php?id=1">Write a review</a></div>
            <div class="btn"><a href="movie_page.php?id=1">Reviews another critics</a></div>
            <div class="btn"><a href="movie_page.php?id=1">Film rating</a></div>
        </div>
    </section>
    <!-- list films project -->
    <div class="list-films">
        <div class="movies-bar">
            <ul class="recommend-info">
                <?php foreach ($films as $key => $film) : ?>
                    <?php if ($key < 6) : ?>
                        <li class="films-list">
                            <img src="images/films/<?= $film['film_image']; ?>" alt="<?= $film['name_film']; ?>" class="img_ex">
                            <p class="p-info">
                                <?= $film['info_film']; ?>
                            </p>
                            <br>
                            <h2><?= $film['name_film']; ?></h2>
                            <div class="btn btn-two">
                                <span><a href="movie_page.php?id=<?= $film['film_id']; ?>">Learn more</a></span>
                            </div>
                        </li>
                        <?php if (($film['film_id'] % 3) === 0) : ?>
            </ul>
            <ul class="recommend-info">
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
            </ul>
        </div>
    </div>
















    <?php include("includes/footer.php"); ?>

</body>

</html>