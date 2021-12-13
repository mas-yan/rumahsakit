<!DOCTYPE html>
<html>
<head>
  <title>Data poli</title>
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
      <h3 class="card-title">Data Poliklinik</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">

    <button data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 20px" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>
    <button data-toggle="modal" data-target="#modal-defaukt" style="margin-bottom: 20px; float: right;" type="button" class="btn btn-success"><i class="fas fa-plus"></i> Export Excel</button>

    <form method="post" name="proses">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th style="margin-left: 100px;">
                  <input style="margin-left: 50% " type="checkbox" id="select_all">
              </th>
              <th>Nama Poli</th>
              <th>Gedung</th>
              <th>Ubah</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = mysqli_query($conn,"SELECT * FROM tb_poli") or die(mysqli_error($conn));
          $no = 1;
          while ($data = mysqli_fetch_assoc($sql)):?>
            <tr>
              <td><?= $no++; ?></td>
              <td align="center">
              
                <input name="checked[]" class="check" type="checkbox" value="<?= $data['id_poli'] ?>">
              </form>
              </td>
              <td><?= $data['nama_poli']; ?></td>
              <td><?= $data['gedung']; ?></td>
              <td align="center">
                <button type="button" data-toggle="modal" data-target="#modal-default<?= $data['id_poli']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</button>
              </td>
            </tr>

            <!-- modal edit -->
    <div class="modal fade" id="modal-default<?= $data['id_poli']; ?>">
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
              $id_ubah = $data['id_poli'];
              $sql_ubah = mysqli_query($conn,"SELECT * FROM tb_poli WHERE id_poli = '$id_ubah' "); 
              while ($ubah = mysqli_fetch_assoc($sql_ubah)):?>
            <form method="post">
              <input type="hidden" name="id_poli" value="<?=$ubah['id_poli'];?>"></input>
              <div class="form-group">
                <label for="nama_poli">Nama poli</label>
                <input type="text" value="<?=$ubah['nama_poli'];?>" class="form-control" name="nama_poli">
              </div>
              <div class="form-group">
                <label for="nama_poli">Gedung</label>
                <input type="text" value="<?=$ubah['gedung'];?>" class="form-control" name="gedung">
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
        </form>
        <div style="float: right;margin-top: 15px">
        <a href="page/delete.php" class="btn btn-danger hapus_poli"><i class="fas fa-trash"></i> hapus</a href="delete.php">
        </div>
        
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
                <label for="nama_poli">Nama Poli</label>
                <input type="text" placeholder="Nama Poli" class="form-control" name="nama_poli">
              </div>
              <div class="form-group">
                <label for="nama_poli">Gedung</label>
                <input type="text" placeholder="Gadung" class="form-control" name="gedung">
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
  $(document).ready(function(){
    $('#select_all').on('click', function(){
      if (this.checked) {
        $('.check').each(function(){
          this.checked = true;
        })
      }else{
        $('.check').each(function(){
          this.checked = false;
        })
      }
    });

    $('.check').on('click', function(){
      if ($('.check:checked').length == $('.check').length) {
        $('#select_all').prop('checked',true)
      }else{
        $('#select_all').prop('checked',false)
      }
    })
  });

$('.hapus_poli').on('click',function(e){
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
        document.proses.action=href;
        document.proses.submit();
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
  $nama_poli = mysqli_escape_string($conn,$_POST['nama_poli']);
  $gedung = mysqli_escape_string($conn,$_POST['gedung']);
  $tambah = mysqli_query($conn,"INSERT INTO tb_poli VALUES('','$nama_poli','$gedung')");

  if ($tambah) {
    ?>
    <script type="text/javascript">
   swal.fire({ 
            title: "BERHASIL",
            text: "Data Telah ditambahkan",
            icon: "success", buttons: [false, "OK"], 
            }).then(function() { 
                window.location.href="<?= base_url('?page=poli') ?>"; 
            }); 
</script>
    <?php
  }
}

// ubah data
if (isset($_POST['tombol_ubah'])) {
  $id_ubah = mysqli_escape_string($conn,$_POST['id_poli']);
  $nama_poli = mysqli_escape_string($conn,$_POST['nama_poli']);
  $gedung = mysqli_escape_string($conn,$_POST['gedung']);
  $ubah = mysqli_query($conn,"UPDATE tb_poli SET nama_poli = '$nama_poli', gedung = '$gedung' WHERE id_poli = '$id_ubah' ");

  if ($ubah) {
    ?>
    <script type="text/javascript">
   swal.fire({ 
            title: "BERHASIL",
            text: "Data Telah ubah",
            icon: "success", buttons: [false, "OK"], 
            }).then(function() { 
                window.location.href="<?= base_url('?page=poli') ?>"; 
            }); 
</script>
    <?php
  }
}
  ?>