<?php 

$conn = mysqli_connect('localhost','root','','wibunubistore');

// $query = "SELECT * FROM barang";
// $result = mysqli_query($conn,$query);
// $result = mysqli_fetch_assoc($result);
// var_dump($result);


function query_nya($q){
    global $conn;
    $result = mysqli_query($conn,$q);
    $penampung = [];
    while($row = mysqli_fetch_assoc($result)){
        $penampung[] = $row;  //ini kayak penampung.append(row)
    }
    return $penampung;
}


function tambah($data){
    global $conn;
    $gambar = upload();

    if(!$gambar){
        return false;
    }
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $namaKategori = htmlspecialchars($data["kategori"]);
    $namaPabrik = htmlspecialchars($data["pabrik"]);
    $Diskon = htmlspecialchars($data["diskon"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $Kondisi = htmlspecialchars($data["kondisi"]);
    $harga = htmlspecialchars($data["harga"]);
    $berat = htmlspecialchars($data["berat"]);

    $kategori_id = query_nya("SELECT kategori_id FROM kategori WHERE nama_kategori = '$namaKategori'")[0]['kategori_id'];
    $diskon_id = query_nya("SELECT diskon_id FROM diskon WHERE status ='$Diskon'")[0]['diskon_id']; 
    $pabrik_id = query_nya("SELECT pabrik_id FROM pabrik WHERE nama_pabrik = '$namaPabrik'")[0]['pabrik_id']; 
    $kondisi_id = query_nya("SELECT kondisi_id FROM kondisi WHERE nama_kondisi = '$Kondisi'")[0]['kondisi_id']; 
    
    $query = "INSERT INTO barang VALUES
              ('','$gambar','$nama_barang','$kategori_id' ,'$pabrik_id','$diskon_id','$harga' ,'$deskripsi','$kondisi_id', '$berat')";

mysqli_query($conn, $query); //eksekusi
return mysqli_affected_rows($conn);//pengecekan apakah jumlah rows berubah
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4){
        echo "<script> alert('Pilih Gambar Terlebih Dahulu')</script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg','png','jpeg'];
    $ektensiGambar =explode('.',$namaFile);
    $ektensiGambar = end($ektensiGambar); //ektensiGambar[-1]
    $ektensiGambar = strtolower($ektensiGambar);

    if(!in_array($ektensiGambar,$ekstensiGambarValid)){
        echo "<script> alert('Yang Anda Upload Bukan Gambar')</script>";
        return false;
    }
    
    if ($ukuranFile > 1000000){
        echo "<script> alert('Gambar Yang Anda Upload Terlalu Besar')</script>";
        return false;

    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ektensiGambar;

    move_uploaded_file($tmpName, 'img/katalog/'.$namaFileBaru);
    return $namaFileBaru;
}

function hapus($id){ 
    global $conn;
    mysqli_query($conn, "DELETE FROM barang WHERE barang_id = $id");//eksekusi
    return mysqli_affected_rows($conn);//pengecekan apakah jumlah rows berubah
}


function modif($data){
    global $conn;
    $id = $data["id"];
    $gambarLama = $data['gambarLama'];
    // $gambar = htmlspecialchars($data["gambar"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $namaKategori = htmlspecialchars($data["kategori"]);
    $namaPabrik = htmlspecialchars($data["pabrik"]);
    $Diskon = htmlspecialchars($data["diskon"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $Kondisi = htmlspecialchars($data["kondisi"]);
    $harga = htmlspecialchars($data["harga"]);
    $berat = htmlspecialchars($data["berat"]);

    $kategori_id = query_nya("SELECT kategori_id FROM kategori WHERE nama_kategori = '$namaKategori'")[0]['kategori_id'];
    $diskon_id = query_nya("SELECT diskon_id FROM diskon WHERE status ='$Diskon'")[0]['diskon_id']; 
    $pabrik_id = query_nya("SELECT pabrik_id FROM pabrik WHERE nama_pabrik = '$namaPabrik'")[0]['pabrik_id']; 
    $kondisi_id = query_nya("SELECT kondisi_id FROM kondisi WHERE nama_kondisi = '$Kondisi'")[0]['kondisi_id']; 
    
   if($_FILES['gambar']['error']===4){
       $gambar = $gambarLama;
   }
   else{
       $gambar = upload();
   }

    $query = "UPDATE barang
              SET 
              gambar ='$gambar',
              nama_barang = '$nama_barang',
              kategori_id = $kategori_id,
              pabrik_id = $pabrik_id,
              diskon_id = $diskon_id,
              deskripsi = '$deskripsi',
              kondisi_id = '$kondisi_id',
              harga = '$harga',
              berat = '$berat'

              WHERE barang_id = $id
              ";

    mysqli_query($conn, $query); 
    return mysqli_affected_rows($conn);}


?>