<?php
session_start();

// koneksi ke DB recycle
$mysqli = new mysqli('localhost', 'root', '', 'recycle');
if ($mysqli->connect_errno) die("Koneksi gagal: " . $mysqli->connect_error);

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $u = $mysqli->real_escape_string($_POST['username']);
    $p = $mysqli->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username='$u' AND password='$p' LIMIT 1";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows) {
        $_SESSION['username'] = $u;
        $_SESSION['status']   = "login";
        header("Location: homePage.php");
    } else {
        header("Location: index.php?pesan=gagal");
    }
} else {
    header("Location: index.php");
}
exit();
