<?php

echo "<h1>Game Tebak Angka</h1>";

$angkaRahasia = rand(1, 100);

if (isset($_POST['tebakan'])) {
    $tebakan = $_POST['tebakan'];

    if ($tebakan == $angkaRahasia) {
        echo "<p>Benar! Kamu berhasil menebak angka.</p>";
    } else {
        echo "<p>Salah! Coba lagi.</p>";
    }
}

?>

<form method="post">
    <label>Masukkan tebakan:</label>
    <input type="number" name="tebakan" min="1" max="100" required>
    <button type="submit">Tebak</button>
</form>
