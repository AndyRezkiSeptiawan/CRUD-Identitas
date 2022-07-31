<?php
    require "koneksi.php";
    $id = $_GET['id'];
    
    $sql = mysqli_query($koneksi,"SELECT * FROM tbl_identitas WHERE id='$id'");
    $data = mysqli_fetch_array($sql);
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST KODINGAN : EDIT DATA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <form action="" method="POST">
    <input type="hidden" name="id" value="<?=$data['id']?>">
    <div class="form-group">
        <label for="nik">*NIK</label>
        <input type="text" name="nik" placeholder="Masukan NIK...." class="form-control" value="<?=$data['nik']?>">
    </div>
    <div class="form-group">
        <label for="nama">*NAMA</label>
        <input type="text" name="nama" placeholder="Masukan Nama...." class="form-control" value="<?=$data['nama']?>">
    </div>
    <div class="form-group">
        <label for="jk">*JENIS KELAMIN</label>
        <select name="jk" class="form-control">
            <option  selected>-- Pilih --</option>
            <option value="LAKI-LAKI" <?php if($data['gender'] == 'LAKI-LAKI') echo 'SELECTED'?>>LAKI-LAKI</option>
            <option value="PEREMPUAN"  <?php if($data['gender'] == 'PEREMPUAN') echo 'SELECTED'?>>PEREMPUAN</option>
        </select>
    </div>
    <div class="form-group">
        <label for="alamat">*ALAMAT</label>
        <textarea name="alamat" class="form-control" cols="30" rows="10">
            <?=$data['alamat']?>
        </textarea>
    </div>

    <div class="btn-aksi text-center mt-2">
        <input type="submit" name="submit" value="Edit Data" class="btn btn-primary">
    </div>

    </form>
</div>

</body>
</html>

<?php
    require "koneksi.php";
    if(@$_POST['submit']){
        $id = $_POST['id'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        
        $upd = mysqli_query($koneksi,"UPDATE tbl_identitas SET nik='$nik',nama='$nama',gender='$jk',alamat='$alamat'
        WHERE id='$id'");
        if($upd == true){
            echo "
            <script>
                alert('EDIT DATA BERHASIL');
                document.location = 'index.php';
            </script> 
            ";
        }
    }



?>