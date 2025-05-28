<?php
// === KONFIGURASI DATABASE ===
$pdo = new PDO("mysql:host=localhost;dbname=recycle", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// === PROSES FORM ===
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donor_name     = trim($_POST['donor_name'] ?? '');
    $email          = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $phone          = trim($_POST['phone'] ?? '');
    $amount         = (float)($_POST['amount'] ?? 0);
    $currency       = $_POST['currency'] ?? 'IDR';
    $donation_type  = $_POST['donation_type'] ?? '';
    $waste_type_id  = $_POST['waste_type_id'] ?? null;
    $payment_method = $_POST['payment_method'] ?? '';
    $message        = trim($_POST['message'] ?? '');
    $subscribe      = isset($_POST['subscribe_newsletter']) ? 1 : 0;
    $agree          = isset($_POST['agree_terms']) ? 1 : 0;

    if ($donor_name === '') $errors[] = "Nama wajib diisi";
    if (!$email) $errors[] = "E-mail tidak valid";
    if ($amount <= 0) $errors[] = "Nominal harus > 0";
    if (!$agree) $errors[] = "Anda harus menyetujui syarat & ketentuan";

    if (!$errors) {
        $stmt = $pdo->prepare("
            INSERT INTO donations 
            (donor_name, email, phone, amount, currency, donation_type, waste_type_id, payment_method, message, subscribe_newsletter, agree_terms)
            VALUES (:donor_name, :email, :phone, :amount, :currency, :donation_type, :waste_type_id, :payment_method, :message, :subscribe, :agree)
        ");
        $stmt->execute([
            ':donor_name' => $donor_name,
            ':email' => $email,
            ':phone' => $phone ?: null,
            ':amount' => $amount,
            ':currency' => $currency,
            ':donation_type' => $donation_type,
            ':waste_type_id' => $waste_type_id ?: null,
            ':payment_method' => $payment_method,
            ':message' => $message ?: null,
            ':subscribe' => $subscribe,
            ':agree' => $agree
        ]);
        header("Location: donasi.php?success=1");
        exit;
    }
}

// === AMBIL DATA KATEGORI SAMPAH ===
$wasteTypes = $pdo->query("SELECT id, name FROM waste_types ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Donasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('donasibg.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 850px;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
            padding: 2.5rem;
            color: #fff;
        }

        h1 {
            text-align: center;
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #00ffb3;
        }

        .form-label,
        .form-check-label {
            font-weight: 500;
            color: #f1f1f1;
        }

        .form-control,
        .form-select,
        textarea {
            background-color: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .form-control::placeholder,
        textarea::placeholder {
            color: #cccccc;
        }

        .form-control:focus,
        .form-select:focus,
        textarea:focus {
            background-color: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            border-color: #00cc88;
            box-shadow: 0 0 0 0.2rem rgba(0, 204, 136, 0.25);
            outline: none;
        }

        .form-select option {
            background-color: #333;
            color: #fff;
        }

        button.btn-primary {
            background-color: #00cc88;
            border-color: #00cc88;
            padding: 12px 28px;
            font-weight: 600;
            border-radius: 10px;
        }

        button.btn-primary:hover {
            background-color: #00b377;
            border-color: #00a86b;
        }

        .form-check-input {
            background-color: transparent;
            border: 1px solid #ccc;
        }

        .form-check-input:checked {
            background-color: #00cc88;
            border-color: #00cc88;
        }

        .sub-section {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            padding: 1.5rem;
            border-radius: 16px;
            margin-top: 2rem;
        }

        .sub-section h5 {
            font-weight: 600;
            color: #00ffb3;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
                margin: 1rem;
            }

            .sub-section {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Form Donasi</h1>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">Terima kasih! Donasi Anda berhasil dicatat.</div>
        <?php endif; ?>

        <?php if ($errors): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $e) echo "<li>$e</li>"; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" class="row g-3">
            <!-- Bagian utama -->
            <div class="col-md-6">
                <label class="form-label">Nama Lengkap</label>
                <input name="donor_name" class="form-control" required value="<?= htmlspecialchars($_POST['donor_name'] ?? '') ?>">
            </div>

            <div class="col-md-6">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>

            <div class="col-md-6">
                <label class="form-label">No. Telepon (opsional)</label>
                <input type="tel" name="phone" class="form-control" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Nominal</label>
                <input type="number" name="amount" step="0.01" min="1" class="form-control" required value="<?= htmlspecialchars($_POST['amount'] ?? '') ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Mata Uang</label>
                <select name="currency" class="form-select">
                    <?php foreach (['IDR', 'USD', 'EUR'] as $cur): ?>
                        <option value="<?= $cur ?>" <?= $cur == ($_POST['currency'] ?? 'IDR') ? 'selected' : '' ?>><?= $cur ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-12">
                <label class="form-label d-block">Jenis Donasi</label>
                <?php foreach (['Money' => 'Uang', 'Goods' => 'Barang', 'Service' => 'Jasa'] as $val => $label): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="donation_type" value="<?= $val ?>" <?= (($val == ($_POST['donation_type'] ?? 'Money')) ? 'checked' : '') ?>>
                        <label class="form-check-label"><?= $label ?></label>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-md-6">
                <label class="form-label">Kategori Barang (jika Barang)</label>
                <select name="waste_type_id" class="form-select">
                    <option value="">— pilih —</option>
                    <?php foreach ($wasteTypes as $wt): ?>
                        <option value="<?= $wt['id'] ?>" <?= $wt['id'] == ($_POST['waste_type_id'] ?? '') ? 'selected' : '' ?>>
                            <?= htmlspecialchars($wt['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label d-block">Metode Pembayaran</label>
                <?php foreach (['Transfer', 'CreditCard', 'eWallet', 'Cash'] as $pm): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="payment_method" value="<?= $pm ?>" <?= (($pm == ($_POST['payment_method'] ?? 'Transfer')) ? 'checked' : '') ?>>
                        <label class="form-check-label"><?= $pm ?></label>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Bagian terpisah -->
            <div class="col-12 sub-section">
                <h5>Pesan & Preferensi</h5>

                <div class="mb-3">
                    <label class="form-label">Pesan / Harapan</label>
                    <textarea name="message" rows="4" class="form-control"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="subscribe_newsletter" <?= isset($_POST['subscribe_newsletter']) ? 'checked' : '' ?>>
                    <label class="form-check-label">Kirimkan newsletter tentang kegiatan MagicVerse</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="agree_terms" required <?= isset($_POST['agree_terms']) ? 'checked' : '' ?>>
                    <label class="form-check-label">Saya menyetujui syarat & ketentuan</label>
                </div>
            </div>

            <div class="col-12 text-center">
                <button class="btn btn-primary mt-3">Kirim Donasi</button>
            </div>
        </form>
    </div>
</body>

</html>