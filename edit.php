<?php
    include 'koneksi.php';
    $db = new database();
?>

<?php
    foreach($db->edit($_GET['nim']) as $data){
?>

<html lang="en" dir="ltr">
    <head>
        <title align="center">CRUD OOP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h3 align="center">Edit data Mahasiswa</h3>
            <form action="proses.php?aksi=update" method="post">
                <table>
                    <div class="form-group">
                    <label for="nama" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nim" style="width:500px;"
                            value="<?php echo $data['nim'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" style="width:500px;"
                            value="<?php echo $data['nama'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" style="width:500px;"
                            value="<?php echo $data['alamat'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="nama" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="telepon" style="width:500px;"
                            value="<?php echo $data['telepon'] ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn-primary">Submit</button>
                </table>
                <?php } ?>
            </form>
        </div>
    </body>
</html>