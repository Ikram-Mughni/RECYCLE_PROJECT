<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: homePage.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <title>Login – Recycle App</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
            color: #fff;
            background: url('donasibg.jpeg') center/cover fixed;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem 2.5rem;
            text-align: center;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
        }

        h2 {
            margin-bottom: 1.5rem;
            font-weight: 700;
            color: #00ffb3;
        }

        label {
            display: block;
            margin: 0.75rem 0 0.25rem;
            font-weight: 500;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            outline: none;
            transition: 0.2s;
        }

        input::placeholder {
            color: #ccc;
        }

        input:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: #00cc88;
            box-shadow: 0 0 0 0.2rem rgba(0, 204, 136, 0.2);
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 2.5rem;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 0.75rem;
            transform: translateY(-50%);
            cursor: pointer;
            user-select: none;
            font-size: 1.2rem;
            color: #ccc;
        }

        button {
            margin-top: 1.5rem;
            padding: 0.6rem 2rem;
            border: none;
            border-radius: 10px;
            background-color: #00cc88;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        button:hover {
            background-color: #00b377;
        }

        .message-error {
            color: #ff6b6b;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .message-success {
            color: #7fff7f;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        form.guest-login-button {
            margin-top: 1rem;
        }

        form.guest-login-button button {
            width: 100%;
            background-color: #555;
        }

        form.guest-login-button button:hover {
            background-color: #444;
        }

        p a {
            color: #00ffb3;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Login</h2>

        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] === "gagal")
                echo "<div class='message-error'>Username / password salah!</div>";
            elseif ($_GET['pesan'] === "logout")
                echo "<div class='message-success'>Anda telah logout.</div>";
            elseif ($_GET['pesan'] === "belum_login")
                echo "<div class='message-error'>Silakan login dulu.</div>";
        }
        ?>

        <!-- Form Login -->
        <form method="POST" action="cek_login.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required />

            <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" name="password" placeholder="Masukkan password" required />
                <span class="toggle-password" onclick="togglePassword('password', this)">👁️</span>
            </div>

            <button type="submit">Masuk</button>
        </form>

        <p>Belum punya akun? <a href="regist.php">Daftar di sini</a></p>

        <!-- Login sebagai tamu -->
        <form method="POST" action="guest_login.php" class="guest-login-button">
            <button type="submit">Masuk Sebagai Tamu</button>
        </form>
    </div>

    <script>
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                icon.textContent = "🙈";
            } else {
                input.type = "password";
                icon.textContent = "👁️";
            }
        }
    </script>
</body>

</html>