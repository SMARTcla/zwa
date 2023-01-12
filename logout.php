<?php
// session start and logout delete session info
session_start();
include("redirect.php");

unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['user_type']);
redirect_to();
?>