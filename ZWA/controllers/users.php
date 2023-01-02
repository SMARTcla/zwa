<?php include("database/db.php");?>

<?php 
if(isset($_POST['login'])){
    // var_dump($_POST);
    // die();
    $login = $_POST['login'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $cpassword = password_hash($_POST['cpassword'],PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];
    $post = [
        'login' => $login,
        'firstname' => $firstname,
        'email' => $email,
        'password' => $password,
        'user_type' => $user_type
    ];
    insert("users", $post);
    // tt($post);
}
?>