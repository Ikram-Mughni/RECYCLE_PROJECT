<?php
session_start();
session_unset();
session_destroy();

session_start();
$_SESSION['guest'] = true;

header("Location: homePage.php");
exit();
