<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recycle";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT id, name, address, city, contact_info FROM recycling_locations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>World - Recycling Locations</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50;
            color: #ecf0f1;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            color: #00ffb3;
            text-align: center;
            margin-bottom: 30px;
        }

        .location-card {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .btn-group {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Recycling Locations</h1>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='location-card'>";
                echo "<h5>" . htmlspecialchars($row["name"]) . "</h5>";
                echo "<p><strong>Address:</strong> " . htmlspecialchars($row["address"]) . "</p>";
                echo "<p><strong>City:</strong> " . htmlspecialchars($row["city"]) . "</p>";
                echo "<p><strong>Contact Info:</strong> " . htmlspecialchars($row["contact_info"]) . "</p>";
                echo "<div class='btn-group'>";
                echo "<a href='edit_location.php?id=" . $row["id"] . "' class='btn btn-success btn-sm'>Edit</a> ";
                echo "<a href='delete_location.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus lokasi ini?');\">Hapus</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div class='alert alert-warning' role='alert'>Tidak ada lokasi daur ulang ditemukan.</div>";
        }

        $conn->close();
        ?>

        <a href="homepage.php" class="btn btn-secondary btn-lg mt-4">Back</a>
    </div>

</body>

</html>