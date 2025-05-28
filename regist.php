<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <title>Registrasi – Recycle App</title>

    <!-- ▸ CSS eksternal (jika ada) -->
    <link rel="stylesheet" href="style.css" />

    <!-- ▸ CSS internal -->
    <style>
        /* ---------- Global ---------- */
        * {
            box-sizing: border-box;
        }

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

        /* ---------- Container ---------- */
        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem 2.5rem;
            text-align: center;
            background: rgba(0, 0, 0, .5);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 0 25px rgba(0, 0, 0, .3);
        }

        /* ---------- Teks ---------- */
        h2 {
            margin-bottom: 1.5rem;
            font-weight: 700;
            color: #00ffb3;
        }

        label {
            display: block;
            margin: .75rem 0 .25rem;
            font-weight: 500;
            text-align: left;
        }

        /* ---------- Input ---------- */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: .5rem;
            border: 1px solid rgba(255, 255, 255, .3);
            border-radius: 8px;
            background: rgba(255, 255, 255, .1);
            color: #fff;
            outline: none;
            transition: .2s;
        }

        input::placeholder {
            color: #ccc;
        }

        input:focus {
            background: rgba(255, 255, 255, .15);
            border-color: #00cc88;
            box-shadow: 0 0 0 .2rem rgba(0, 204, 136, .2);
        }

        /* ---------- Tombol ---------- */
        button {
            margin-top: 1.5rem;
            padding: .6rem 2rem;
            border: none;
            border-radius: 10px;
            background: #00cc88;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        button:hover {
            background: #00b377;
        }

        /* ---------- Link ---------- */
        p a {
            color: #00ffb3;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
        }

        p a:hover {
            text-decoration: underline;
        }

        /* ---------- Error ---------- */
        p.error {
            color: #ff6b6b;
            font-weight: bold;
        }

        /* ---------- Password eye ---------- */
        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 2.5rem;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: .75rem;
            transform: translateY(-50%);
            font-size: 1.2rem;
            color: #ccc;
            cursor: pointer;
            user-select: none;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Registrasi Akun</h2>

        <?php
        if (isset($_GET['pesan']) && $_GET['pesan'] === "username_ada")
            echo "<p class='error'>Username sudah dipakai, coba yang lain.</p>";
        if (isset($_GET['pesan']) && $_GET['pesan'] === "pw_tidak_sama")
            echo "<p class='error'>Konfirmasi password tidak cocok.</p>";
        ?>

        <form method="POST" action="proses_register.php">
            <!-- Username -->
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required />

            <!-- Password -->
            <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" name="password" required placeholder="Password" />
                <span class="toggle-password" onclick="togglePassword('password', this)">👁️</span>
            </div>

            <!-- Konfirmasi Password -->
            <label for="password2">Konfirmasi Password</label>
            <div class="password-wrapper">
                <input type="password" id="password2" name="password2" required placeholder="Konfirmasi Password" />
                <span class="toggle-password" onclick="togglePassword('password2', this)">👁️</span>
            </div>

            <button type="submit">Daftar</button>
        </form>

        <p><a href="index.php">← Kembali ke Login</a></p>
    </div>

    <!-- ▸ JavaScript -->
    <script>
        /**
         * Toggle visibilitas password
         * @param {string} inputId  id input password
         * @param {HTMLElement} icon elemen ikon yang diklik
         */
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            icon.textContent = isHidden ? '🙈' : '👁️';
        }
    </script>
</body>

</html>