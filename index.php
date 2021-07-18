<?php include('header.php');


if ($page == "Home") {
    include "home.php";
} elseif ($page == "Gallery") {
    include "GALLERY.php";
}  elseif ($page == "Notice") {
    include "NOTICE.php";
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
} 
else {
    include "HOME.php";
}

 include('footer.php'); ?>