
<?php include 'dbconnect.php';?>
<br>
<div class="row">
<div class="col-md-12">
<div class="card">

      <div class="card-header">
        <h3 class="card-title">Register From</h3>
      </div>
      <div class="card-body">
      <div class="row">
    <div class="col-md-6">
      <form onsubmit="return validate()" method="post" enctype="multipart/form-data">
              <input name="update_id" type="hidden">

        <div class="form-group has-feedback">
        <label>Enter You Full Name</label> 
          <input type="text" required name="name" id="name" onkeyup="manage(this)" class="form-control" placeholder="Full name">
          <span class="fa fa-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
        <label>Enter You Phone number</label>           
            <input type="number" required onkeyup="manage(this)" id="phone" name="phone" class="form-control" placeholder="phone">
            <span class="fa fa-phone form-control-feedback"><label id="labnum" style="color:red; visibility:hidden">password min 11..try agin</label></span>
          </div>

          <div class="form-group has-feedback">
           <label>plz click admin/user</label>
           <select class="form-control" name="permision">
            <option value="user">user</option>
            <option value="admin">admin</option>
            
           </select>
           <span class="fa fa-lock form-control-feedback"></span>
        </div>
     </div>


        
    <div class="col-md-6">
        <div class="form-group has-feedback">
        <label>Enter You Email</label> 
          <input type="email" required onkeyup="manage(this)" name="email" id="email" class="form-control" placeholder="Email">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
        <label>Enter You Password</label>
          <input type="password" required onkeyup="manage(this)" id="myInput"  name="password" class="form-control" placeholder="Password">         
          <span class="fa fa-lock form-control-feedback"></span>
        </div>


        <div class="form-group has-feedback">
        <label>Enter You Repassword</label>
          <input type="password" required id="myInputre" onkeyup="manage(this)" name="repassword" class="form-control" placeholder="Retype password">

          <span class="fa fa-lock form-control-feedback"> <label id="labpass" style="color:red; visibility:hidden"> &nbsp; not same pasword..plz try</label></span>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
              <input type="checkbox" onclick="myFunction()"> &nbsp;Show Password
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="btn-submit" disabled class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </div>
     
      </form>
      </div>
  
      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="https://facebook.om" class="btn btn-block btn-primary">
          <i class="fa fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="https://google.om" class="btn btn-block btn-danger">
          <i class="fa fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.html" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
  </div>
 
 
  <div class="col-md-12">
  <div class="card">
      <div class="card-header">
        <h3 class="card-title">All Admin List</h3>
      </div>
      <div class="card-body">
      <!-- display class include scrolle datatable-->
      <table id="book_details" class="table  table-bordered table-hover table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Admin/user</th>
                      <th>Name</th>
                      <th>phone</th>
                      <th>Email</th>
                      <th>Photo</th>
                      <th>Edit/Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                  

  if (isset($_POST["name"]) && $_POST["name"] != "") {
    if (isset($_POST["email"]) && $_POST["email"] != "") {
      if (isset($_POST["update_id"]) && $_POST["update_id"] != "") {
        $results = ("UPDATE  project SET name='" . $_POST["name"] . "', phone='" . $_POST["phone"] . "', email='" . $_POST["email"] . "', password='" . $_POST["password"] . "', repassword='" .$_POST["repassword"] . "' , permision='" . $_POST["permision"] . "' WHERE id=" . $_POST["update_id"]);
        $sqlconn = mysqli_query($dbconn,$results);
                                      echo '<script type="text/javascript"> 
                                             window.location = "";
                                             </script>';

      }else{

       
        $sql = "INSERT INTO project(name,phone,email,password,repassword,permision,upload_photo) VALUES('".$_POST["name"]."','".$_POST["phone"]."','".$_POST["email"]."','".($_POST["password"])."','".($_POST["repassword"])."' ,'".$_POST["permision"]."',0)";
        $sqlconn = mysqli_query($dbconn,$sql);
        echo '<script type="text/javascript">
        window.location = "";
        </script>';
      }
    }
  }

  ?>
    <?php 
    $i=1;
      $selecta=("SELECT * FROM project");
      $select_results=mysqli_query($dbconn,$selecta);
    ?>
