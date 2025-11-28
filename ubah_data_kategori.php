<?php

    session_start();
        if( !isset($_SESSION["login"]) ) {
            header("Location: login.php");
            exit;
        }

    require("function.php");


    $id = $_GET['id'];


    $query = query("SELECT * FROM kategori WHERE id_kategori = $id")[0];
    $kategori = $query;


    // ketika tombol submit nya di klik
    if(isset($_POST['tombol_submit'])){
       
        if(ubah_data_kategori($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil diubah di database!');
                    document.location.href = 'halaman_kategori.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data gagal diubah di database!');
                    document.location.href = 'halaman_kategori.php';
                </script>
            ";
        }


    }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


    <!-- NAVBAR SECTION START  -->
     <nav class="navbar navbar-expand-lg navbar-light white bg-info">
    <div class="container-fluid ms-5">
        <a class="navbar-brand" href="#">SIMBS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="halaman_buku.php">Halaman Buku</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="halaman_kategori.php">Halaman Kategori</a>
            
        </ul>
            <span class="navbar-text text white list-unstyled me-5">
                </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Halo, <?= $_SESSION['username']; ?>
                        </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </span>

        </div>
    </div>
    </nav>
    <!-- NAVBAR SECTION END  -->
   
    <div class="p-4 container">
        <div class="row">
            <h1 class="mb-2">Ubah Data Kategori</h1>
            <a href="halaman_kategori.php" class="mb-2">Kembali</a>
            <div class="col-md-6">
                <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
                <form action="" method="POST">
                    <!-- input text bayangan -->
                    <input type="hidden" class="form-control" name="id_kategori" id="id_kategori" value="<?= $kategori['id_kategori'] ?>" autocomplete="off">
                   
                    <div class="mb-3">
                        <label class="form-label fw-bold">Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $kategori['kategori'] ?>" autocomplete="off">
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" name="tombol_submit" class="btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>