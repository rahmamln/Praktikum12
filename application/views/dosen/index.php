<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen</title>
    <script>
        function hapusDosen(pesan){
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
    <h3 class="text-center">Dosen</h3>
    <table class="table table-striped table-hover table-bordered">
        <thead  class="table-primary">
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Nidn</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            foreach ($dosen as $dsn) {
            ?>
            <tr>
                <td><?php echo $dsn -> id ?> </td>
                <td><?php echo $dsn -> nama ?></td>
                <td><?php echo $dsn -> gender ?></td>
                <td><?php echo $dsn -> nidn ?></td>
                <td>
                    <a href="<?php echo "dosen/detail/$dsn->id" ?>" class="btn btn-info btn-sm active">Detail</a>
                    <a href="<?php echo "dosen/edit/$dsn->id" ?>" class="btn btn-success btn-sm active">Edit</a>
                    <a href="<?php echo "dosen/delete/$dsn->id" ?>" onclick="return hapusDosen('Anda yakin ingin menghapus dosen yang bernama <?php echo $dsn->nama?>')" class="btn btn-danger btn-sm active">Delete</a>
                </td>
            </tr>
            <?php
            $nomor++;
            }
            ?>
        </tbody>
    </table>
    <a href="<?php echo "dosen/form/$dsn->id" ?>" class="btn btn-primary btn-lg active">Tambah</a>
    </div>
</body>
</html>