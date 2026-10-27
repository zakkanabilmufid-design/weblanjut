<?php
if (isset($_POST['id_kota'])) {
    $id_kota = $_POST['id_kota'];
    $koneksi = new mysqli("localhost", "root", "", "tugasajax");
    $query = "SELECT * FROM kecamatan WHERE id_kota = '$id_kota'";
    $result = $koneksi->query($query);
    if ($result->num_rows > 0) {
        echo '<option value="">-- Pilih Kecamatan --</option>';
        while($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['id_kecamatan'].'">'.$row['nama_kecamatan'].'</option>';
        }
    } else {
        echo '<option value="">Kecamatan tidak tersedia</option>';
    }
} 

if (isset($_POST['id_kecamatan'])) {
    $id_kecamatan = $_POST['id_kecamatan'];
    $koneksi = new mysqli("localhost", "root", "", "tugasajax");
    $query = "SELECT * FROM kelurahan WHERE id_kecamatan = '$id_kecamatan'";
    $result = $koneksi->query($query);
    if ($result->num_rows > 0) {
        echo '<option value="">-- Pilih Kelurahan --</option>';
        while($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['id_kelurahan'].'">'.$row['nama_kelurahan'].'</option>';
        }
    } else {
        echo '<option value="">Kelurahan tidak tersedia</option>';
    }
}
?>