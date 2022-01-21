<?php 

require "function.php";


$kategori = query_nya("SELECT nama_kategori FROM kategori")[1]; 

// $kondisi_id = query_nya("SELECT kondisi_id FROM kondisi WHERE nama_kondisi = 'Baru'")[0]['kondisi_id']; 
// var_dump($kondisi_id);

if(isset($_POST["submit"])){
  if(tambah($_POST)>0){ echo "
<script>
  alert('data berhasil ditambakan');
  document.location.href = 'admin.php';
</script>
"; } else{ echo "
<script>
  alert('data gagal ditambakan');
  document.location.href = 'admin.php';
</script>
"; } } ?>

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
    <!-- tambah -->
    <section class="tambahdata">
      <div class="container">
        <div class="row justify-content-center">
          <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
            <strong>Data Berhasil ditambahkan</strong> keep ganbaru
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <div class="col text-center">
            <h2>Tambah Data Baru</h2>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-6">
              <form name="contact-form" action="" method="post" enctype="multipart/form-data">
                <div class="mb-md-1">
                  <label for="gambar" class="form-label">Gambar</label>
                  <input type="file" class="form-control" id="gambar" aria-describedby="gambar" name="gambar" required />
                </div>
                <div class="mb-md-1">
                  <label for="exampleFormControlSelect1">Kategori</label>
                  <select class="form-control" id="exampleFormControlSelect1" name='kategori'>
                    <?php $kategori = query_nya("SELECT * FROM kategori")?>
                    <?php for($i = 0; $i< count($kategori); $i++): ?>
                    <option><?=($kategori[$i]['nama_kategori']) ?></option>
                    <?php endfor ?>
                  </select>
                </div>
                <div class="mb-md-1">
                <label for="exampleFormControlSelect1">Pabrik</label>
                  <select class="form-control" id="exampleFormControlSelect1" name='pabrik'>
                    <?php $pabrik = query_nya("SELECT * FROM pabrik")?>
                    <?php for($i = 0; $i< count($pabrik); $i++): ?>
                    <option><?=($pabrik[$i]['nama_pabrik']) ?></option>
                    <?php endfor ?>
                  </select>
                </div>
                <div class="mb-md-1">
                <label for="exampleFormControlSelect1">Diskon</label>
                  <select class="form-control" id="exampleFormControlSelect1" name='diskon'>
                    <?php $diskon = query_nya("SELECT * FROM diskon")?>
                    <?php for($i = 0; $i< count($diskon); $i++): ?>
                    <option><?=($diskon[$i]['status']) ?></option>
                    <?php endfor ?>
                  </select>
                </div>
                <div class="mb-md-1">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <input type="text" class="form-control" id="deskripsi" aria-describedby="deskripsi" name="deskripsi" />
                </div>
                <div class="mb-md-1">
                  <label for="nama_barang" class="form-label">Nama Barang</label>
                  <input type="text" class="form-control" id="nama_barang" aria-describedby="nama_barang" name="nama_barang" required />
                </div>
                <div class="mb-md-1">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="text" class="form-control" id="harga" aria-describedby="harga" name="harga" required />
                </div>
                <div class="mb-md-1">
                  <label for="berat" class="form-label">Berat</label>
                  <input type="text" class="form-control" id="berat" aria-describedby="berat" name="berat" required />
                </div>
                <div class="mb-md-1">
                <label for="exampleFormControlSelect1">Kondisi</label>
                  <select class="form-control" id="exampleFormControlSelect1" name='kondisi'>
                    <?php $kondisi = query_nya("SELECT * FROM kondisi"); var_dump($kondisi[0])?>
                    <?php for($i = 0; $i< count($kondisi); $i++): ?>
                    <option><?=($kondisi[$i]['nama_kondisi']) ?></option>
                    <?php endfor ?>
                  </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-kirim">Submit</button>
                <!-- <button class="btn btn-primary btn-tunggu d-none" type="button" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir tambah -->

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
