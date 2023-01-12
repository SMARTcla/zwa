<?php
session_start();
include("database/topics.php");
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 6;
$total_pages = round(countRow('films') / $limit, 0);
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if (isset($_GET['page'])) {
    if ($page < 1 || $page > $total_pages) {
        header('Location: movies_list.php');
    }
}
?>

<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 6;
$offset = $limit * ($page - 1);
$check_search = 1;
$total_pages = round(countRow('films') / $limit, 0);
$films_page = selectAll_offset('films', $limit, $offset);
?>
<?php if (isset($_GET['category'])) {
    $films_page = selectAll_offset_where('films', $limit, $offset, $_GET['category']);
    $check_search = 0;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_film_search'])) {
    $check_search = 0;
    $search_film = trim($_POST['search_film']);
    $films_page = selectAll_like('films', $search_film);
}

?>
<!-- html code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/print.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
    <?php if (isset($_SESSION['id']) === False) : ?>
        <link rel="stylesheet" type="text/css" href="css/dark/front.css">
        <link rel="stylesheet" type="text/css" href="css/dark/movies_bar.css">
        <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
        <link rel="stylesheet" type="text/css" href="css/dark/section.css">
        <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
    <?php elseif (isset($_SESSION['id'])) : ?>
        <?php if ($_SESSION['mode'] === 'white') : ?>
            <link rel="stylesheet" type="text/css" href="css/white/front_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/footer_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/section_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/menu_white.css">
            <link rel="stylesheet" type="text/css" href="css/white/movies_bar_white.css">
        <?php elseif ($_SESSION['mode'] === 'dark') : ?>
            <link rel="stylesheet" type="text/css" href="css/dark/front.css">
            <link rel="stylesheet" type="text/css" href="css/dark/movies_bar.css">
            <link rel="stylesheet" type="text/css" href="css/dark/footer.css">
            <link rel="stylesheet" type="text/css" href="css/dark/section.css">
            <link rel="stylesheet" type="text/css" href="css/dark/menu.css">
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
    <section class="recommend-services">
        <h1 class="h1-name-section">Genres</h1>
        <div class="container-b">
            <div class="btn"><a href="movies_list.php?category=Comedy">Comedy</a></div>
            <div class="btn"><a href="movies_list.php?category=Science">Science</a></div>
            <div class="btn"><a href="movies_list.php?category=Action">Action</a></div>
            <div class="btn"><a href="movies_list.php">Back to all films</a></div>
        </div>
    </section>
    <!-- search film by name -->
    <!-- <form name="search" method="post" action="movies_list.php" id="search-field">
        <div class="form-control">
            <label for="search_film" class="whit">Enter film name</label>
            <input type="text" name="search_film" value="" placeholder="Enter film name (Required)" required pattern='[A-Za-z].{2,25}'>
        </div>
        <input type="submit" name="submit_film_search" value="submit" class="form-btn">
    </form> -->
    <div class="container-button">
        <form name="search" method="post" action="movies_list.php" id="search-field">
            <input type="checkbox" id="show-search-field" />
            <label for="show-search-field"><span>Search</span></label>
            <span>
                <input type="text" name="search_film" placeholder="Search by film name" required pattern='[A-Za-z].{2,25}' />
                <button type="submit" name="submit_film_search" title="Submit">&nbsp;</button>
            </span>
        </form>
    </div>
    <!-- show all film with flex css -->
    <div class="list-films">
        <div class="movies-bar">
            <ul class="recommend-info">
                <!-- cycle of show films -->
                <?php foreach ($films_page as $key => $film) : ?>
                    <li class="films-list">
                        <!-- show img -->
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
                    <!-- change line every 3 films -->
                    <?php if ((($key + 1) % 3) === 0) : ?>
            </ul>
            <ul class="recommend-info">
            <?php endif; ?>
        <?php endforeach; ?>
            </ul>
        </div>
        <!-- pagination menu -->
        <?php if ($check_search === 1) : ?>
            <div class="center">
                <div class="pagination">
                    <?php if ($page === 1) : ?>
                        <a href="movies_list.php?page=<?php echo $page - 1 ?>">«</a>
                    <?php endif ?>
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <a href="movies_list.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                    <?php } ?>
                    <?php if ($page !== $total_pages) : ?>
                        <a href="movies_list.php?page=<?php echo $page + 1 ?>">»</a>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ?>
    </div>


    <?php include("includes/footer.php"); ?>
</body>

</html>