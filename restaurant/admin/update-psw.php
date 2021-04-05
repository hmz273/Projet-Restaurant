<?php include('patials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>update password</h1>
        <br><br>


       
<?php 
 if(isset($_GET['id'])){
     $id=$_GET['id'];
 }
 ?>


<form action="" method="post">
  <table class="adm">
  <tr>
  <td>current password:</td>
  <td>
  <input type="password" name="current_password" placeholder="old password">
  </td>
  </tr>


  <tr>
  <td>new password:</td>
  <td>
  <input type="password" name="new_password" placeholder="new password">
  </td>
  </tr>


  <tr>
  <td>confirm password:</td>
  <td>
  <input type="password" name="confirm_password" placeholder="confirm password">
  </td>
  </tr>


  <tr>
  <td colspan="2">
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <input type="submit" name="submit" value="update" class="sbm">
  </td>
  </tr>
 
    </div>
</div>
</table>
</form>

<?php

   //checking submit btn
   if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);
    
    $sql = "SELECT * FROM admin WHERE id=$id AND password='$current_password'";

    $res = mysqli_query($conn, $sql);

    if($res==true){
        $count=mysqli_num_rows($res);

        if($count==1){
             
            if($new_password==$confirm_password){
                $sql = "UPDATE admin SET password='$new_password'
                WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                if($res==true){
                    $_SESSION['changed'] = "<div class='update'>changed.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

                else{
                    $_SESSION['changed'] = "<div class='error'>failed .</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }
            else{
                $_SESSION['pwd-not-same'] = "<div class='error'>password incorrect .</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }

        else{
            $_SESSION['user-not-found'] = "<div class='error'>user not found. </div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
   }

?>






