<?php foreach ($select_results as $row): ?>

                <tr>
                    <td data-label=""><img src="upload/<?=$row['upload_photo'] ?>" class="img-circle elevation-2"
           style="height:50px "></td>
                    <td data-label="admin/user:"><?= $row['permision']; ?></td>
                    <td data-label="name:"><?= $row['name']; ?></td>
                    <td data-label="phone:"><?= $row['phone']; ?></td>
                    <td data-label="email:"><?= $row['email']; ?></td>
                    <td data-label="photo:"><a class="btn btn-success btn-sm" name="avs" data-id="<?= $row['id']; ?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-picture-o"></span>&nbsp;photo</a></td>
                    <td data-label="actions:">
                        <ul class="actions">
                            <li>
                              <a class="btn btn-primary btn-sm" name="adv_edit" data-id="<?= $row['id']; ?>" data-value-1="<?= $row['name']; ?>" data-value-2="<?= $row['phone']; ?>" data-value-3="<?= $row['email']; ?>" data-value-4="<?= $row['password']; ?>" data-value-5="<?= $row['repassword']; ?>" data-value-6="<?= $row['permision']; ?>"><span class="fa fa-pencil-square-o"></span>&nbsp;Edit</a>
                            </li>
                            <li>
                              <!-- <a class="btn btn-danger btn-sm" href="?p=reg&delete_id=<?= $row["id"];?>" data-id="<?= $row['id']; ?>"><span class="fa fa-trash-o"></span>&nbsp;Delete</a> -->
                              <a class="btn btn-danger btn-sm"  id="deleteCompany" data-id="<?= $row["id"];?>"><span class="fa fa-trash-o"></span>&nbsp;Delete</a>
                            </li>
                        </ul>
                    </td>
                </tr>
      <?php endforeach; ?>

      <!--php delete image -->
  <?php 
  // if (isset($_GET['delete_id']) && $_GET['delete_id']!="") {

  //   $delete_id=$_GET['delete_id'];
    
  //   $image_select = $dbconn->query("SELECT * FROM project WHERE id='".$delete_id."' ");
  //   $after = mysqli_fetch_assoc($image_select);
  //   if($after['upload_photo'] && $delete_id !=''){
  //     unlink('upload/'.$after['upload_photo']);
  //   }
  //   $delete="DELETE FROM project WHERE id=$delete_id";
  //   $delete_result=mysqli_query($dbconn,$delete);

  //   echo '<script type="text/javascript">
  //     window.location = "?p=reg";
  //   </script>';

  //  }
       ?>

      <!--php delete image end -->

    </tbody>
  </table>
<script type="text/javascript">
    $(document).ready(function () {
      $('#book_details').DataTable({  
        "width": "100%",
        // "scrollX":true
      });
    });


/////////////aiax by delete profile photo///////////////////
 $("body").on("click","#deleteCompany",function(e){

var id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");

swal({
            title: "Are you sure?",
            text: "Once Deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url:"delete_admin_p.php",
                    type: 'POST',
                    data: {
                    _token: token,
                        id: id
                    },
                    success: function(data){
                        swal({
                            title: "Success!",
                            text : "Post has been deleted \n Click OK to refresh the page",
                            icon : "success",

                        }),
                        location.reload();
                    },
                    error : function(){
                        swal({
                            title: 'Opps...',
                            text : data.message,
                            type : 'error',
                            timer : '1500'
                        })
                    }
                })
            } else {
            swal("Your imaginary file is safe!");
            }
        });
});

/////////////aiax by delete profile photo end///////////////////

////////////////submite button hide/show //////
function manage(text){
  var bt= document.getElementById("btn-submit");
  var ele= document.getElementsByTagName("input");

  for (let i = 0; i < ele.length; i++) {
    if ( ele[i].type == 'text' && ele[i].value == '') {
      bt.disabled=true;
      return false;
    }else if(ele[i].type == 'number' && ele[i].value == ''){
      bt.disabled=true;
      return false;
    }else if(ele[i].type == 'email' && ele[i].value == ''){
      bt.disabled=true;
      return false;
    }else{
      bt.disabled=false;
    }
    
  }
  
}

