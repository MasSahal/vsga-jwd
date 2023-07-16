<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap1.css" />
    <title>SIMBATA - Sistem Informasi Manajemen Lomba Terintegrasi</title>
</head>

<body class="bg-secondary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Form Biodata</h3>
                    </div>
                    <div class="card-body">
                        <form class="user" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Nama Pemohon</label>
                                <input type="text" name="nama_pemohon" class="form-control" vequiredalue="<?php echo $rp['nama_pemohon'] ?? 0; ?>" />
                            </div>

                            <div class="form-group">
                                <label>No.Surat Permohonan Sewa</label>
                                <input type="hidden" name="id_pemohon">
                                <input type="text" name="no_srt_permohonan_sewa" class="form-control" vequiredalue="<?php echo $rp['no_srt_permohonan_sewa'] ?? 0; ?>" />
                            </div>

                            <div class="form-group">
                                <label>Lokasi Sewa</label>
                                <input type="text" name="lokasi_sewa" class="form-control" vequiredalue="<?php echo $rp['lokasi_sewa'] ?? 0; ?>" />
                            </div>

                            <div class="form-group">
                                <label>Luas Sewa</label>
                                <input type="text" name="luas_sewa_input" id="luas_sewa_input" class="form-control" vequiredalue="<?php echo $rp['luas_sewa'] ?? 10; ?>" />
                            </div>

                            <div class="form-group">
                                <label>Periode Sewa</label>
                                <input type="text" name="periode_sewa" id="periode_sewa" class="form-control" vequiredalue="<?php echo $rp['periode_sewa'] ?? 0; ?>" />
                            </div>

                            <div class="form-group">
                                <label>Jangka Waktu Sewa</label>
                                <input type="text" name="jangka_wkt_sewa_input" id="jangka_wkt_sewa_input" class="form-control" vequiredalue="<?php echo $rp['jangka_wkt_sewa'] ?? 0; ?>" />
                            </div>

                            <div class="form-group">
                                <label>Peruntukan Sewa</label>
                                <input type="text" name="peruntukan_sewa" class="form-control" vequiredalue="<?php echo $rp['peruntukan_sewa'] ?? "" ?>" />
                            </div>

                            <div class="form-group">
                                <label>Objek Sewa</label>
                                <input type="text" name="objek_sewa" class="form-control" vequiredalue="<?php echo $rp['objek_sewa'] ?? ""; ?>" />
                            </div>

                            <h2>Form Perhitungan Sewa</h2>
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="harga_pokok">Harga Pokok:</label>
                                    <input type="number" name="harga_pokok" class="form-control" value="0" required>
                                </div>

                                <div class="form-group">
                                    <label for="faktor_penyesuaian">Faktor Penyesuaian:</label>
                                    <select name="faktor_penyesuaian" class="form-control" id="faktor_penyesuaian" required>
                                        <option disabled selected>Pilih Faktor Penyesuaian</option>
                                        <option value=" 1.0">100%</option>
                                        <option value="1.3">130%</option>
                                        <option value="1.6">160%</option>
                                    </select>
                                </div>

                                <input type="submit" name="submit" value="Hitung" class="btn btn-primary">

                                <?php
                                if (isset($_POST['submit'])) {
                                    $harga_pokok = $_POST['harga_pokok'];
                                    $luas_sewa = $_POST['luas_sewa_input'];
                                    $faktor_penyesuaian = $_POST['faktor_penyesuaian'];
                                    $periode_sewa = $_POST['periode_sewa'];
                                    $jangka_wkt_sewa = $_POST['jangka_wkt_sewa_input'];

                                    if ($periode_sewa == "Tahun") {
                                        // Hitung sewa tahun
                                        $sewa_total = ($harga_pokok * $luas_sewa * $faktor_penyesuaian) * $jangka_wkt_sewa;
                                    } elseif ($periode_sewa == "Bulan") {
                                        // Hitung sewa bulan
                                        $sewa_total = ($harga_pokok * $luas_sewa * $faktor_penyesuaian) / 12 * $jangka_wkt_sewa;
                                    } elseif ($periode_sewa == "Hari") {
                                        // Hitung sewa hari
                                        $sewa_total = ($harga_pokok * $luas_sewa * $faktor_penyesuaian) / 365 * $jangka_wkt_sewa;
                                    }
                                }
                                ?>
                                <br>
                                <label>Total Sewa:</label>
                                <input type="text" name="total_sewa" class="form-control" value="<?php echo isset($sewa_total) ? $sewa_total : '0'; ?>" id="total_sewa" required>
                            </form>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
      integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
      crossorigin="anonymous"
    ></script> -->
    <!-- <script src="js/"></script> -->
    <script src="js/bootstrap.js"></script>
    <script>
        $(document).on('change', '#faktor_penyesuaian', function() {
            let luas_sewa = parseFloat($('#luas_sewa_input').val());
            let jangka_wkt_sewa = parseFloat($('#jangka_wkt_sewa_input').val());
            let harga_pokok = parseFloat($('#harga_pokok').val())
            let faktor_penyesuaian = parseFloat($('#faktor_penyesuaian').val());

            let periode_sewa = parseFloat($('#periode_sewa').val());
            if (periode_sewa == "Tahun") {
                jangka_wkt_sewa = jangka_wkt_sewa;
            } else if (periode_sewa == "Bulan") {
                jangka_wkt_sewa = jangka_wkt_sewa * 12;
            } else if (periode_sewa == "Hari") {
                jangka_wkt_sewa = jangka_wkt_sewa / 30;
            }

            let sewa_total = (harga_pokok * luas_sewa * faktor_penyesuaian) * jangka_wkt_sewa;
            alert(jangka_wkt_sewa);
        });
    </script>
</body>

</html>