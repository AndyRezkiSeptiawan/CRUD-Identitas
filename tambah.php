<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST KODINGAN : TAMBAH DATA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <form action="" method="POST">
    <div class="form-group">
        <label for="nik">*NIK</label>
        <input type="text" name="nik" placeholder="Masukan NIK...." class="form-control">
    </div>
    <div class="form-group">
        <label for="nama">*NAMA</label>
        <input type="text" name="nama" placeholder="Masukan Nama...." class="form-control">
    </div>
    <div class="form-group">
        <label for="jk">*JENIS KELAMIN</label>
        <select name="jk" class="form-control">
            <option  selected>-- Pilih --</option>
            <option value="LAKI-LAKI">LAKI-LAKI</option>
            <option value="PEREMPUAN">PEREMPUAN</option>
        </select>
    </div>
    <div class="form-group">
        <label for="alamat">*ALAMAT</label>
        <textarea name="alamat" class="form-control" cols="30" rows="10"></textarea>
    </div>

    <div class="btn-aksi text-center mt-2">
        <input type="submit" name="submit" value="Tambah Data" class="btn btn-primary">
    </div>

    </form>
</div>

</body>
</html>

<?php
    require "koneksi.php";
    if(@$_POST['submit']){
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];

        $tambh = mysqli_query($koneksi, "INSERT INTO tbl_identitas(id,nik,nama,gender,alamat)
        VALUES('','$nik','$nama','$jk','$alamat')");

        if($tambh == true){
            echo "
            <script>
                alert('TAMBAH DATA BERHASIL');
                document.location = 'index.php';
            </script> 
            ";
        }
    }



?>