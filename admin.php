<?php 

require "function.php";

$barang = query_nya("SELECT * FROM barang");
$angka = 1;

$kondisi_id = query_nya("SELECT kondisi_id FROM kondisi WHERE nama_kondisi = 'Baru'")[0]['kondisi_id'];

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

    <!-- Barang -->
    <section class="barang container justify-content-center">
      <a href="tambah.php"> <button type="button" class="btn btn-info">Tambah</button></a>

      <h4 class="text-center">Daftar Barang</h4>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Edit</th>
            <th>Gambar</th>
            <th>Kategori</th>
            <th>Pabrik</th>
            <th>Kondisi</th>
            <th>Deskripsi</th>
            <th>Nama Barang</th>
            <th>Berat(gr)</th>
            <th>Harga</th>
            <th>Diskon</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($barang as $b): ?>
          <tr>
            <td><?= $angka++ ?></td>
            <?php $kategori = $b['kategori_id']; $kategori = query_nya("SELECT nama_kategori FROM kategori WHERE kategori_id = $kategori ")[0]['nama_kategori']?>
            <?php $pabrik = $b['pabrik_id']; $pabrik = query_nya("SELECT nama_pabrik FROM pabrik WHERE pabrik_id = $pabrik ")[0]['nama_pabrik']?>
            <?php $diskon = $b['diskon_id']; $diskon = query_nya("SELECT status FROM diskon WHERE diskon_id = $diskon ")[0]['status']?>
            <td>
              <a href="modif.php?id=<?= $b['barang_id']  ?>"><button type="button" class="btn btn-warning">modif</button></a>
              <a href="hapus.php?id=<?= $b['barang_id']  ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><button type="button" class="btn btn-danger mt-1">hapus</button></a>
            </td>
            <td><img src="img/katalog/<?= $b['gambar']  ?>" width="150px" /></td>
            <td><?=$kategori ?></td>
            <td><?= $pabrik  ?></td>
            <?php 
              $kondisi = $b['kondisi_id'];
              $kondisi = query_nya("SELECT nama_kondisi FROM kondisi WHERE kondisi_id = '$kondisi'")[0]['nama_kondisi'];
              ?>
            <td><?= $kondisi  ?></td>
            <td><?= $b['deskripsi']  ?></td>
            <td><?= $b['nama_barang']  ?></td>
            <td><?= $b['berat']  ?></td>
            <td><?= $b['harga']  ?></td>
            <td><?= $diskon  ?></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </section>
    <!-- Akhir Barang -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>

<script>
  $(document).ready(function () {
    $(".table").DataTable();
  });
</script>
