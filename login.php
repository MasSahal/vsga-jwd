<?php
$err_username = "";
$err_password = "";

if (isset($_POST['simpan'])) {;


    if ($_POST['nama'] == "") {
        $err_username = "Username tidak boleh kosong";
    }

    if ($_POST['password'] == "") {
        $err_username = "Password tidak boleh kosong";
    }

    $koneksi = mysqli_connect("localhost", "root", "", "db_simbata");
    if (!$koneksi) {
        die("Koneksi gagal : " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM ms_users WHERE username = '" . $_POST['nama'] . "' AND password = '" . $_POST['password'] . "'";
    $result = mysqli_query($koneksi, $sql);
    $jumlah = mysqli_num_rows($result);

    if ($jumlah > 0) {
        echo "<script>alert('Selamat, Anda berhasil Login!')</script>";
        header("Location: index.html");
    } else {
        echo "<script>alert('Maaf, Username atau Password Anda salah!')</script>";
    }

    mysqli_close($koneksi);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap1.css" />
    <title>SIMBATA - Sistem Informasi Manajemen Lomba Terintegrasi</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1533547477463-bcffb9ef386d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: fixed;
        }

        .layer {
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body class="bg-secondary">
    <div class="layer">
        <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                <div class="col-md-3">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3>Silahkan Login</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" id="" class="form-control">
                                    <small class="text-danger"><?= $err_username != "" ? $err_username : ''; ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="" class="form-control">
                                    <small class="text-danger"><?= $err_password != "" ? $err_password : ''; ?></small>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-info btn-block" name="simpan">Login</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</body>

</html>