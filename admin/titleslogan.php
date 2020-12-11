<?php include"inc/header.php";?>
<?php include"inc/sidebar.php";?>

<style>

    .left_side{
        float: left; width:70%;
    }
    .right_side{
        float:left; width:30%;
    }
    .right_side img{
        width:80px ;
        height: 60px;
    }
</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
        <?php       
                if ($_SERVER["REQUEST_METHOD"]=='POST') {
                    
                    $title=mysqli_real_escape_string($db->link,$_POST['title']);
                    $slogan=mysqli_real_escape_string($db->link,$_POST['slogan']);
                  

                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['logo']['name'];
                    $file_size = $_FILES['logo']['size'];
                    $file_temp = $_FILES['logo']['tmp_name'];
                
                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = 'logo'.'.'.$file_ext;
                    $uploaded_image = "../images/".$unique_image;
                    if ($title==null ||$slogan==null  ) 
                    {
                    echo "<span class='error'>Please Select field!</span>";
                    }
                         
                         if (!empty($file_name)) {
                            
                        
                                if ($file_size >1048567) {
                                    echo "<span class='error'>Image Size should be less then 1MB!
                                    </span>";
                                } elseif (in_array($file_ext, $permited) === false) {
                                    echo "<span class='error'>You can upload only:-"
                                    .implode(', ', $permited)."</span>";
                                } else{
                                
                                // $query = "INSERT INTO post(cat,title,body,image,author,tags) VALUES('$cat','$title','$body','$uploaded_image','$author','$tags')";
                                move_uploaded_file($file_temp, $uploaded_image);
                                $query="update title_slogan set title='$title', slogan='$slogan',logo='$uploaded_image' where id =1";
                               
                                $update_rows = $db->update($query);
                                if ($update_rows) {
                                    echo "<span class='success'>Image Inserted Successfully.
                                    </span>";
                                    echo "<script> window.location='titleslogan.php' </script>";
                                }else {
                                    echo "<span class='error'>Image Not Inserted !</span>";
                                }
                                    
                                }
    
                         }else{
                                    move_uploaded_file($file_temp, $uploaded_image);
                                    $query="update title_slogan set title='$title', slogan='$slogan',logo='$uploaded_image' where id =1";
                                    
                                    $update_rows = $db->update($query);
                                    if ($update_rows) {
                                        echo "<span class='success'>Image Inserted Successfully.
                                        </span>";
                                        echo "<script> window.location='itleslogan.php' </script>";
                                    }else {
                                        echo "<span class='error'>Image Not Inserted !</span>";
                                    }
                                
                            }
    
                              
    
                     }
                    
         ?>









             <?php
               $query="select * from title_slogan where id=1";
               $title=$db->select($query);
               while($result=mysqli_fetch_array($title)){

               
             ?>   
                <div class="block sloginblock"> 
            <div class="left_side"> 
                    
                 <form action="" method="post" enctype="multipart/form-data" >
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title'];?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text"  value="<?php echo $result['slogan'];?>" name="slogan" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Website Logo </label>
                            </td>
                            <td>
                                <input type="file" name="logo"/>
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    </div>

                    <div class="right_side">
                        <tr>
                            
                            <img src="<?php echo $result['logo'];?>" alt="No image!!">
                        </tr>
                    </div>
                </div>


                <?php }?>
            </div>
        </div>
        <?php include"inc/footer.php";?>
