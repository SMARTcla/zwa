<?php
// create new connection
$dsn = 'mysql:dbname=kononmi1;host=127.0.0.1';
$user = 'kononmi1';
$password = "webove aplikace";
try{
    $pdo = new PDO($dsn, $user, $password);
}catch(PDOException $i){
    die("Error connecting");
}
?>