////

function validate(){
  var password = document.getElementById("myInput");
  var repassword = document.getElementById("myInputre");
  var phone = document.getElementById("phone");
  var permision = document.getElementById("permision");
  // var regx = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-z]{2,5}$/;
   

   if (password.value.trim() != repassword.value.trim()) {
    password.style.border ="solid 3px red";
    repassword.style.border ="solid 3px red";
    document.getElementById("labpass").style.visibility="visible";
     return false;
   }else if(phone.value.trim().length < 10){
    phone.style.border ="solid 3px red";
    document.getElementById("labnum").style.visibility="visible";
    return false;
   }
   else{
     return true;
   }
}

      ///////////////////update////////////////
    $('[name="adv_edit"]').click(function () {
          $('[name="name"]').val($(this).attr("data-value-1"));
          $('[name="phone"]').val($(this).attr("data-value-2"));
          $('[name="email"]').val($(this).attr("data-value-3"));
          $('[name="password"]').val($(this).attr("data-value-4"));
          $('[name="repassword"]').val($(this).attr("data-value-5"));
          $('[name="permision"]').val($(this).attr("data-value-6"));
          $('[name="update_id"]').val($(this).attr("data-id"));
          $("#btn-submit").html('<span class="fa  fa-pencil-square-o"></span>&nbsp;<?php echo "update";?>');
          $('[name="add"]').focus()
      });


      ///////////////////password show//////////////
      function myFunction() {
      var x = document.getElementById("myInput");
      var y = document.getElementById("myInputre");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    
    if(y.type === "password"){
      y.type = "text";
    }else {
        y.type = "password";
      }
    }
</script>


</div>
</div>
</div>

</div>





<!------------------ photo upload -------------------------------------->
<div class="row">
<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">

    <meta name="_token" content="{{ csrf_token() }}">

<style type="text/css">
img {
  display: block;
  max-width: 100%;
}
.preview {
  overflow: hidden;
  width: 160px; 
  height: 160px;
  margin: 10px;
  border: 1px solid red;
}
.modal-lg{
  max-width: 700px !important;
}
</style>



    <form method="post">
    <input type="hidden" id="profile_photo_id" name="photo_id">
    <input type="file" name="image" class="image">
    </form>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="img-container">
            <div class="row">
                <div class="col-md-8">
                    <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                </div>
                <div class="col-md-4">
                    <div class="preview"></div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="crop">Crop&save</button>
      </div>
    </div>
  </div>
</div>


<script>

var $modal = $('#modal');
var image = document.getElementById('image');

// var element =document.getElementById('theuser');
$('[name="avs"]').click(function () {
  $('[name="photo_id"]').val($(this).attr("data-id"));

  var profile_photo_id = document.getElementById('profile_photo_id').value;
  var cropper;
  
$("body").on("change", ".image", function(e){
  
    var files = e.target.files;
    var done = function (url) {
      image.src = url;
      $modal.modal('show');
    };
    var reader;
    var file;
    var url;

    if (files && files.length > 0) {
      file = files[0];

      if (URL) {
        done(URL.createObjectURL(file));
      } else if (FileReader) {
        reader = new FileReader();
        reader.onload = function (e) {
          done(reader.result);
        };
        reader.readAsDataURL(file);
      }
    }
});

$modal.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
    aspectRatio: 1,
    viewMode: 2,
    preview: '.preview'
    });
}).on('hidden.bs.modal', function () {
   cropper.destroy();
   cropper = null;
});

$("#crop").click(function(){
    canvas = cropper.getCroppedCanvas({
      width: 160,
      height: 160,
    });

    canvas.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
         reader.readAsDataURL(blob); 
         reader.onloadend = function() {
            var base64data = reader.result;  
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "upload.php",
                data: {image: base64data, profile_photo_id:profile_photo_id},
                success: function(data){
                    console.log(data);
                    $modal.modal('hide');
                }
              });
              window.location = "";
         }
         
    });
})
})




</script>


        <!-- /.modal -->
        </div>

<!------------------ photo upload end -------------------------------------->

