<?php 

                
// if (!isset($dbconn)) {
//   include "dbconnect.php";
// }

$remember_me=$_SESSION["remember"];
$login=$_SESSION["email"];
$password=$_SESSION["password"];
if($remember_me=='1' || $remember_me>'0')
                    {
                    $hour = time() + 3600 * 24 * 30;
                    setcookie('username', $login, $hour);
                         setcookie('password', $password, $hour);
                    }else{
                        $hour ="";
                    }
?>
<!DOCTYPE html>
<html>
<head>
  <script src="deshboard/all_files_deshboard/jquery.min.js"></script>
  
  <script src="deshboard/all_files_deshboard/cropper.js"></script>
  <link rel="stylesheet" href="deshboard/all_files_deshboard/cropper.css">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="deshboard/asset/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="deshboard/asset/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="deshboard/asset/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="deshboard/asset/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="deshboard/asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="deshboard/asset/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="deshboard/asset/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="deshboard/asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- /////////////////////////////lockscreen -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="deshboard/asset/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="deshboard/asset/plugins/datatables/dataTables.bootstrap4.css">

  <script src="deshboard/sweetalert/sweetalert.min.js"></script>
<!-- exta link -->
  <link rel="stylesheet" href="deshboard/all_files_deshboard/bootstrap-toggle.css">

  <link rel="stylesheet" href="deshboard/all_files_deshboard/jquery.dataTables.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

  
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous"/> -->
<!-- end -->
<link rel="stylesheet" href="deshboard/styles/main.css'"/>
 <link rel="stylesheet" href="deshboard/styles/responsive-table.css" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include '../admin/dbconnect.php';?>
 