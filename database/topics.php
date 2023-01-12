<?php
// include request from db
include("db.php");
// show all list
function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}
// add new variable
$film_id = '';
$name_film = '';
$year_film = '';
$country_film = '';
$genre_film = '';
$director_film = '';
$scenario_film = '';
$mounting_film = '';
$composer_film = '';
$budget_film = '';
$fees_film = '';
$age_film = '';
$info_film = '';
$film_image = '';
$full_info_film = '';
$error_message = '';
$review_grade = 0;
// select all info from db films, review, available_photo with sql request
$films = selectAll('films'); 
$reviews = selectAll('reviews'); 
$film_photos = selectAll('available_photo'); 
// if method post and admin form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_movie'])) {
    $name_film = trim($_POST['name_film']);
    $year_film = $_POST['year_film'];
    $country_film = trim($_POST['country_film']);
    $genre_film = trim($_POST['genre_film']);
    $director_film = trim($_POST['director_film']);
    $scenario_film = trim($_POST['scenario_film']);
    $mounting_film = trim($_POST['mounting_film']);
    $composer_film = trim($_POST['composer_film']);
    $budget_film = $_POST['budget_film'];
    $fees_film = $_POST['fees_film'];
    $age_film = $_POST['age_film'];
    $info_film = trim($_POST['info_film']);
    $film_image = $_POST['film_image'];
    $full_info_film = trim($_POST['full_info_film']);
    // check data
    if ($name_film === '' || $year_film === '' || $country_film === '' || $genre_film === '' || $director_film === '' || $scenario_film === '' || $mounting_film === '' || $composer_film === '' || $budget_film === '' || $fees_film === '' || $age_film === '' || $info_film === '' || strlen ($name_film) < 1 || strlen ($name_film) > 25 || strlen ($country_film) < 2 || strlen ($country_film) > 25 || strlen ($genre_film) < 2 || strlen ($genre_film) > 25 || strlen ($director_film) < 2 || strlen ($director_film) > 25 || strlen ($scenario_film) < 2 || strlen ($scenario_film) > 25 || strlen ($mounting_film) < 2 || strlen ($mounting_film) > 25 || strlen ($composer_film) < 2 || strlen ($composer_film) > 25 || strlen ($budget_film) < 2 || strlen ($budget_film) > 12 || strlen ($fees_film) < 0 || strlen ($fees_film) > 12  || strlen ($info_film) < 2 || strlen ($info_film) > 200 || strlen ($full_info_film) < 100 || strlen ($full_info_film) > 1000) {
        $error_message = "Not all is filled";
    } else {
        $existence = select_one('films', ['name_film' => $name_film]);

        if ($existence !== false && $existence['name_film'] === $name_film) {
            $error_message = "This name of the film already have had in database, choose another!";
        } else {
            $post = [
                'name_film' => $name_film,
                'year_film' => $year_film,
                'country_film' => $country_film,
                'genre_film' => $genre_film,
                'director_film' => $director_film,
                'scenario_film' => $scenario_film,
                'mounting_film' => $mounting_film,
                'composer_film' => $composer_film,
                'budget_film' => $budget_film,
                'fees_film' => $fees_film,
                'age_film' => $age_film,
                'info_film' => $info_film,
                'film_image' => $film_image,
                'full_info_film' => $full_info_film
            ];
            // insert in sql
            $id = insert("films", $post);
            // $topic = select_one('films', ['id' => $id]);
            // go to index page
            header('location: index.php');
        }
    }
} else {
    $name_film = '';
    $year_film = '';
    $country_film = '';
    $genre_film = '';
    $director_film = '';
    $scenario_film = '';
    $mounting_film = '';
    $composer_film = '';
    $budget_film = '';
    $fees_film = '';
    $age_film = '';
    $info_film = '';
    $full_info_film = '';
}

// if method post and get info about films
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $film = select_one('films', ['film_id' => $id]);
    $film_id = $film['film_id'];
    $name_film = $film['name_film'];
    $year_film = $film['year_film'];
    $country_film = $film['country_film'];
    $genre_film = $film['genre_film'];
    $director_film = $film['director_film'];
    $scenario_film = $film['scenario_film'];
    $mounting_film = $film['mounting_film'];
    $composer_film = $film['composer_film'];
    $budget_film = $film['budget_film'];
    $fees_film = $film['fees_film'];
    $age_film = $film['age_film'];
    $info_film = $film['info_film'];
    $film_image = $film['film_image'];
    $full_info_film = $film['full_info_film'];
} else {
    $film_id = '';
    $name_film = '';
    $year_film = '';
    $country_film = '';
    $genre_film = '';
    $director_film = '';
    $scenario_film = '';
    $mounting_film = '';
    $composer_film = '';
    $budget_film = '';
    $fees_film = '';
    $age_film = '';
    $info_film = '';
    $full_info_film = '';
}


// form for add new review
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_review'])) {
    $review_text = $_POST['review_text'];
    $review_film_id = $_POST['review_film_id'];
    $review_login = $_SESSION['login'];
    $review_grade = $_POST['review_grade'];
    if ($review_text === '') {
        $error_message = "Review is not filled";
    } else {
            $post = [
                'review_text' => $review_text,
                'review_film_id' => $review_film_id,
                'review_login' => $review_login,
                'review_grade' => $review_grade,
            ];
            $id = insert("reviews", $post);
    }
    $review_text = '';
    $review_film_id = '';
    $review_login = '';
    $review_grade = 0;
} 



