<?php 
  session_start();
  require_once "module/login.php";
    $login= new login();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Poliklinik Berkah Jaya</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/sb-admin-2.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><center>Login Poliklinik Berkah Jaya</center></h3>
                    </div>
                    <div class="panel-body">
                        <?php
                              if (empty($_GET['alert'])) {
                                echo "";
                              } 
                              // jika alert = 1
                              // tampilkan pesan Gagal "username atau password salah, cek kembali username dan password Anda"
                              elseif ($_GET['alert'] == 1) {
                                echo "<div class='alert alert-danger alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4>  <i class='icon fa fa-times-circle'></i> Login Failed!</h4>
                                        Wrong username or password, check again your username or password.
                                      </div>";
                             }
                             elseif ($_GET['alert'] == 2) {
                                echo "<div class='alert alert-success alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4>  <i class='icon fa fa-times-circle'></i> Logout Successfull!</h4>
                                        
                                      </div>";
                             }

                        ?>

                        <form action="" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username" type="text" required="" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" name="submit">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['submit'])){
    	$login->loginAdmin($_POST['username'],$_POST['password']);
    	
    	//echo $_POST['password'];
    }
     ?>
</body>
</html>
