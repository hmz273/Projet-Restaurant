<?php include('patials/menu.php');?>


<!-- main content section S -->

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

<br>

<?php if(isset($_SESSION['add'])){
    echo $_SESSION['add'];//display session
    unset($_SESSION['add']);//removing session
}

 if(isset($_SESSION['delete'])){
     echo $_SESSION['delete'];
     unset($_SESSION['delete']);
 }

 if(isset($_SESSION['update'])){
     echo $_SESSION['update'];
     unset($_SESSION['update']);
 }


 if(isset($_SESSION['pwd-not-same'])){
    echo $_SESSION['pwd-not-same'];
    unset($_SESSION['pwd-not-same']);
}

 if(isset($_SESSION['user-not-found'])){
    echo $_SESSION['user-not-found'];
    unset($_SESSION['user-not-found']);
}


if(isset($_SESSION['changed'])){
    echo $_SESSION['changed'];
    unset($_SESSION['changed']);
}

?>

<!-- button to add admin -->
</br> </br>
     <a href="add-admin.php" class="btn-primary">add admin</a>
<!-- end -->
        <table class="tbl-full">
</br> </br>
            <tr class="row">
                <th>S.N.</th>
                <th>full name</th>
                <th>username</th>
                <th>action</th>
            </tr>


            <?php 
            //query to get all admin
        $sql = "SELECT * FROM admin";
            //execute the query
        $res = mysqli_query($conn,$sql);
            //check whether the query is executed ?
        if($res==true){
            //count rows to check whether we have data in db
            $count = mysqli_num_rows($res);

            //var for id++ 1,2,3
            $sn=1;

            //check the num of rows
            if($count>0){
            //we have
            while($rows=mysqli_fetch_assoc($res)){
                //using while loop to get all the data from db
                //&while loop run as long as we have data in db
                
                $id=$rows['id'];
                $full_name=$rows['full_name'];
                $username=$rows['username'];
            ?>
           <tr>
                <td class="sn"><?php echo $sn++;?></td>
                <td><?php echo $full_name;?></td>
                <td><?php echo $username;?></td>
                <td>
                <a href="<?php echo SITEURL; ?>admin/update-psw.php?id=<?php echo $id; ?>" class="btn-primary">change password</a>
                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="update">update</a>
                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="delete">delete</a>
                </td>
            </tr>
            <?php
                }
            }

            
        }
            ?>






            

        </table>
    </div>
</div>

<!-- main content section E -->


