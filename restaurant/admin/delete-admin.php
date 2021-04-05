<?php
include('../config/constants.php');

//get id of admin to be deleted
$id = $_GET['id'];

//sql query to delete
$sql = "DELETE FROM admin WHERE id=$id";

//execute the query
$res = mysqli_query($conn, $sql);

if($res==true){
//echo "admin deleted";

//create session variable to display mes
$_SESSION['delete'] = "<div class='success'>admin deleted successfully.</div>";
header('location:'.SITEURL.'admin/manage-admin.php');
}

else{
//echo "failed";

$_SESSION['delete'] = "<div class='error'>failed to delete admin.</div>";
header('location:'.SITEURL.'admin/manage-admin.php');
}
?>