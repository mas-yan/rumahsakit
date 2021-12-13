<?php 
include "include/koneksi.php";

if (isset($_SESSION['user'])) {
  echo "<script>window.location='".base_url('index.php')."';</script>";
}else{
 ?>
<!DOCTYPE html>
<html>
<head>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition login-page">
          <!-- left column -->
          <div class="col-lg-4">
          <div class="login-box" style="margin: 15px;">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Login</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input required="required" type="text" name="user" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input required="required" type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="login-proses" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

<?php

if (isset($_POST['login-proses'])) {
// mengambil data dari form
$user = mysqli_real_escape_string($conn,$_POST['user']);
$pass = sha1(mysqli_real_escape_string($conn,$_POST['pass']));

// mencocokkan data ke db
$query = mysqli_query($conn,"SELECT * FROM user WHERE username = '$user' AND password = '$pass' ") or die(mysqli_error($conn));

// jika data benar
  $row = mysqli_num_rows($query);
  if ($row > 0) {
    $data = mysqli_fetch_assoc($query);
    
    // jika user sebagai admin
    if ($data['level'] == 'Admin') {

      $_SESSION['nama'] = $data['nama'];
      $_SESSION['user'] = $data['username'];
      $_SESSION['level'] = $data['level'];

      echo "<script>window.location='".base_url()."';</script>";
    }elseif ($data['level'] == 'Admin') {

      $_SESSION['nama'] = $data['nama'];
      $_SESSION['user'] = $data['username'];
      $_SESSION['level'] = $data['level'];

      echo "<script>window.location='".base_url()."';</script>";
    }else{
    ?>
    <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 5000
    });

 
Toast.fire({
        icon: 'error',
        title: 'Login gagal! Level salah anda salah'
      });
</script>
    <?php
  }
  }else{
    ?>
    <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 5000
    });

 
Toast.fire({
        icon: 'error',
        title: 'Login gagal! username/password anda salah'
      });
</script>
    <?php
  }
}
 ?>
</body>
</html>

<?php 
}
?>