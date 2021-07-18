<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="admin/deshboard/all_files_deshboard/jquery.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/deshboard/asset/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin/deshboard/asset/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="login_process.php" onsubmit="return validate()" method="post">
      <?php if (isset($_SESSION["email_not_match"])):?>
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                email not match
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        <?php endif; unset($_SESSION["email_not_match"]); ?>
        <div class="form-group has-feedback">
          <input type="email" required id="email" name="email"class="form-control" placeholder="Email">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <?php if (isset($_SESSION["pass_not_match"])):?>
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                pass_not_match
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        <?php endif; unset($_SESSION["pass_not_match"]); ?>
        <div class="form-group has-feedback">
          <input type="password" id="password" required name="password" class="form-control" placeholder="Password">
          <span class="fa fa-lock form-control-feedback"></span>
          <input type="checkbox" onclick="myFunction()">&nbsp; password show
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="remember">&nbsp; remember me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit"  id="btn_submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fa fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fa fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script> 
<!-- Bootstrap 4 -->
<script src="admin/deshboard/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="admin/deshboard/asset/plugins/iCheck/icheck.min.js"></script>

<script>
  // $(function () {
  //   $('input').iCheck({
  //     checkboxClass: 'icheckbox_square-blue',
  //     radioClass   : 'iradio_square-blue',
  //     increaseArea : '20%' // optional
  //   })
  // })


  function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

  function validate(){
  var password = document.getElementById("password");
  var email = document.getElementById("email");

  if (email.value.trim() == "") {
    email.style.border ="solid 3px red";
     return false;
   }else if(password.value.trim() ==""){
    password.style.border ="solid 3px red";
    return false;
   }
   else{
     return true;
   }
}
</script>

</body>
</html>
