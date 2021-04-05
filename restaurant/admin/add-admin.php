<?php 
include('patials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br> <br>

        <?php 
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
       ?>


        <form action="" method="post">
            <table class=adm>
                <tr>
                   <td>full name: </td>
                   <td><input type="text" name="full_name" placeholder="enter name"></td>
                </tr>
                <tr>
                   <td>username: </td>
                   <td><input type="text" name="username" placeholder="enter username"></td>
                </tr>
                <tr>
                   <td>password: </td>
                   <td><input type="password" name="password" placeholder="enter password"></td>
                </tr>

                <tr>
                
                    <td colspan="2">
                        <input type="submit" name="submit" value="add admin" class="sbm">
                    </td>
                </tr>
            </table>
    </form>

    

<?php
// process the value from FORM and save it in db

if(isset($_POST['submit'])){
    //button clicked
    //echo "button clicked";

    //get data from Form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //psw encryption with md5
    //sql query save data into
    $sql = "INSERT INTO admin SET
         full_name='$full_name',
         username='$username',
         password='$password'";


    //sql conection
    $res = mysqli_query($conn, $sql) or die(mysqli_error());


    if($res==true){
        $_SESSION['add'] = "admin added";
        header("location:".SITEURL.'admin/manage-admin.php');
    }

    else{
        $_SESSION['add'] = "errore added";
        header("location:".SITEURL.'admin/add-admin.php');
    }







}


?>



</div>
</div>
















