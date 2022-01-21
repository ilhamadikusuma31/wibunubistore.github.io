<?php 

require "function.php";

$barang = query_nya("SELECT * FROM barang WHERE diskon_id = 1");

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

    <!-- Carousel -->
    <section class="carousel w-100 m-auto">
      <div id="carouselExampleCaptions" class="carousel slide carousel-fade mt-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/kiritoRed.jpg" class="d-block w-100" alt="img/kiritoRed.jpg" />
            <div class="carousel-caption d-none d-md-block">
              <!-- <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p> -->
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/komiSanRed.jpg" class="d-block w-100" alt="img/komiSanRed.jpg" />
            <div class="carousel-caption d-none d-md-block">
              <!-- <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p> -->
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/5cmPerSec.jpg" class="d-block w-100" alt="img/5cmPerSec.jpg" />
            <div class="carousel-caption d-none d-md-block">
              <!-- <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p> -->
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" style="background-color: rgb(44, 63, 63)" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" style="background-color: rgb(44, 63, 63)" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!-- Akhir Carousel -->

    <!-- diskon -->
    <section id="diskon">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>diskon</h2>
          </div>
        </div>
        <div class="row justify-content-center m-auto">
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
              <li class="list-group-item"><?= $kondisi?></li>
              <li class="list-group-item"><?= $b['berat'] ?>⠀gram</li>
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
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,96L48,106.7C96,117,192,139,288,160C384,181,480,203,576,202.7C672,203,768,181,864,154.7C960,128,1056,96,1152,96C1248,96,1344,128,1392,144L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- Akhir diskon -->

    <!-- Info Jejepangan dan Tentang-->
    <section class="info tentang" style="background-color: #fff">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3 class="text-center">Events</h3>
            <div id="carouselExampleCaptions" class="carousel slide carousel-fade m-auto w-100" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="img/kiritoRed.jpg" class="d-block w-100" alt="img/kiritoRed.jpg" />
                  <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p> -->
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="img/komiSanRed.jpg" class="d-block w-100" alt="img/komiSanRed.jpg" />
                  <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p> -->
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="img/5cmPerSec.jpg" class="d-block w-100" alt="img/5cmPerSec.jpg" />
                  <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h3 class="text-center">Tentang</h3>
            <div id="carouselExampleCaptions" class="carousel slide carousel-fade m-auto w-100" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="img/kiritoRed.jpg" class="d-block w-100" alt="img/kiritoRed.jpg" />
                  <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p> -->
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="img/komiSanRed.jpg" class="d-block w-100" alt="img/komiSanRed.jpg" />
                  <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p> -->
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="img/5cmPerSec.jpg" class="d-block w-100" alt="img/5cmPerSec.jpg" />
                  <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="rgb(197, 198, 209)"
          fill-opacity="1"
          d="M0,224L80,234.7C160,245,320,267,480,250.7C640,235,800,181,960,176C1120,171,1280,213,1360,234.7L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- Akhir Info Jejepangan -->

    <footer class="m-auto">
      <div class="container mb-5">
        <div class="row">
          <div class="col-md-5">
            <img src="img/logoWN.png" width="100" alt="" />
          </div>
          <div class="col-md-4 mt-4">
            <p class="fw-bold">Lainnya Tentang WibuNubi</p>
            <p class="mb-md-1">Tentang Kami</p>
            <p class="mb-md-1">How we make people become wibu</p>
          </div>
          <div class="col-md-3 mt-4">
            <p class="fw-bold">Main Menu</p>
            <p class="mb-md-1">Action Figure</p>
            <p class="mb-md-1">Bluray</p>
            <p class="mb-md-1">Manga</p>
            <p class="mb-md-1">Dakimakura</p>
          </div>
        </div>
      </div>
    </footer>

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
