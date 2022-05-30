<?php
include "inc/koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Masjid UMK | Log in</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/login.css">
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="dist/img/mosque.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <p class="login-card-description">
                  <b>Aplikasi</b>
                  <?php
                  $sql = $koneksi->query("select * from tb_masjid");
                  while ($row = mysqli_fetch_array($sql)) {
                  ?>

                    <a><?php echo $row['name']; ?></a>

                    <link rel="icon" href="dist/img/mosque.jpg">
                  <?php } ?>
                </p>
              </div>
              <p class="login-card-footer-text">Sign into your account

              <form action="" method="post">
                <div class="form-group">
                  <label for="username" class="sr-only">Name</label>
                  <input type="text" name="username" id="name" class="form-control" placeholder=" enter your Name" required>
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="enter your password">
                </div>
                <button type="submit" class="btn btn-success btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
                  <b>Masuk</b>
                </button>
                <!-- <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login" name="btnLogin"> -->
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- Alert -->
  <script src="plugins/alert.js"></script>
</body>

</html>

<?php





if (isset($_POST['btnLogin'])) {
  //anti inject sql
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = mysqli_real_escape_string($koneksi, $_POST['password']);

  //query login
  $sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password='$password'";
  $query_login = mysqli_query($koneksi, $sql_login);
  $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
  $jumlah_login = mysqli_num_rows($query_login);


  if ($jumlah_login == 1) {
    session_start();
    $_SESSION["ses_id"] = $data_login["id_pengguna"];
    $_SESSION["ses_nama"] = $data_login["nama_pengguna"];
    $_SESSION["ses_username"] = $data_login["username"];
    $_SESSION["ses_password"] = $data_login["password"];
    $_SESSION["ses_level"] = $data_login["level"];

    echo "<script>
			Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'http://localhost/kas-masjid/';}
			})</script>";
  } else {
    echo "<script>
			Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'login';}
			})</script>";
  }
}
