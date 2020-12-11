<?php include"inc/header.php";?>
<?php include"inc/sidebar.php";?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>

                <?php       
                if ($_SERVER["REQUEST_METHOD"]=='POST') {
                    
                    $fb=mysqli_real_escape_string($db->link,$_POST['fb']);
                    $tw=mysqli_real_escape_string($db->link,$_POST['tw']);
                    $ln=mysqli_real_escape_string($db->link,$_POST['ln']);
                    $gg=mysqli_real_escape_string($db->link,$_POST['gg']);

                    if ($fb==null ||$tw==null ||$ln==null ||$gg==null ) 
                    {
                    echo "<span class='error'>Please Select field!</span>";
                    }else{
                        $query="update social set fb='$fb',tw='$tw',ln='$ln',gg='$gg' where id ='1'";
                                    
                        $update_rows = $db->update($query);
                        if ($update_rows) {
                            echo "<span class='success'>Image Inserted Successfully.
                            </span>";
                            echo "<script> window.location='social.php' </script>";
                        }else {
                            echo "<span class='error'>Image Not Inserted !</span>";
                        }


                    }
                      
                  
                }

               ?>


                <div class="block"> 
                    
                
            <?php
               $query="select * from social where id=1";
               $socialinfo=$db->select($query);
               while($result=mysqli_fetch_array($socialinfo)){

               
             ?> 

                 <form action="#"  method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php echo $result['fb'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" value="<?php echo $result['tw'];?>"  class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value="<?php echo $result['ln'];?>"  class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gg" value="<?php echo $result['gg'];?>"  class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>

               <?php }?>    
                </div>
            </div>
        </div>
        <?php include"inc/footer.php";?>
