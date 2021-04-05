<?php include('patials/menu.php'); ?>

<?php 
    //CHeck whether id is set or not 
    if(isset($_GET['id']))
    {
        //Get all the details
        $id = $_GET['id'];

        //SQL Query to Get the Selected Food
        $sql = "SELECT * FROM `food` WHERE id=$id";
        //execute the Query
        $res = mysqli_query($conn, $sql);

        //Get the value based on query executed
        $row = mysqli_fetch_assoc($res);

        
            //Get all the data
        $title = $row['title'];
        $description = $row['description'];
        $price = $row['price'];
        $current_image = $row['image'];
        $feature = $row['feature'];
        $active = $row['active'];
    }
    else
    {
        //Redirect to Manage Food
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

        <form action="update-food.php" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-full">

            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
            </tr>

            
            <tr>
                
                <td>Select New Image: </td>
                
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($feature=="yes") {echo "checked";} ?> type="radio" name="feature" value="yes"> Yes 
                    <input <?php if($feature=="no") {echo "checked";} ?> type="radio" name="feature" value="no"> No 
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=="yes") {echo "checked";} ?> type="radio" name="active" value="yes"> Yes 
                    <input <?php if($active=="no") {echo "checked";} ?> type="radio" name="active" value="no"> No 
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $image; ?>">

                    <input type="submit" name="submit" value="update" class="sbm">
                    
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php
   

 if(isset($_POST["submit"]))
 {
$id = isset($_POST["id"])?$_POST["id"]:0;
$title = isset($_POST["title"])?$_POST["title"]:"";
$description = isset($_POST["description"])?$_POST["description"]:"";
$price = isset($_POST["price"])?$_POST["price"]:"";
$image = isset($_POST["image"])?$_POST["image"]:"";
$feature = isset($_POST["feature"])?$_POST["feature"]:"";
$active = isset($_POST["active"])?$_POST["active"]:"";




    //   //SQL Query to Get the Selected Food
    $sql = "UPDATE food SET title='$title',description='$description',price=$price,image='$image',feature='$feature',active='$active' WHERE id = '$id'
    ";

      //execute the Query
      $res = mysqli_query($conn, $sql); 

      header("location:manage-food.php");


      //2. Upload the image if selected

                //CHeck whether upload button is clicked or not
                if(isset($_FILES['image']['name']))
                {
                    //Upload BUtton Clicked
                    $image = $_FILES['image']['name']; //New Image NAme

                    //CHeck whether th file is available or not
                    if($image!="")
                    {
                        //IMage is Available
                        //A. Uploading New Image

                        //REname the Image
                        $ext = end(explode('.', $image)); //Gets the extension of the image

                        $image = "Food-Name-".rand(0000, 9999).'.'.$ext; //THis will be renamed image

                        //Get the Source Path and DEstination PAth
                        $src_path = $_FILES['image']['tmp_name']; //Source Path
                        $dest_path = "../assets/img/food/".$image; //DEstination Path

                        //Upload the image
                        $upload = move_uploaded_file($src_path, $dest_path);

                        /// CHeck whether the image is uploaded or not
                        if($upload==false)
                        {
                            //FAiled to Upload
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload new Image.</div>";
                            //REdirect to Manage Food 
                            header('location:'.SITEURL.'admin/manage-food.php');
                            //Stop the Process
                            die();
                        }
                        //3. Remove the image if new image is uploaded and current image exists
                        //B. Remove current Image if Available
                       
                    }
                   
 }
}

    //   //Get the value based on query executed
    //   $row = mysqli_fetch_assoc($res);


?>
    </div>
</div>

