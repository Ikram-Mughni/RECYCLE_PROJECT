<?php
session_start();
$_SESSION['guest'] = true;
header("Location: homePage.php");
exit();
