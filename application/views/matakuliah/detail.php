<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Matakuliah</title>
</head>
<body>
    <div class="col-md-12">
    <h3>Detail Matakuliah</h3>
    <table class="table table-striped table-hover table-bordered">
        <thead  class="table-primary">
            <tr>
                <th>Id</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Kode</th>
                <th>Dosen Pembimbing</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $siswa -> id ?></td>
                <td><?php echo $siswa -> nim ?> </td>
                <td><?php echo $siswa -> nama ?></td>
                <td><?php echo $siswa -> sks ?></td>
                <td><?php echo $siswa -> kode ?></td>
                <td><?php echo $siswa -> dosen_pembimbing ?></td>
            </tr>
        </tbody>
    </table>
    <div class="col-md-5 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?=base_url()?>uploads/photos/<?=$siswa->id?>.jpg" alt="" width="300" />
                    <div class="mt-4">
                        <h4><?=$siswa->nama?></h4>
                        <p>Foto Matakuliah</p>
                        <?php echo $error;?>
                        <br>
                        <a href="https://www.instagram.com/rahmaax.ky/" target="_blank">
                        <button class="btn btn-outline-info">Instagram</button></a>
                        <?php echo form_open_multipart('matakuliah/upload')?>
                        <input type="file" name="foto" size="300"/>  
                        <input type="hidden" name="idmatakuliah" value="<?=$siswa->id?>"/>
                        <br>
                        <input type="submit" value="upload foto" class="btn btn-primary"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>