<?php


$nama = "Sahal";

function cetak_nama($nama)
{
    echo "Nama saya adalah $nama";
}

cetak_nama($nama);

/* ================== */
echo "<br><br>";
/* ================== */

function hitung_segitiga($a, $t)
{
    $luas = 0.5 * $a * $t;
    return $luas;
}

echo "Luas segitiga dengan alas 10 dan tinggi 5 adalah " . hitung_segitiga(10, 5);


/* ================== */
echo "<br><br>";
/* ================== */

function hitung_pajak($gaji)
{
    if ($gaji > 5000000) {
        $pajak = 0.25 * $gaji;
    } else {
        $pajak = 0.15 * $gaji;
    }

    return $pajak;
}
$gaji = 4000000;
echo "Gaji : " . $gaji . "<br>";
echo "Pajak : " . hitung_pajak($gaji) . "<br>";
echo "gaji anda setelah pajak adalah " . ($gaji - hitung_pajak($gaji)) . "<br>";


/* ================== */
echo "<br><br>";
/* ================== */

function hitung_pangkat($angka, $pangkat)
{
    $hasil = 1;
    for ($i = 1; $i <= $pangkat; $i++) {
        $hasil = $hasil * $angka;
    }
    return $hasil;
}

echo "Hasil dari 2 pangkat 3 adalah " . hitung_pangkat(2, 3) . "<br>";
