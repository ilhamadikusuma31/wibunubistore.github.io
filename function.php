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
?>