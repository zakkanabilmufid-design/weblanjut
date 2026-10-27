<? php
function load_kecamatan()
{
    $koneksi = mysqli_connect("localhost", "root", "", "praktikum");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $kecamatan = "";
    $query = "SELECT * FROM kecamatan";
    $result = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_array($result)) {
    $kecamatan .= '<option value="' . $row["id_kecamatan"] . '">' . $row["nama_kecamatan"] . '</option>';
    }
    return $kecamatan;
}
if (isset($_GET ['action' ]) && $_GET ['action' ] == 'getkelurahan') {
    $koneksi = mysqli_connect("localhost", "root", "", "praktikum");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $idKecamatan = $_GET['idKecamatan' ];
    echo '<script>console. log(' . $idKecamatan . ')</script>';
    $query = 'SELECT * FROM kelurahan WHERE id_kecamatan =' . $_GET ["idKecamatan"] . 'ORDER BY nama_kelurahan';
    echo $query;
    $result = mysqli_query($koneksi, $query);
    $kelurahan = "";
    $kelurahan = '<option value=""> -- Pilih Kelurahan --< /option>';
    while ($row = mysqli_fetch_array($result)) {
    $kelurahan .= '<option value="' . $row["id_kelurahan"] . '">' . $row["nama_kelurahan"] . '</option>';
    }
    echo $kelurahan;
}