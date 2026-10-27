<?php
$koneksi = new mysqli("localhost", "root", "", "tugasajax");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $id_kota = $_POST['id_kota'];
    $id_kecamatan = $_POST['id_kecamatan'];
    $id_kelurahan = $_POST['id_kelurahan'];

    $check_sql = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = $koneksi->query($check_sql);

    // masukkan data ke table mahasiswa
    $sql = "INSERT INTO mahasiswa(nim, nama, alamat, kota, kecamatan, kelurahan) 
                VALUES ('$nim', '$nama', '$alamat', '$id_kota', '$id_kecamatan', '$id_kelurahan')";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil disimpan!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
$kota = $koneksi->query("SELECT * FROM kota");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Input Data Mahasiswa</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan nim 233***" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anjun ****" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Silahkan isi Alamat Anda" required></textarea>
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">Kota:</label>
                <select class="form-control" name="id_kota" id="kota" required>
                    <option value="">-- Pilih Kota --</option>
                    <?php while($row = $kota->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id_kota']; ?>"><?php echo $row['nama_kota']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan:</label>
                <select class="form-control" name="id_kecamatan" id="kecamatan" required>
                    <option value="">-- Pilih Kecamatan --</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="kelurahan" class="form-label">Kelurahan:</label>
                <select class="form-control" name="id_kelurahan" id="kelurahan" required>
                    <option value="">-- Pilih Kelurahan --</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Ambil kecamatan berdasarkan kota yang dipilih
        $('#kota').on('change', function() {
            var kotaid = $(this).val();
            if(kotaid) {
                $.ajax({
                    type: 'POST',
                    url: 'ambildata.php',
                    data: 'id_kota=' +kotaid,
                    success: function(html) {
                        $('#kecamatan').html(html);
                        $('#kelurahan').html('<option value="">-- Pilih Kelurahan --</option>'); 
                    }
                }); 
            } else {
                $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
                $('#kelurahan').html('<option value="">-- Pilih Kelurahan --</option>'); 
            }
        });

        // Ambil kelurahan berdasarkan kecamatan yang dipilih
        $('#kecamatan').on('change', function() {
            var kecamatanid = $(this).val();
            if(kecamatanid) {
                $.ajax({
                    type: 'POST',
                    url: 'ambildata.php',
                    data: 'id_kecamatan=' +kecamatanid,
                    success: function(html) {
                        $('#kelurahan').html(html);
                    }
                }); 
            } else {
                $('#kelurahan').html('<option value="">-- Pilih Kelurahan --</option>'); 
            }
        });
    });
    </script>
</body>
</html>
