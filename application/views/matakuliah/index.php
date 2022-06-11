<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matakuliah</title>
    <script>
        function hapusMatakuliah(pesan){
            if(confirm(pesan)){
                return true;
            }else{
                return false;
            }
        }
    </script>
</head>
<?php
$username = $this->session->userdata('username');
if($username){
    echo "<h3>Selamat Datang $username</h3>";
}
?>
<body>
<div class="col-md-12">
    <h3 class="text-center">MataKuliah</h3>
    <table class="table table-striped table-hover table-bordered">
        <thead  class="table-primary">
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Kode</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            foreach ($matakuliah as $matkul) {
            ?>
            <tr>
                <td><?php echo $matkul -> id ?> </td>
                <td><?php echo $matkul -> nama ?></td>
                <td><?php echo $matkul -> sks ?></td>
                <td><?php echo $matkul -> kode ?></td>
                <td>
                <a href="<?php echo "matakuliah/detail/$matkul->id" ?>" class="btn btn-info btn-sm active">Detail</a>
                <a href="<?php echo "matakuliah/edit/$matkul->id" ?>" class="btn btn-success btn-sm active">Edit</a>
                <a href="<?php echo "matakuliah/delete/$matkul->id" ?>" onclick="return hapusMatakuliah('Anda yakin ingin menghapus data matakuliah yang bernama <?php echo $matkul->nama ?>')" class="btn btn-danger btn-sm active">Delete</a>
                </td>
                </td>
            </tr>
            <?php
            $nomor++;
            }
            ?>
        </tbody>
    </table>
    <a href="<?php echo "matakuliah/form/$matkul->id" ?>" class="btn btn-primary btn-lg active">Tambah</a>
    </div>
</body>
</html>