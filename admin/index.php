<?php 
session_start();
require_once("deshboard/header.php");
// require '../login_process.php';
$page = "";
$per="";
if (isset($_GET["p"])) {
    $page = $_GET["p"];
}


if (isset($_SESSION['admin']) && $_SESSION["admin"] !="") {
    require ('topbar.php');
    require ('sidebar.php');
    echo '<div class="content-wrapper">
    <section class="content">
    <div class="container-fluid">';
    if ($_SESSION["user_admin"] == "user_admin") {

        if ($page == "Home") {
            include "Admin_home.php";
        } elseif ($page == "reg") {
            if ($_SESSION['permision'] == 'admin') {
                include "reg.php";
            }           
        }  elseif ($page == "slider") {
            include "header_slider.php";
        } elseif ($page == "About_us") {
            include "ABOUT.php";
        } elseif ($page == "recover") {
            include "Recovery.php";
        } elseif ($page == "Contact_us") {
            include "Contact.php";
        } elseif ($page == "Search") {
            include "SEARCH.php";
        } elseif ($page == "Login") {
            include "LOGIN.php";
        } elseif ($page == "Recovery") {
            include "LOGIN_RECOVER.php";
        } elseif ($page == "admission_form") {
            include "admission_form.php";
        } elseif ($page == "online_admission") {
            include "online_admission.php";
        } elseif ($page == "online_admission_info_print") {
            include "online_admission_info_print.php";
        }else {
            include "Admin_home.php";
        } 
    }
           # code...
}elseif($page == "logout"){
    include "log_out.php";
}else {
    header("location: ../login.php");
}
    
echo '</div></section></div>';
require("deshboard/footer.php");
?>