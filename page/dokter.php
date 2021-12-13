<!DOCTYPE html>
<html>
<head>
  <title>Data Dokter</title>
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
      <h3 class="card-title">Data Dokter</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">

    <button data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 20px" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>
    <button data-toggle="modal" data-target="#modal-defaukt" style="margin-bottom: 20px; float: right;" type="button" class="btn btn-success"><i class="fas fa-plus"></i> Export Excel</button>

      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama dokter</th>
              <th>spesialis</th>
              <th>alamat</th>
              <th>no.telp</th>
              <th width="80">ubah</th>
              <th width="80">hapus</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = mysqli_query($conn,"SELECT * FROM tb_dokter") or die(mysqli_error($conn));
          $no = 1;
          while ($data = mysqli_fetch_assoc($sql)):?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['nama_dokter']; ?></td>
              <td><?= $data['spesialis']; ?></td>
              <td><?= $data['alamat']; ?></td>
              <td><?= $data['no_telp']; ?></td>
              <td>
                <button type="button" data-toggle="modal" data-target="#modal-default<?= $data['id_dokter']; ?>" class="btn btn-block btn-warning"><i class="fas fa-edit"></i> Edit</button>
              </td>
              <td>
                <form method="post">
                  <input type="hidden" name="id_hapus" value="<?= $data['id_dokter']; ?>"></input>
                  <a href="page/delete.php?id_dokter=<?= $data['id_dokter']; ?>" type="submit" name="hapus" class="hapus_dokter btn btn-block btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                </form>
              </td>
            </tr>

            <!-- modal edit -->
    <div class="modal fade" id="modal-default<?= $data['id_dokter']; ?>">
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
              $id_ubah = $data['id_dokter'];
              $sql_ubah = mysqli_query($conn,"SELECT * FROM tb_dokter WHERE id_dokter = '$id_ubah' "); 
              while ($ubah = mysqli_fetch_assoc($sql_ubah)):?>
            <form method="post">
              <input type="hidden" name="id_dokter" value="<?=$ubah['id_dokter'];?>"></input>
              <div class="form-group">
                <label for="nama_dokter">Nama dokter</label>
                <input type="text" value="<?=$ubah['nama_dokter'];?>" class="form-control" name="nama_dokter">
              </div>
              <div class="form-group">
                <label>spesialis</label>
                <input type="text" class="form-control" value="<?=$ubah['spesialis'];?>" name="spesialis" placeholder="spesialis dokter..."></input>
              </div>
              <div class="form-group">
                <label for="nama_dokter">Alamat</label>
                <input type="text" value="<?=$ubah['alamat'];?>" class="form-control" name="alamat">
              </div>
              <div class="form-group">
                <label for="nama_dokter">No.telp</label>
                <input type="text" value="<?=$ubah['no_telp'];?>" class="form-control" name="no telpon">
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
                <label for="nama_dokter">Nama dokter</label>
                <input type="text" class="form-control" placeholder="Nama dokter" name="nama_dokter">
              </div>
              <div class="form-group">
                <label>spesialis</label>
                <input type="text" class="form-control" name="spesialis" placeholder="spesialis dokter..."></input>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat">
              </div>
              <div class="form-group">
                <label for="no_telp">no_telp</label>
                <input type="text" class="form-control" placeholder="no telpon" name="no_telp">
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
    $('.hapus_dokter').on('click',function(e){
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
  $nama_dokter = mysqli_escape_string($conn,$_POST['nama_dokter']);
  $spesialis = mysqli_escape_string($conn,$_POST['spesialis']);
  $alamat = mysqli_escape_string($conn,$_POST['alamat']);
  $no_telp = mysqli_escape_string($conn,$_POST['no_telp']);
  $tambah = mysqli_query($conn,"INSERT INTO tb_dokter VALUES('','$nama_dokter','$spesialis','$alamat','$no_telp')");

  if ($tambah) {
    ?>
    <script type="text/javascript">
   swal.fire({ 
            title: "BERHASIL",
            text: "Data Telah ditambahkan",
            icon: "success", buttons: [false, "OK"], 
            }).then(function() { 
                window.location.href="<?= base_url('?page=dokter') ?>"; 
            }); 
</script>
    <?php
  }
}

// ubah data
if (isset($_POST['tombol_ubah'])) {
  $id_ubah = mysqli_escape_string($conn,$_POST['id_dokter']);
  $nama_dokter = mysqli_escape_string($conn,$_POST['nama_dokter']);
  $spesialis = mysqli_escape_string($conn,$_POST['spesialis']);
  $alamat = mysqli_escape_string($conn,$_POST['alamat']);
  $no_telp = mysqli_escape_string($conn,$_POST['no_telp']);
  $ubah = mysqli_query($conn,"UPDATE tb_dokter SET nama_dokter = '$nama_dokter',spesialis = '$spesialis',alamat = '$alamat',no_telp = '$no_telp'  WHERE id_dokter = '$id_ubah' ");

  if ($ubah) {
    ?>
    <script type="text/javascript">
   swal.fire({ 
            title: "BERHASIL",
            text: "Data Telah ubah",
            icon: "success", buttons: [false, "OK"], 
            }).then(function() { 
                window.location.href="<?= base_url('?page=dokter') ?>"; 
            }); 
</script>
    <?php
  }
}
?>

