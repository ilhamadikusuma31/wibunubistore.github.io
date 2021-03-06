<?php 

require "function.php";

$barang = query_nya("SELECT * FROM barang WHERE kategori_id = $_GET[kategori_id]");
// $namaKategori = query_nya("SELECT nama_kategori FROM kategori Where kategori_id = $_GET[kategori_id]")[0]['nama_kategori'];


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Bootsrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />

    <!-- MY CSS  -->
    <link rel="stylesheet" href="css/style.css" />

    <title>WibuNubi | store</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: rgb(56, 67, 75)">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="img/logoWN.png" alt="" width="30" class="d-inline-block align-text" />
          WibuNubiStore
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="barang.php?kategori_id=1">Action Figure</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="barang.php?kategori_id=2">Manga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="barang.php?kategori_id=3">Bluray</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="barang.php?kategori_id=4">Dakimakura</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php"><b>Admin</b></a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-success" type="submit">Search</button>
            <a href="#"
              ><button class="btn"><i class="bi bi-cart ms-2 mt-2 text-secondary"></i></button
            ></a>
          </form>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Tombol ADD -->

    <!-- AkhirTombol ADD -->

    <!-- Barang -->
    <section class="barang">
      <div class="row justify-content-center me-5 ms-5">
        <!-- <h3><?= $namaKategori ?></h3> -->
        <?php foreach($barang as $b): ?>
        <div class="col-md-3 mb-4">
          <div class="card h-100" style="height: 0rem">
            <img src="img/katalog/<?= $b['gambar'] ?>" class="card-img-top" alt="..." width="200px"/>
            <div class="card-body">
              <h5 class="card-title"><?= $b['nama_barang'] ?></h5>
              <p class="card-text"><?= $b['deskripsi'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
            <?php 
              $kondisi = $b['kondisi_id'];
              $kondisi = query_nya("SELECT nama_kondisi FROM kondisi WHERE kondisi_id = '$kondisi'")[0]['nama_kondisi'];
              ?>
              <li class="list-group-item"><?= $kondisi ?></li>
              <li class="list-group-item"><?= $b['berat'] ?>???gram</li>
              <!-- <li class="list-group-item"><h6>Harga</h6><?= $b['harga'] ?></li> -->
            </ul>
            <div class="card-body">
              <button type="button" class="btn btn-outline-secondary" style="float:right;">Beli</button>
              <h6 style="float: left;" class="ms-1 mt-1">Rp.<?= $b['harga']  ?></h6>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </section>
    <!-- Akhir Barang -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>

<!-- <script type="text/javascript">
  $(document).ready(function () {
    $(".carousel").carousel({
      interval: 8000,
    });
  });
</script> -->
