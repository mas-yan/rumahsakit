<!DOCTYPE html>
<html>
<head>
  <title>Rekam Medis</title>
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
  <div class="card">
    <div class="card-header bg-primary">
      <h3 class="card-title">Rekam Medis</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <button data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 20px" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>
    <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama pasien</th>
              <th>Keluhan</th>
              <th>Poliklinik</th>
              <th>Nama Dokter</th>
              <th>Diagnosa</th>
              <th>Obat</th>
              <th>Tanggal Periksa</th>
              <th width="80">hapus</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = mysqli_query($conn,"SELECT * FROM tb_rm
                INNER JOIN tb_pasien ON tb_rm.id_pasien = tb_pasien.id_pasien
                INNER JOIN tb_poli ON tb_rm.id_poli = tb_poli.id_poli
                INNER JOIN tb_dokter ON tb_rm.id_dokter = tb_dokter.id_dokter") or die(mysqli_error($conn));
          $no = 1;
          while ($data = mysqli_fetch_assoc($sql)):?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['nama_pasien']; ?></td>
              <td><?= $data['keluhan']; ?></td>
              <td><?= $data['nama_poli']; ?></td>
              <td><?= $data['nama_dokter']; ?></td>
              <td><?= $data['diagnosa'] ?></td>
              <td>
                <?php
                $sql_obat = mysqli_query($conn,"SELECT * FROM tb_rm_obat 
                            INNER JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE id_rm = '$data[id_rm]'") or die(mysqli_error($conn));
                while ($data_obat = mysqli_fetch_assoc($sql_obat)) {
                echo $data_obat['nama_obat']."<br>";
                }
                 ?>
              </td>
              <td><?= $data['tanggal_periksa'] ?></td>
              <td>
                <form method="post">
                  <input type="hidden" name="id_hapus" value="<?= $data['id_rm']; ?>"></input>
                  <a href="page/delete.php?id_rm=<?= $data['id_rm']; ?>" type="submit" name="hapus" class="hapus_rm btn btn-block btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                </form>
              </td>
            <?php endwhile ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- modal tambah -->
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="pasien">Nama Pasien</label>
                  <select class="form-control" name="pasien" id="pasien" required>
                    <option value="">-- Pilih --</option>
                    <?php
                    $sql_pasien = mysqli_query($conn,"SELECT * FROM tb_pasien") or die(mysqli_error($conn));
                    while ($data = mysqli_fetch_assoc($sql_pasien)):?>
                    <option value="<?= $data['id_pasien'] ?>"><?= $data['nama_pasien'] ?></option>
                  <?php endwhile ?>
                  </select>
                </div>

                <div class="form-group col-md-6 mb-6">
                  <label for="poliklinik">Poliklinik</label>
                  <select class="form-control" name="poliklinik" id="poliklinik" required>
                    <option value="">-- Pilih --</option>
                    <?php
                    $sql_poli = mysqli_query($conn,"SELECT * FROM tb_poli") or die(mysqli_error($conn));
                    while ($data = mysqli_fetch_assoc($sql_poli)):?>
                    <option value="<?= $data['id_poli'] ?>"><?= $data['nama_poli'] ?></option>
                  <?php endwhile ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                <label for="dokter">Nama Dokter</label>
                  <select class="form-control" name="dokter" id="dokter" required>
                    <option value="">-- Pilih --</option>
                    <?php
                    $sql_dokter = mysqli_query($conn,"SELECT * FROM tb_dokter") or die(mysqli_error($conn));
                    while ($data = mysqli_fetch_assoc($sql_dokter)):?>
                    <option value="<?= $data['id_dokter'] ?>"><?= $data['nama_dokter'] ?></option>
                  <?php endwhile ?>
                  </select>
                </div>

                <div class="form-group col-md-6 mb-6">
                  <label for="tgl_per">Tanggal Periksa</label>
                  <input type="date" value="<?= date('Y-m-d') ?>" placeholder="Tanggal Periksa" class="form-control" name="tgl_per">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>keluhan</label>
                  <textarea class="form-control" rows="3" name="keluhan" placeholder="keluhan pasien..."></textarea>
                </div>

                <div class="form-group col-md-6">
                  <label>Diagnosa</label>
                  <textarea class="form-control" rows="3" name="diagnosa" placeholder="diagnosa..."></textarea>
                </div>
              </div>

                <div class="form-group">
                  <label for="obat">Obat</label>
                  <select multiple size="5" class="form-control" name="obat[]" id="obat" required>
                    <?php
                    $sql_obat = mysqli_query($conn,"SELECT * FROM tb_obat") or die(mysqli_error($conn));
                    while ($data = mysqli_fetch_assoc($sql_obat)):?>
                    <option value="<?= $data['id_obat'] ?>"><?= $data['nama_obat'] ?></option>
                  <?php endwhile ?>
                  </select>
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
  </div>
    <!-- end modal tambah -->

  <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
    $('.hapus_rm').on('click',function(e){
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
    require 'asset/vendor/autoload.php';
    use Ramsey\Uuid\Uuid;
if (isset($_POST['tombol_tambah'])) {
  $uuid = Uuid::uuid4()->toString();
  $pasien = mysqli_escape_string($conn,$_POST['pasien']);
  $poliklinik = mysqli_escape_string($conn,$_POST['poliklinik']);
  $dokter = mysqli_escape_string($conn,$_POST['dokter']);
  $tanggal = mysqli_escape_string($conn,$_POST['tgl_per']);
  $keluhan = mysqli_escape_string($conn,$_POST['keluhan']);
  $diagnosa = mysqli_escape_string($conn,$_POST['diagnosa']);
  $obat = $_POST['obat'];

  $tambah = mysqli_query($conn,"INSERT INTO tb_rm VALUES(
    '$uuid','$pasien','$keluhan','$dokter','$diagnosa','$poliklinik','$tanggal')") or die(mysqli_error($conn));

  foreach ($obat as $rm_obat) {
    $tambah .= mysqli_query($conn,"INSERT INTO tb_rm_obat VALUES ('','$uuid','$rm_obat')") or die(mysqli_error($conn));
  }

   if ($tambah) {
    ?>
    <script type="text/javascript">
   swal.fire({ 
            title: "BERHASIL",
            text: "Data Telah ditambahkan",
            icon: "success", buttons: [false, "OK"], 
            }).then(function() { 
                window.location.href="<?= base_url('?page=medis') ?>"; 
            }); 
</script>
    <?php
  }
}
 ?>