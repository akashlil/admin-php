<?php

session_start();
unset($_SESSION["admin"]);
unset($_SESSION["user_admin"]);
unset($_SESSION["name"]);
unset($_SESSION["id"]);
unset($_SESSION["permision"]);
unset($_SESSION["email"]);
session_destroy();
header('location:../login.php');
?>
<script type="text/javascript">
//   var timeout = setTimeout("location.reload(true);",1000);
//   function resetTimeout() {
//     clearTimeout(timeout);
//     timeout = setTimeout("location.reload(true);",1000);
// window.location.replace("?p=Home");
//   }
</script>
<?php

exit();
?>