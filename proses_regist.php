<?php
// proses_register.php
$mysqli = new mysqli('localhost', 'root', '', 'recycle');
if ($mysqli->connect_errno) die("Koneksi gagal: ".$mysqli->connect_error);

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password2'])) {

    $u  = $mysqli->real_escape_string($_POST['username']);
    $p1 = $mysqli->real_escape_string($_POST['password']);
    $p2 = $mysqli->real_escape_string($_POST['password2']);

    // cek konfirmasi password
    if ($p1 !== $p2) {
        header("Location: regist.php?pesan=pw_tidak_sama");
        exit();
    }

    // cek apakah username sudah ada
    $cek = $mysqli->query("SELECT username FROM admin WHERE username='$u' LIMIT 1");
    if ($cek && $cek->num_rows) {
        header("Location: regist.php?pesan=username_ada");
        exit();
    }

    // simpan (tanpa hash – sesuai instruksi)
    if ($mysqli->query("INSERT INTO admin (username, password) VALUES ('$u','$p1')")) {
        header("Location: index.php?pesan=berhasil_daftar");
    } else {
        echo "Gagal menyimpan: ".$mysqli->error;
    }

} else {
    header("Location: regist.php");
}
exit();
