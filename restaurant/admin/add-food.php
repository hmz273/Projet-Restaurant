<?php include('patials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-full">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title..">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description.."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" placeholder="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

               
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="feature" value="yes"> Yes 
                        <input type="radio" name="feature" value="no"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="yes"> Yes 
                        <input type="radio" name="active" value="no"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="sbm">
                    </td>
                </tr>

            </table>

        </form>

        
        <?php 

            //CHeck whether the button is clicked or not
            if(isset($_POST['submit']))
            {
                //Add the Food in Database
                //echo "Clicked";
                
                //1. Get the DAta from Form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $image= $_POST['image_name'];
                $feature= $_POST['feature'];
                $active= $_POST['active'];

                //Check whether radion button for featured and active are checked or not
                if(isset($_POST['feature']))
                {
                    $featured = $_POST['feature'];
                }
                // else
                // {
                //     $featured = "no"; //SEtting the Default Value
                // }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                // else
                // {
                //     // $active = "no"; //Setting Default Value
                // }

                //2. Upload the Image if selected
                //Check whether the select image is clicked or not and upload the image only if the image is selected
                if(isset($_FILES['image']['name']))
                {
                    //Get the details of the selected image
                    $image_name = $_FILES['image']['name'];

                    //Check Whether the Image is Selected or not and upload image only if selected
                    if($image_name!="")
                    {
                        // Image is SElected
                        //A. REnamge the Image
                        //Get the extension of selected image (jpg, png, gif, etc.)  vijay-thapa jpg
                        $ext = end(explode('.', $image_name));

                        // Create New Name for Image
                        $image_name = "Food-Name-".rand(0000,9999).".".$ext; //New Image Name May Be "Food-Name-657.jpg"

                        //B. Upload the Image
                        //Get the Src Path and DEstinaton path

                        // Source path is the current location of the image
                        $src = $_FILES['image']['tmp_name'];

                        //Destination Path for the image to be uploaded
                        $dst = "../assets/img/food/".$image_name;

                        //Finally Uppload the food image
                        $upload = move_uploaded_file($src, $dst);

                        //check whether image uploaded of not
                        if($upload==false)
                        {
                            //Failed to Upload the image
                            //REdirect to Add Food Page with Error Message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                            //STop the process
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = ""; //SEtting DEfault Value as blank
                }

                //3. Insert Into Database

                //Create a SQL Query to Save or Add food
                // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
                $sql = "INSERT INTO food SET
                title='$title',
                description='$description',
                price='$price',
                image='$image_name',
                feature='$feature',
                active='$active'
                ";
               
                
                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //CHeck whether data inserted or not
                //4. Redirect with MEssage to Manage Food page
                if($res==true)
                {
                    //Data inserted Successfullly
                    $_SESSION['add'] = "<div class='update'>Food Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    //FAiled to Insert Data
                    $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }

                
            }

        ?>


    </div>
</div>

