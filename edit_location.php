<?php
$conn = new mysqli("localhost", "root", "", "recycle");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $conn->query("SELECT * FROM recycling_locations WHERE id = $id")->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $contact = $_POST["contact_info"];

    $conn->query("UPDATE recycling_locations SET name='$name', address='$address', city='$city', contact_info='$contact' WHERE id=$id");
    header("Location: worlds.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Location</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
    <h2>Edit Location</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($data['name']) ?>" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="address" class="form-control" required><?= htmlspecialchars($data['address']) ?></textarea>
        </div>
        <div class="form-group">
            <label>Kota</label>
            <input type="text" name="city" class="form-control" value="<?= htmlspecialchars($data['city']) ?>">
        </div>
        <div class="form-group">
            <label>Kontak</label>
            <input type="text" name="contact_info" class="form-control" value="<?= htmlspecialchars($data['contact_info']) ?>">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="worlds.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
