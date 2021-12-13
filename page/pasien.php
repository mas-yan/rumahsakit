<!DOCTYPE html>
<html>
<head>
  <title>Data Pasien</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
  <!-- Main content -->
  <div class="col-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Pasien</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">

    <button data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 20px" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>
    <button data-toggle="modal" data-target="#modal-defaukt" style="margin-bottom: 20px; float: right;" type="button" class="btn btn-success"><i class="fas fa-plus"></i> Export Excel</button>

      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>No Iidentitas</th>
              <th>Nama pasien</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>No Telp</th>
              <th width="80">ubah</th>
              <th width="80">hapus</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = mysqli_query($conn,"SELECT * FROM tb_pasien") or die(mysqli_error($conn));
          $no = 1;
          while ($data = mysqli_fetch_assoc($sql)):?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['no_identitas']; ?></td>
              <td><?= $data['nama_pasien']; ?></td>
              <td><?= $data['jenis_kelamin']; ?></td>
              <td><?= $data['alamat']; ?></td>
              <td><?= $data['no_telp']; ?></td>
              <td>
                <button type="button" data-toggle="modal" data-target="#modal-default<?= $data['id_pasien']; ?>" class="btn btn-block btn-warning"><i class="fas fa-edit"></i> Edit</button>
              </td>
              <td>
                <form method="post">
                  <input type="hidden" name="id_hapus" value="<?= $data['id_pasien']; ?>"></input>
                  <a href="page/delete.php?id_pasien=<?= $data['id_pasien']; ?>" type="submit" name="hapus" class="hapus_pasien btn btn-block btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                </form>
              </td>
            </tr>

            <!-- modal edit -->
    <div class="modal fade" id="modal-default<?= $data['id_pasien']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <?php
              $id_ubah = $data['id_pasien'];
              $sql_ubah = mysqli_query($conn,"SELECT * FROM tb_pasien WHERE id_pasien = '$id_ubah' "); 
              while ($ubah = mysqli_fetch_assoc($sql_ubah)):?>
            <form method="post">
              <input type="hidden" name="id_pasien" value="<?=$ubah['id_pasien'];?>"></input>
              <div class="form-group">
                <label for="no_identitas">No Identitas</label>
                <input type="text" value="<?=$ubah['no_identitas'];?>" class="form-control" name="no_identitas">
              </div>
              <div class="form-group">
                <label for="nama_pasien">Nama pasien</label>
                <input type="text" value="<?=$ubah['nama_pasien'];?>" class="form-control" name="nama_pasien">
              </div>
              <div class="form-group">
                <label for="jenis">Jenis kelamin</label>
              <div class="form-check">
                <input class="form-check-input" id="laki" type="radio" value="<?='Laki-Laki';?>" name="jk" <?php if ($ubah['jenis_kelamin'] == 'Laki-laki') echo "checked";?>>
                <label class="form-check-label" for="laki">Laki-Laki</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" id="perempuan" type="radio" value="<?='Perempuan';?>" name="jk" <?php if ($ubah['jenis_kelamin'] == 'Perempuan') echo "checked";?>>
                <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" value="<?=$ubah['alamat'];?>" class="form-control" name="alamat">
              </div>
              <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" value="<?=$ubah['no_telp'];?>" class="form-control" name="no_telp">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" name="tombol_ubah" class="btn btn-primary">Ubah Data</button>
               </div>
            </div>
            </form>
          <?php endwhile; ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- end modal tambah -->
  </div>

          <?php endwhile; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

<!-- modal tambah -->
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post">
            <div class="form-group">
                <label for="no_identitas">No Identitas</label>
                <input type="text" placeholder="No Identitas" class="form-control" name="no_identitas">
              </div>
              <div class="form-group">
                <label for="nama_pasien">Nama pasien</label>
                <input type="text" placeholder="Nama pasien" class="form-control" name="nama_pasien">
              </div>
              <div class="form-group">
                <label for="jenis">Jenis kelamin</label>
              <div class="form-check">
                <input class="form-check-input" value="Laki-laki" type="radio" name="jk">
                <label class="form-check-label" for="laki">Laki-Laki</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" value="Perempuan" type="radio" name="jk">
                <label class="form-check-label" for="perempuan">perempuan</label>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" placeholder="Alamat" class="form-control" name="alamat">
              </div>
              <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" placeholder="No Telp" class="form-control" name="no_telp">
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tombol_tambah" class="btn btn-primary">Tambah Data</button>
           </div>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
<!-- end modal tambah -->
</div>

  <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
    $('.hapus_pasien').on('click',function(e){
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    
    swal.fire({ 
            title: "BERHASIL",
            text: "Data berhasil di hapus",
            icon: "success", buttons: [false, "OK"], 
            }).then(function() { 
                document.location=href;
            }); 
  }
})
  })
  </script>
</body>
</html>

<?php 

// tambah data
if (isset($_POST['tombol_tambah'])) {
  $no_identitas = mysqli_escape_string($conn,$_POST['no_identitas']);
  $nama_pasien = mysqli_escape_string($conn,$_POST['nama_pasien']);
  $jenis_kelamin = mysqli_escape_string($conn,$_POST['jk']);
  $alamat = mysqli_escape_string($conn,$_POST['alamat']);
  $no_telp = mysqli_escape_string($conn,$_POST['no_telp']);
  $tambah = mysqli_query($conn,"INSERT INTO tb_pasien VALUES
    ('','$no_identitas','$nama_pasien','$jenis_kelamin','$alamat','$no_telp')") or die(mysqli_error($conn));

  if ($tambah) {
    ?>
    <script type="text/javascript">
   swal.fire({ 
            title: "BERHASIL",
            text: "Data Telah ditambahkan",
            icon: "success", buttons: [false, "OK"],
            }).then(function() { 
                window.location.href="<?= base_url('?page=pasien') ?>"; 
            }); 
</script>
    <?php
  }
}

// ubah data
if (isset($_POST['tombol_ubah'])) {
  $id_ubah = mysqli_escape_string($conn,$_POST['id_pasien']);
  $no_identitas = mysqli_escape_string($conn,$_POST['no_identitas']);
  $nama_pasien = mysqli_escape_string($conn,$_POST['nama_pasien']);
  $jenis_kelamin = mysqli_escape_string($conn,$_POST['jk']);
  $alamat = mysqli_escape_string($conn,$_POST['alamat']);
  $no_telp = mysqli_escape_string($conn,$_POST['no_telp']);
  $ubah = mysqli_query($conn,"UPDATE tb_pasien SET no_identitas = '$no_identitas', nama_pasien = '$nama_pasien',jenis_kelamin = '$jenis_kelamin',alamat = '$alamat', no_telp = '$no_telp' WHERE id_pasien = '$id_ubah' ");

  if ($ubah) {
    ?>
    <script type="text/javascript">
   swal.fire({ 
            title: "BERHASIL",
            text: "Data Telah ubah",
            icon: "success", buttons: [false, "OK"], 
            }).then(function() { 
                window.location.href="<?= base_url('?page=pasien') ?>"; 
            }); 
</script>
    <?php
  }
}
?>

