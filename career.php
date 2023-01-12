<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/print.css">

    <?php if (isset($_SESSION['id']) === False) : ?>
        <link rel="stylesheet" type="text/css" href="css/dark/front.css">
        <link rel="stylesheet" type="text/css" href="css/dark/movies_bar.css">
        <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
        <link rel="stylesheet" type="text/css" href="css/dark/section.css">
        <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
        <link rel="stylesheet" type="text/css" href="css/dark/career.css">
    <?php elseif (isset($_SESSION['id'])) : ?>
        <?php if ($_SESSION['mode'] === 'white') : ?>
            <link rel="stylesheet" type="text/css" href="css/white/front_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/footer_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/section_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/menu_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/movies_bar_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/career_white.css">
        <?php elseif ($_SESSION['mode'] === 'dark') : ?>
            <link rel="stylesheet" type="text/css" href="css/dark/front.css">
            <link rel="stylesheet" type="text/css" href="css/dark/movies_bar.css">
            <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
            <link rel="stylesheet" type="text/css" href="css/dark/section.css">
            <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
            <link rel="stylesheet" type="text/css" href="css/dark/career.css">
        <?php endif; ?>
    <?php endif; ?>
    <link href="styles/slider.css" rel="stylesheet" type="text/css">
    <link href='https://css.gg/image.css' rel='stylesheet'>
    <link rel="icon" href="images/logo_x2.png" type="image/x-icon">
    <title>ZWA</title>
</head>


<body>
    <?php include("includes/header.php"); ?>
    <div class="container-career">
        <div class="card-career">
            <h3 class="h3-career">12 January 2022</h3>
            <h1 class="h1-career">Recruiting Coordinator</h1>
            <p class="p-career">We are looking for a Recruiting Coordinator who is process driven and detail-oriented to help facilitate interview scheduling and candidate interactions through the scheduling process. Our Recruiting Coordinators have a strong emphasis on delivering an amazing candidate experience as well as internal hiring team experience.</p>
            <span class="tag tag-blue">HR</span>
        </div>
        <div class="card-career">
            <h3 class="h3-career">12 January 2019</h3>
            <h1 class="h1-career">Python Developer</h1>
            <p class="p-career">We are hiring a Python Developer, who will work closely with designers & product managers to build, test, and deliver new features, who has experience in setting up cloud infrastructure in AWS, CI/CD pipelines, and Kubernetes will be an added advantage. Good communication and collaboration skills are obligitary.</p>
            <span class="tag tag-brown">Python</span>
        </div>
        <div class="card-career">
            <h3 class="h3-career">12 January 2019</h3>
            <h1 class="h1-career">Project Manager</h1>
            <p class="p-career">Today we open an opportunity yo join our team as a Project Manager. This person will be working with management to help define and implement aspects of the strategy and vision, translating gaps between current state architecture and strategy into a project plan/roadmap and Leading and controlling the scope of projects, ensuring that rigorous change.</p>
            <span class="tag tag-red">PM</span>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>
</body>

</html>