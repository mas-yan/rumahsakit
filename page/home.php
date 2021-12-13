<?php 

$pasien = mysqli_query($conn,"SELECT * FROM tb_pasien");
$data_pasien = mysqli_num_rows($pasien);

$dokter = mysqli_query($conn,"SELECT * FROM tb_dokter");
$data_dokter = mysqli_num_rows($dokter);

$obat = mysqli_query($conn,"SELECT * FROM tb_obat");
$data_obat = mysqli_num_rows($obat);

$poli = mysqli_query($conn,"SELECT * FROM tb_poli");
$data_poli = mysqli_num_rows($poli);

 ?>
<!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $data_pasien ?></h3>

                <p>Data Pasien</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="?page=pasien" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $data_dokter ?></h3>

                <p>Data Dokter</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="?page=dokter" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $data_poli ?></h3>

                <p>Data Poliklinik</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="?page=poli" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $data_obat ?></h3>

                <p>Data Obat</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="?page=obat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          