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
                        <form action="" method="get">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ttl">Tempat Tanggal Lahir</label>
                                <input type="text" name="ttl" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="jk" id="" value="L"> Laki-laki
                                    </label>&nbsp;&nbsp;
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="jk" id="" value="P"> Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Usia</label>
                                <input type="number" min="0" name="usia" id="" class="form-control">
                            </div>
                            <hr>
                            <a href="form.php" class="btn btn-info">Reload</a>
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

                if ($_GET['alamat'] == "") {
                    $error .= "<li>Alamat tidak boleh kosong</li>";
                }

                if ($_GET['ttl'] == "") {
                    $error .= "<li>Tempat tanggal lahir tidak boleh kosong</li>";
                }

                if (!isset($_GET['jk'])) {
                    $error .= "<li>Jenis kelamin tidak boleh kosong</li>";
                }

                if ($_GET['usia'] == "") {
                    $error .= "<li>Usia tidak boleh kosong</li>";
                }

            ?>
                <div class="col-md-6">
                    <?php if ($error != "") { ?>
                        <div class="card mt-5">
                            <div class="card-header">Error Validasi</div>
                            <div class="card-body text-danger">
                                <ul>
                                    <?= $error; ?>
                                </ul>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Biodata Saya</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td><?= $_GET['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>:</td>
                                        <td><?= $_GET['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Tanggal Lahir</th>
                                        <td>:</td>
                                        <td><?= $_GET['ttl']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>:</td>
                                        <td><?= $_GET['jk']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Usia</th>
                                        <td>:</td>
                                        <td><?= $_GET['usia']; ?></td>
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