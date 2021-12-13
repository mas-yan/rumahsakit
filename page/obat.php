<!DOCTYPE html>
<html>
<head>
  <title>Data Obat</title>
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
      <h3 class="card-title">Data Obat</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">

    <button data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 20px" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>
    <button data-toggle="modal" data-target="#modal-defaukt" style="margin-bottom: 20px; float: right;" type="button" class="btn btn-success"><i class="fas fa-plus"></i> Export Excel</button>

      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Obat</th>
              <th>Keterangan</th>
              <th width="80">ubah</th>
              <th width="80">hapus</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = mysqli_query($conn,"SELECT * FROM tb_obat") or die(mysqli_error($conn));
          $no = 1;
          while ($data = mysqli_fetch_assoc($sql)):?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['nama_obat']; ?></td>
              <td><?= $data['ket_obat']; ?></td>
              <td>
                <button type="button" data-toggle="modal" data-target="#modal-default<?= $data['id_obat']; ?>" class="btn btn-block btn-warning"><i class="fas fa-edit"></i> Edit</button>
              </td>
              <td>
                <form method="post">
                  <input type="hidden" name="id_hapus" value="<?= $data['id_obat']; ?>"></input>
                  <a href="page/delete.php?id_obat=<?= $data['id_obat']; ?>" type="submit" name="hapus" class="hapus_obat btn btn-block btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                </form>
              </td>
            </tr>

            <!-- modal edit -->
    <div class="modal fade" id="modal-default<?= $data['id_obat']; ?>">
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
              $id_ubah = $data['id_obat'];
              $sql_ubah = mysqli_query($conn,"SELECT * FROM tb_obat WHERE id_obat = '$id_ubah' "); 
              while ($ubah = mysqli_fetch_assoc($sql_ubah)):?>
            <form method="post">
              <input type="hidden" name="id_obat" value="<?=$ubah['id_obat'];?>"></input>
              <div class="form-group">
                <label for="nama_obat">Nama Obat</label>
                <input type="text" value="<?=$ubah['nama_obat'];?>" class="form-control" name="nama_obat">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" rows="3" name="keterangan" placeholder="Keterangan obat..."><?=$ubah['ket_obat'];?></textarea>
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
                <label for="nama_obat">Nama Obat</label>
                <input type="text" placeholder="Nama Obat" class="form-control" name="nama_obat">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" rows="3" name="keterangan" placeholder="Keterangan obat..."></textarea>
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
    $('.hapus_obat').on('click',function(e){
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
  $nama_obat = mysqli_escape_string($conn,$_POST['nama_obat']);
  $keterangan = mysqli_escape_string($conn,$_POST['keterangan']);
  $tambah = mysqli_query($conn,"INSERT INTO tb_obat VALUES('','$nama_obat','$keterangan')");

  if ($tambah) {
    ?>
    <script type="text/javascript">
   swal.fire({ 
            title: "BERHASIL",
            text: "Data Telah ditambahkan",
            icon: "success", buttons: [false, "OK"], 
            }).then(function() { 
                window.location.href="<?= base_url('?page=obat') ?>"; 
            }); 
</script>
    <?php
  }
}

// ubah data
if (isset($_POST['tombol_ubah'])) {
  $id_ubah = mysqli_escape_string($conn,$_POST['id_obat']);
  $nama_obat = mysqli_escape_string($conn,$_POST['nama_obat']);
  $keterangan = mysqli_escape_string($conn,$_POST['keterangan']);
  $ubah = mysqli_query($conn,"UPDATE tb_obat SET nama_obat = '$nama_obat',ket_obat = '$keterangan' WHERE id_obat = '$id_ubah' ");

  if ($ubah) {
    ?>
    <script type="text/javascript">
   swal.fire({ 
            title: "BERHASIL",
            text: "Data Telah ubah",
            icon: "success", buttons: [false, "OK"], 
            }).then(function() { 
                window.location.href="<?= base_url('?page=obat') ?>"; 
            }); 
</script>
    <?php
  }
}
?>