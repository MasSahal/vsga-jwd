<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="css/bootstrap1.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>SIMBATA - Sistem Informasi Manajemen Lomba Terintegrasi</title>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Form Biodata</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="" class="form-control" value="<?= isset($_GET['nama']) ? $_GET['nama'] : ''; ?>">
                            </div>
                            <div class=" form-group">
                                <label for="">Nilai</label>
                                <input type="number" min="0" name="nilai" id="" class="form-control" value="<?= isset($_GET['nilai']) ? $_GET['nilai'] : ''; ?>">
                            </div>
                            <hr>
                            <a href="coba-p10.php" class="btn btn-info">Reload</a>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

            <?php if (isset($_GET['simpan'])) {;

                $error = "";
                // var_dump($_GET);
                if ($_GET['nama'] == "") {
                    $error .= "<li>Nama tidak boleh kosong</li>";
                }

                if ($_GET['nilai'] == "") {
                    $error .= "<li>Nilai tidak boleh kosong</li>";
                }

                if (is_numeric($_GET['nama'])) {
                    $error .= "<li>Nama tidak boleh angka</li>";
                }

                $nilai = $_GET['nilai'];
                if ($nilai >= 80) {
                    $predikat = "A";
                    $status = "<strong class='text-success'>Selamat Anda Lulus!</strong>";
                } else if ($nilai >= 70) {
                    $predikat = "B";
                    $status = "<strong class='text-success'>Selamat Anda Lulus!</strong>";
                } else if ($nilai >= 60) {
                    $predikat = "C";
                    $status = "<strong class='text-success'>Selamat Anda Lulus!</strong>";
                } else {
                    $predikat = "D";
                    $status = "<strong class='text-danger'>Maaf, Anda Tidak Lulus!</strong>";
                }
            ?>
                <div class="col-md-6">
                    <?php if ($error != "") { ?>
                        <div class="card mt-5">
                            <div class="card-header">Data Nilai</div>
                            <div class="card-body text-danger">
                                <ul>
                                    <?= $error; ?>
                                </ul>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3><?= $status; ?></h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td><?= $_GET['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nilai</th>
                                        <td>:</td>
                                        <td><?= $_GET['nilai']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Predikat</th>
                                        <td>:</td>
                                        <td><?= $predikat; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php } ?>

                </div>

            <?php }; ?>
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
        function cek_koneksi() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "koneksi.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Request was successful
                    if (xhr.responseText === "success") {
                        alert("Ciee berhasil menjalin hubungan dengan MySQL 😁");
                    } else {
                        alert("Yahh gagal nyambung 😭😭😭");
                    }
                } else {
                    alert("Error: " + xhr.status);
                }
            };
            xhr.send();
        }
    </script>
</body>

</html>