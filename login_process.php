<?php
session_start();
include 'admin/dbconnect.php';
$email=$_POST['email'];
$password=($_POST['password']);



if ($_POST['email'] !="" AND $_POST['password'] !="") {

  if (!isset($_POST['remember'])) {
    $_POST['remember']=0;
  }
  $remember = trim($_POST['remember']);
  
$select="SELECT COUNT(*) as loginemail, name, email, permision, id FROM project WHERE email='$email'";
$select_result=mysqli_query($dbconn,$select);
$after_assoc=mysqli_fetch_assoc($select_result);

if ($after_assoc['loginemail']==1) {
  $select2="SELECT * FROM project WHERE email='$email'";
  $select_result2=mysqli_query($dbconn,$select2);
  $after_assoc2=mysqli_fetch_assoc($select_result2);

if (($_POST['password']) == ($after_assoc2['password'])) {
  // code...
      $_SESSION['admin']="admin";
      $_SESSION['user_admin']="user_admin";
      $_SESSION["remember"] = $remember;
      $_SESSION['password']=$password;
      $_SESSION['permision']=$after_assoc['permision'];
      $_SESSION['id']=$after_assoc['id'];
      $_SESSION['name']=$after_assoc['name'];
      $_SESSION['email']=$after_assoc['email'];
      header("location:admin/?p=Home");
}
else {
  // code...
   $_SESSION['pass_not_match']="pass_not_match";
    header("location:login.php");
}

}
else {
  $_SESSION['pass_not_match']="pass_not_match";
  $_SESSION['email_not_match']="email_not_match";
   header("location:login.php");
}

  }else{
    header("location:login.php");
  }

 ?>

    