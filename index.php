<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <?php include 'ambildata.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script> type="text/javascript">
        $(document).ready(function() {
            $('#kecamatan').change(function() { 
                var tampung = $(this).val(); 
                $.ajax({
                    url: 'ambildata.php', 
                    method: 'GET',
                    data: {
                        action: 'getkelurahan', 
                        idKecamatan: tampung 
                    },
                    success: function(data) {
                        $('#kelurahan').html(data); 
                    }
                });
            });
        });
    </script>
</head>

<body>
    <div>
        <h2>Combo Box Bertingkat Wilayah Kota Kediri</h2>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" class="form-control">
                        <option value="">-- Pilih Kecamatan --</option>
                        <?php echo load_kecamatan(); ?>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="kelurahan">Kelurahan</label>
                    <select name="kelurahan" id="kelurahan" class="form-control">
                        <option value="">-- Pilih Kelurahan --</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
    </div>
</body>