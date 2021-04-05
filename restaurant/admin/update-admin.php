<?php include('patials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
       <h1>Update Admin</h1>
       <br> <br>

       <?php 
       // get id of admin
       $id = $_GET['id'];

       //create sql query
       $sql = "SELECT * FROM admin WHERE id=$id";

       //execute the query
       $res=mysqli_query($conn, $sql);

       //checking qurey
       if($res==true){
           //checking data
           $count = mysqli_num_rows($res);
           if($count==1){
             $row=mysqli_fetch_assoc($res);
             $full_name = $row['full_name'];
             $username = $row['username'];
           }
           else{

            header('location:'.SITEURL.'admin/manage-admin.php');
           }



       }

?>

       <form action="" method="post">

       <table class="adm">
                <tr>
                   <td>full name: </td>
                   <td><input type="text" name="full_name" value="<?php echo $full_name;?>"></td>
                </tr>
                <tr>
                   <td>username: </td>
                   <td><input type="text" name="username" value="<?php echo $username;?>"></td>
                </tr>
                <tr>
                
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="update" class="sbm">
                    </td>
                </tr>
        </table>

       

       </form>
    </div>
</div>



<?php 

//checking submit btn
if(isset($_POST['submit'])){
    //get value from FORM
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    //sql query
    $sql = "UPDATE admin SET
      full_name = '$full_name',
      username = '$username'
      WHERE id='$id'
      ";

      $res = mysqli_query($conn, $sql);

      if($res==true){
          $_SESSION['update'] = "<div class='success'>update.</div>";
          header('location:'.SITEURL.'admin/manage-admin.php');
      }

      else{
        $_SESSION['update'] = "<div class='error'>error.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
      }
} 


?>









