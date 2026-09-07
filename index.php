<?php

session_start();

if (!isset($_SESSION['angkaRahasia'])) {
    $_SESSION['angkaRahasia'] = rand(1, 100);
    $_SESSION['percobaan'] = 0;
}

$angkaRahasia = $_SESSION['angkaRahasia'];

$pesan = "";
$selesai = false;

if (isset($_POST['reset'])) {

    $_SESSION['angkaRahasia'] = rand(1, 100);
    $_SESSION['percobaan'] = 0;

    header("Location: index.php");
    exit;
}

if (isset($_POST['tebakan'])) {

    $tebakan = (int) $_POST['tebakan'];

    $_SESSION['percobaan']++;

    if ($tebakan == $angkaRahasia) {

        $pesan = "🎉 Benar! Kamu berhasil menebak angka!";
        $selesai = true;

    } elseif ($tebakan < $angkaRahasia) {

        $pesan = "⬆️ Terlalu kecil! Coba angka yang lebih besar.";

    } else {

        $pesan = "⬇️ Terlalu besar! Coba angka yang lebih kecil.";

    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Game Tebak Angka</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f2f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .game {
            background: white;
            width: 350px;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        h1 {
            margin-bottom: 10px;
        }

        p {
            margin: 15px 0;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            background: #333;
            color: white;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            opacity: 0.8;
        }

        .percobaan {
            font-size: 14px;
            color: #666;
        }

    </style>

</head>

<body>

<div class="game">

    <h1>🎯 Tebak Angka</h1>

    <p>Tebak angka dari <b>1 sampai 100</b></p>

    <?php if ($pesan != ""): ?>

        <p><?= $pesan ?></p>

    <?php endif; ?>

    <?php if (!$selesai): ?>

        <form method="post">

            <input
                type="number"
                name="tebakan"
                min="1"
                max="100"
                placeholder="Masukkan angka..."
                required
            >

            <br>

            <button type="submit">Tebak</button>

        </form>

        <p class="percobaan">
            Percobaan: <?= $_SESSION['percobaan'] ?>
        </p>

    <?php else: ?>

        <p>
            Kamu menebak dalam
            <b><?= $_SESSION['percobaan'] ?></b>
            percobaan.
        </p>

        <form method="post">

            <button type="submit" name="reset">
                🔄 Main Lagi
            </button>

        </form>

    <?php endif; ?>

</div>

</body>

</html>
