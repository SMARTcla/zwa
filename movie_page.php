<?php error_reporting(0);
include("database/topics.php"); ?>
<?php
session_start();
if (!$name_film) {
    header('Location: index.php');
}
?>


<!-- html code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/print.css">
    <?php if (isset($_SESSION['id']) === False) : ?>
        <link rel="stylesheet" type="text/css" href="css/dark/front.css">
        <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
        <link rel="stylesheet" type="text/css" href="css/dark/section.css">
        <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
        <link rel="stylesheet" type="text/css" href="css/dark/movie_info.css">
    <?php elseif (isset($_SESSION['id'])) : ?>
        <?php if ($_SESSION['mode'] === 'white') : ?>
            <link rel="stylesheet" type="text/css" href="css/white/front_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/footer_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/section_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/menu_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/movie_info_white.css">
        <?php elseif ($_SESSION['mode'] === 'dark') : ?>
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
    <!-- header -->
    <?php include("includes/header.php"); ?>
    <!-- output film section -->
    <section class="movie-info">
        <div class="div-movie-info">
            <img src="images/films/<?php echo $film_image; ?>" alt="<?php echo $name_film; ?>" class="img_full"></a>
            <h2 class="name-movie">

                <?php echo $name_film; ?>
            </h2>
            <h3 class="about-movie-str">
                About Film
            </h3>
            <table class="movie-info-table">
                <tbody>
                    <tr class="movie-info-table-col">
                        <td>Year</td>
                        <td><?php echo $year_film; ?></td>
                    </tr>
                    <tr class="movie-info-table-col">
                        <td>Country</td>
                        <td><?php echo $country_film; ?></td>
                    </tr>
                    <tr class="movie-info-table-col">
                        <td>Genre</td>
                        <td><?php echo $genre_film; ?></td>
                    </tr>
                    <tr>
                        <td>Director</td>
                        <td><?php echo $director_film; ?></td>
                    </tr>
                    <tr>
                        <td>Scenario</td>
                        <td><?php echo $scenario_film; ?></td>
                    </tr>
                    <tr>
                        <td>Mounting</td>
                        <td><?php echo $mounting_film; ?></td>
                    </tr>
                    <tr>
                        <td>Composer</td>
                        <td><?php echo $composer_film; ?></td>
                    </tr>
                    <tr>
                        <td>Budget</td>
                        <td>$<?php echo $budget_film; ?></td>
                    </tr>
                    <tr>
                        <td>Fees in the world</td>
                        <td>$<?php echo $fees_film; ?></td>
                    </tr>
                    <tr>
                        <td>Age from</td>
                        <td>+<?php echo $age_film; ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h4 class="h4-full-info"><?php echo $full_info_film; ?></h4>
            <hr>
            <!-- comment section -->
            <h3 class="comments-str">Comments</h3>
            <?php foreach ($reviews as $key => $review) : ?>
                <?php if ($review['review_film_id'] === $film_id) : ?>
                    <h4 class="h4-full-info">&#9733;<?php echo $review['review_grade']; ?>/10 — <?php echo $review['review_login']; ?></h4>
                    <h4 class="h4-full-info"> Comment : <?php echo $review['review_text']; ?></h4>
                    <hr>
                <?php endif; ?>
            <?php endforeach; ?>
            <!-- add comment, check user auth -->
            <?php if (isset($_SESSION['id'])) : ?>
                <form action="movie_page.php?id=<?= $film['film_id']; ?>" class="form add-review" id="form" method="post">
                    <p><? echo $error_message ?> </p>
                    <h3 class="comments-str">Add new review</h3>
                    <hr>
                    <label for="review_text">Text</label>
                    <textarea name="review_text" placeholder="Enter review (Required)" required pattern='[A-Za-z].{10,200}' class='input-text-review'><?= htmlspecialchars($review_text); ?></textarea>
                    <label for="review_grade">Grade</label>
                    <textarea type="number" class="grade-review" name="review_grade" min="0" max="10" placeholder="Enter grade (Required)" required pattern="[0-9].{0, 3}"><?= htmlspecialchars($review_grade); ?></textarea>
                    <input type="submit" name="submit_review" value="submit" class="form-btn submit-review">
                    <div class="block_film_name">
                        <select name="review_film_id">
                            <option value="<?= $film['film_id']; ?>"><?= $film['name_film']; ?></option>
                        </select>
                    </div>




                </form>

            <?php endif; ?>

        </div>





    </section>










    <!-- footer -->
    <?php include("includes/footer.php"); ?>
</body>

</html>