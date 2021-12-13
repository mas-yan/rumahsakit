<?php 

$page = @$_GET['page'];


if ($page == 'pasien') {
  $masteraktif1 = 'menu-open';
  $masteraktif2 = 'active';
  $pasienaktif = 'active'; 
}elseif ($page == 'dokter') {
  $masteraktif1 = 'menu-open';
  $masteraktif2 = 'active';
  $dokteraktif = 'active'; 
}elseif ($page == 'poli') {
  $masteraktif1 = 'menu-open';
  $masteraktif2 = 'active';
  $poliaktif = 'active'; 
}elseif ($page == 'obat') {
  $masteraktif1 = 'menu-open';
  $masteraktif2 = 'active';
  $obatakif = 'active'; 
}elseif ($page == 'medis') {
  $masteraktif1 = 'menu-open';
  $masteraktif2 = 'active';
  $medisaktif = 'active'; 
}elseif ($page == '') {
  $dashboard = 'active';
}

?>

<!-- Brand Logo -->
<a href="index.php" class="brand-link">
  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
  style="opacity: .8">
  <span class="brand-text font-weight-light">R.S Selalu Sehat</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="index.php" class="d-block"><?=$_SESSION['nama']?></a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->

          <li class="nav-item">
          <a href="index.php"
            class="nav-link <?= $dashboard ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview <?= $masteraktif1 ?>">
          <a href="#" class="nav-link <?= $masteraktif2 ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('?page=pasien') ?>" class="nav-link <?= $pasienaktif ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pasien</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('?page=dokter') ?>" class="nav-link <?= $dokteraktif ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Dokter</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('?page=poli') ?>" class="nav-link <?= $poliaktif ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Poliklinik</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('?page=obat') ?>" class="nav-link <?= $obatakif ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Obat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('?page=medis') ?>" class="nav-link <?= $medisaktif ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Rekam Medis</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->