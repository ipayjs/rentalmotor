<?php
include "logic.php";

$proces = new nyewa();
$proces->setHarga(70000,150000,500000,70000);

if(isset($_POST['kirim'])) {
    $proces->waktu = $_POST['time'];
    $proces->jenisMotor = $_POST['jenis'];
    echo "<br>";

    $proces->cetakPembelian();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <form action="" method = "post">
            <label for="nama">nama pelanggan :</label>
            <input type="text" name = "nama" required>
            <br><br>
            <label for="time">lama waktu rental (per hari)</label>
            <input type="text" name = "time" required>
            <br><br>
            <label for="jenis">Jenis Motor</label>
            <select name="jenis" id=""required>
                <option value="nmax">nmax</option>
                <option value="ZX25">ZX25</option>
                <option value="H2">H2</option>
                <option value="SUPRA">SUPRA</option>
                <br><br>
            </select>
            <button name = "kirim" required>kirim</button>
        </form>
    </center>
</body>
</html>