<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <script>
        function hapusMahasiswa(pesan){
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
    <h3 class="text-center">Mahasiswa</h3>
    <table class="table table-striped table-hover table-bordered">
        <thead  class="table-primary">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>IPK</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            foreach ($mahasiswa as $mhs) {
            ?>
            <tr>
                <td><?php echo $nomor ?></td>
                <td><?php echo $mhs -> nim ?> </td>
                <td><?php echo $mhs -> nama ?></td>
                <td><?php echo $mhs -> gender ?></td>
                <td><?php echo $mhs -> ipk ?></td>
                <td>
                    <a href="<?php echo "mahasiswa/detail/$mhs->id" ?>" class="btn btn-info btn-sm active">Detail</a>
                    <a href="<?php echo "mahasiswa/edit/$mhs->id" ?>" class="btn btn-success btn-sm active">Edit</a>
                    <a href="<?php echo "mahasiswa/delete/$mhs->id" ?>" onclick="return hapusMahasiswa('Anda yakin ingin menghapus mahasiswa yang bernama <?php echo $mhs->nama ?>')" class="btn btn-danger btn-sm active">Delete</a>
                </td>
            </tr>
            <?php
            $nomor++;
            }
            ?>
        </tbody>
    </table>
    <a href="<?php echo "mahasiswa/form/$mhs->id" ?>" class="btn btn-primary btn-lg active">Tambah</a>
    </div>
</body>
</html>