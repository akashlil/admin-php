<?php  

include 'dbconnect.php';

if (isset($_POST['id']) && $_POST['id']!="") {
$delete_id=$_POST['id'];
$image_select = $dbconn->query("SELECT * FROM project WHERE id='".$delete_id."' ");
$after = mysqli_fetch_assoc($image_select);
if($after['upload_photo'] && $delete_id !=''){
  unlink('upload/'.$after['upload_photo']);
}
$delete="DELETE FROM project WHERE id=$delete_id";
$delete_result=mysqli_query($dbconn,$delete);

// echo '<script type="text/javascript">
//   window.location = "?p=reg";
// </script>';

}

?>