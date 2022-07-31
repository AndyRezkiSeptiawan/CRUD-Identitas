<?php
    require "koneksi.php";
    $id = $_GET['id'];

    $hapus = mysqli_query($koneksi,"DELETE FROM tbl_identitas WHERE id='$id'");
    if($hapus == true){
        echo "
        <script>
            alert('DATA BERHASIL DIHAPUS');
            document.location = 'index.php';
        </script> 
        ";
    }

?>