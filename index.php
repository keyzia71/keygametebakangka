<?php

session_start();

echo "<h1>Game Tebak Angka</h1>";

if (!isset($_SESSION['angkaRahasia'])) {
    $_SESSION['angkaRahasia'] = rand(1, 100);
    $_SESSION['percobaan'] = 0;
}

$angkaRahasia = $_SESSION['angkaRahasia'];

if (isset($_POST['reset'])) {

    $_SESSION['angkaRahasia'] = rand(1, 100);
    $_SESSION['percobaan'] = 0;

    header("Location: index.php");
    exit;
}

if (isset($_POST['tebakan'])) {

    $tebakan = $_POST['tebakan'];

    $_SESSION['percobaan']++;

    if ($tebakan == $angkaRahasia) {

        echo "<p>🎉 Benar! Kamu berhasil menebak angka.</p>";
        echo "<p>Jumlah percobaan: " . $_SESSION['percobaan'] . "</p>";

        echo '
        <form method="post">
            <button type="submit" name="reset">Main Lagi</button>
        </form>
        ';

        exit;

    } elseif ($tebakan < $angkaRahasia) {

        echo "<p>⬆️ Terlalu kecil! Coba angka yang lebih besar.</p>";

    } else {

        echo "<p>⬇️ Terlalu besar! Coba angka yang lebih kecil.</p>";

    }
}

?>

<form method="post">
    <label>Masukkan tebakan:</label>
    <input type="number" name="tebakan" min="1" max="100" required>
    <button type="submit">Tebak</button>
</form>
