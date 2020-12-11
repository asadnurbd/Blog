<?php include"inc/header.php";?>
<?php include"inc/sidebar.php";?>



<?php 
  if (!isset($_GET['postid']) || $_GET['postid']==null) {
      echo "<script> window.location='postlist.php' </script>";
  }else{
      $postid=$_GET['postid'];
  }


?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block"> 
         <?php       
                if ($_SERVER["REQUEST_METHOD"]=='POST') {
                    
                    $title=mysqli_real_escape_string($db->link,$_POST['title']);
                    $cat=mysqli_real_escape_string($db->link,$_POST['cat']);
                    $tags=mysqli_real_escape_string($db->link,$_POST['tags']);
                    $author=mysqli_real_escape_string($db->link,$_POST['author']);
                    $body=mysqli_real_escape_string($db->link,$_POST['body']);
                   

                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];
                
                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "../images/".$unique_image;
                    if ($title==null ||$cat==null ||$tags==null ||$author==null ||$body==null ) 
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
                                $query="update post set cat='$cat',title='$title', body='$body',image='$uploaded_image',author='$author',tags='$tags' where id ='$postid'";
                               
                                $update_rows = $db->update($query);
                                if ($update_rows) {
                                    echo "<span class='success'>Image Inserted Successfully.
                                    </span>";
                                    echo "<script> window.location='postlist.php' </script>";
                                }else {
                                    echo "<span class='error'>Image Not Inserted !</span>";
                                }
                                    
                                }
    
                         }else{
                                    move_uploaded_file($file_temp, $uploaded_image);
                                    $query="update post set cat='$cat',title='$title', body='$body',author='$author',tags='$tags' where id ='$postid'";
                                    
                                    $update_rows = $db->update($query);
                                    if ($update_rows) {
                                        echo "<span class='success'>Image Inserted Successfully.
                                        </span>";
                                        echo "<script> window.location='postlist.php' </script>";
                                    }else {
                                        echo "<span class='error'>Image Not Inserted !</span>";
                                    }
                                
                            }
    
                              
    
                     }
                    
            ?>

                    




<?php

 $query="select * from  post where id='$postid' order by id desc ";
 $postinfo=$db->select($query);
  while($postresult=mysqli_fetch_array($postinfo)){
?>
                 <form action="#" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $postresult['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
       
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Category</option>
                 
            <?php
                $query="select *from category ";
                $cat=$db->select($query);
                if($cat){
                    while($result=mysqli_fetch_array($cat)){


                
                
                ?>                    
                                    <option 
                                    <?php
                                    
                                     if ($postresult['cat']==$result['id']) {
                                    ?>
                                    Selected="selected"
                                    
                                    <?php  }?>
                                    value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>

             <?php }}?>                
                                </select>
                            </td>
                        </tr>
        
                    
                       
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $postresult['image'];?>" alt="No image" height="40px" width="40px">
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        

                        <tr>
                            <td>
                                <label>Tag</label>
                            </td>
                            <td>
                                <input type="text" name="tags"  value="<?php echo $postresult['tags'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $postresult['author'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body" >
                                <?php echo $postresult['body']; ?>
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php }?>
                </div>
            </div>
        </div>
   


 <!-- Load TinyMCE -->
 <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>

<?php include"inc/footer.php";?>