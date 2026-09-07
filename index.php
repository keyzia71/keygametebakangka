<?php

echo "<h1>Game Tebak Angka</h1>";

$angkaRahasia = rand(1, 100);

?>

<form method="post">
    <label>Masukkan tebakan:</label>
    <input type="number" name="tebakan" min="1" max="100" required>
    <button type="submit">Tebak</button>
</form>
