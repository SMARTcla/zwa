<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="css/print.css">
  <?php if (isset($_SESSION['id']) === False) : ?>
  <link rel="stylesheet" type="text/css" href="css/dark/about.css">
  <link rel="stylesheet" type="text/css" href="css/dark/front.css">
  <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
  <link rel="stylesheet" type="text/css" href="css/dark/section.css">
  <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
  <link rel="stylesheet" type="text/css" href="css/dark/movie_info.css">
  <?php elseif (isset($_SESSION['id'])) : ?>
  <?php if ($_SESSION['mode'] === 'white') : ?>
  <link rel="stylesheet" type="text/css" href="css/white/about_white.css">
  <link rel="stylesheet" type="text/css" href="css/white/front_white.css">
  <link rel="stylesheet" type="text/css" href="css/white/footer_white.css">
  <link rel="stylesheet" type="text/css" href="css/white/section_white.css">
  <link rel="stylesheet" type="text/css" href="css/white/menu_white.css">
  <link rel="stylesheet" type="text/css" href="css/white/movie_info_white.css">
  <?php elseif ($_SESSION['mode'] === 'dark') : ?>
    <link rel="stylesheet" type="text/css" href="css/dark/about.css">
  <link rel="stylesheet" type="text/css" href="css/dark/front.css">
  <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
  <link rel="stylesheet" type="text/css" href="css/dark/section.css">
  <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
  <link rel="stylesheet" type="text/css" href="css/dark/movie_info.css">
  <?php endif; ?>
  <?php endif; ?>
  <link href="styles/slider.css" rel="stylesheet" type="text/css">
  <link href='https://css.gg/image.css' rel='stylesheet'>
  <link rel="icon" href="images/logo_x2.png" type="image/x-icon">
  <title>ZWA</title>
</head>


<body>
  <?php include("includes/header.php"); ?>
  <div class="container_about">
    <div class="card">
      <div class="card__header">
        <img src="images/icons/icon_about.png" alt="card__image" class="card__image img_class" width="600">
      </div>
      <div class="card__body">
        <span class="tag tag-blue">About us</span>
        <h4 class="h4-about">Film reviews</h4>
        <p>This site is online database of information related to films and television series, including cast,
          production crew and personal biographies, plot summaries, trivia, ratings, and fan reviews.</p>
      </div>
    </div>
    <div class="card">
      <div class="card__header">
        <img src="images/icons/icon_find.png" alt="card__image" class="card__image img_class" width="600">
      </div>
      <div class="card__body">
        <span class="tag tag-brown">What you can find</span>
        <h4 class="h4-about">Explore us</h4>
        <p>Here you can find any information about the film you want, add new info or edit existing, write your comments
          to help other understand, what is that movie about. Explore the site and stay with us!</p>
      </div>
    </div>
    <div class="card">
      <div class="card__header">
        <img src="images/icons/icon_register.png" alt="card__image" class="card__image img_class" width="600">
      </div>
      <div class="card__body">
        <span class="tag tag-red">Why register</span>
        <h4 class="h4-about">Benefits and opportunities</h4>
        <p>The all information about movies, rankings and other stuff are accessible to all users, but only registered
          and logged-in users can submit new material and suggest edits to existing entries.</p>
      </div>
    </div>
  </div>
  <?php include("includes/footer.php"); ?>


</body>

</html>