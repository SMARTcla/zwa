<?php include("database/db.php");
error_reporting(0);
$error_message = '';
$login = '';
$firstname = '';
$email = '';
// add session for user to add review and mode
function add_session($user)
{
    header('location: index.php');
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['login'];
    $_SESSION['user_type'] = $user['user_type'];
    $_SESSION['mode'] = 'dark';
    header('Location: index.php');
}
// register form check
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button_register'])) {
    // get all from html
    $login = trim($_POST['login']);
    $firstname = trim($_POST['firstname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    // check info adn write an error if need
    if ($login === '' || $firstname === '' || $email === '' || $password === '' || $cpassword === '') {
        $error_message = "Not all is filled";
    } elseif ($password !== $cpassword) {
        $error_message = "Error passwords don't match";
    } else {
        $existence = select_one('users', ['email' => $email]);

        if ($existence !== false && $existence['email'] === $email) {
            $error_message = "This email already have had in database, choose other!";
        } else {
            $existence = select_one('users', ['login' => $login]);
            if ($existence !== false && $existence['login'] === $login) {
                $error_message = "This login already have had in database, choose other!";
            } else {
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $post = [
                    'login' => $login,
                    'firstname' => $firstname,
                    'email' => $email,
                    'password' => $pass,
                    'user_type' => $user_type
                ];
                // add to table
                $id = insert("users", $post);
                $user = select_one('users', ['id' => $id]);
                
                add_session($user);
                
            }
        }
    }
} else {
    $login = '';
    $firstname = '';
    $email = '';
}
// login form check
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button_login'])) {
    // add info from html
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    // check data
    if ($login === '' || $password === '') {
        $error_message = "Not all is filled";
    } else {
        $existence = select_one('users', ['login' => $login]);
        if ($existence && password_verify($password, $existence['password'])) {
            // add session if all good
            add_session($existence);
        } else {
            $error_message = "Wrong password or login";
        }
    }
} else {
    $login = '';
}

    ?>