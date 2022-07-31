<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST KODINGAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="searching-data text-end mt-2">
        <form action="" method="GET">
        <input type="text" name="cari" placeholder="Cari Data">
        <input type="submit" value="Cari Data">
        </form>
    </div>
    <div class="aksi-tambah text-end">
        <a href="tambah.php" class="btn btn-primary my-2">Tambah Data</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO#</th>
                <th>NIK</th>
                <th>NAMA</th>
                <th>GENDER</th>
                <th>ALAMAT</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php

                require "koneksi.php";
                if(@$_GET['cari']){
                    $cari = $_GET['cari'];
                    $sql = mysqli_query($koneksi,"SELECT * FROM tbl_identitas WHERE nama LIKE '%".$cari."%'");
                }else{
                    $sql = mysqli_query($koneksi,"SELECT * FROM tbl_identitas");
                }
                $no = 1;
                while($data = mysqli_fetch_array($sql)){
               
            ?>
            <tr>
                <td><?=$no++ ?></td>
                <td><?=$data['nik'] ?></td>
                <td><?=$data['nama'] ?></td>
                <td><?=$data['gender'] ?></td>
                <td><?=$data['alamat'] ?></td>
                <td>
                    <a href="edit.php?id=<?=$data['id'] ?>" class="btn btn-success my-2">Edit Data</a>
                    <a href="hapus.php?id=<?=$data['id'] ?>" class="btn btn-danger my-2" onclick="return confirm('Apakah Data Yakin Ingin Dihapus?')">Hapus Data</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>
