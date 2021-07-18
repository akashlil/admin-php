<?php

include 'dbconnect.php';

if (isset($_POST['profile_photo_id']) && $_POST['image']!="") {

        $profile_id = $_POST["profile_photo_id"];
        // $uploaded_photo=$_POST['image'];

        $image_select = $dbconn->query("SELECT * FROM project WHERE id='".$profile_id."' ");
        $after = mysqli_fetch_assoc($image_select);
        if(unlink('upload/'.$after['upload_photo'])==true){
                // unlink('upload/'.$after['upload_photo']);
                $folderPath = 'upload/';
                $image_parts = explode(";base64,", $_POST['image']);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.png';
                $file = $folderPath . $fileName;
        
                file_put_contents($file, $image_base64);

                $upload_photos="UPDATE project SET upload_photo='$fileName'
        WHERE id='$profile_id'";
        $update_result=mysqli_query($dbconn,$upload_photos);
        if ($update_result) {
                header("location:?p=reg");
                echo json_encode(["image uploaded successfully."]);
            }
        
      }else{
        $folderPath = 'upload/';
        $image_parts = explode(";base64,", $_POST['image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;

        file_put_contents($file, $image_base64);

        $upload_photos="UPDATE project SET upload_photo='$fileName'
                WHERE id='$profile_id'";
                $update_result=mysqli_query($dbconn,$upload_photos);
                if ($update_result) {
                        header("location:?p=reg");
                        echo json_encode(["image uploaded successfully."]);
                }   
      }
       
        
  }

?>