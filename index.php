<?php

session_start();

echo "<h1>Game Tebak Angka</h1>";

if (!isset($_SESSION['angkaRahasia'])) {
    $_SESSION['angkaRahasia'] = rand(1, 100);
}

$angkaRahasia = $_SESSION['angkaRahasia'];

if (isset($_POST['tebakan'])) {

    $tebakan = $_POST['tebakan'];

    if ($tebakan == $angkaRahasia) {
        echo "<p>🎉 Benar! Kamu berhasil menebak angka.</p>";
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
