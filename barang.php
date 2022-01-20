<?php 

require "function.php";

$barang = query_nya("SELECT * FROM barang WHERE kategori_id = $_GET[kategori_id]");

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
    <nav class="navbar navbar-expand-sm navbar-dark shadow-sm fixed-top" style="background-color: rgb(56, 67, 75)">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="img/logoWN.png" alt="" width="30" class="d-inline-block align-text" />
          WibuNubiStore
        </a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <ul class="navbar-nav m-auto">
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
          </ul>
        </div>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" style="border: 1px solid rgba(148, 143, 163, 0.671)" type="submit">Search</button>
        </form>

        <i class="bi bi-cart ms-4"></i>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Barang -->

    <section class="barang">
      <div class="row justify-content-center ms-md-5 me-md-5">
        <?php foreach($barang as $b): ?>
        <div class="col-md-3 mb-4">
          <div class="card">
            <img src="img/katalog/<?= $b['gambar']?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <p class="card-text"><?= $b['nama_barang'] ?></p>
              <h6>Deskripsi:</h6>
              <p class="card-text"><?= $b['deskripsi'] ?></p>
              <h6>kondisi:</h6>
              <p class="card-text"><?= $b['kondisi'] ?></p>
              <h6>berat(gram):</h6>
              <a href="#" class="btn btn-primary">Beli</a>
              <p style="float: right" class="m-2">Rp.<?= $b['harga'] ?></p>
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
  </body>
</html>

<!-- <script type="text/javascript">
  $(document).ready(function () {
    $(".carousel").carousel({
      interval: 8000,
    });
  });
</script> -->
