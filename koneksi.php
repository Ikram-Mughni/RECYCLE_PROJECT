<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "recycle";

// Membuat koneksi
$mysqli = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($mysqli->connect_errno) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
