<?php
$conn = new mysqli("localhost", "root", "", "recycle");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM recycling_locations WHERE id=$id");
}

header("Location: worlds.php");
exit();
