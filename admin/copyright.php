<?php include"inc/header.php";?>
<?php include"inc/sidebar.php";?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>

                <?php       
                if ($_SERVER["REQUEST_METHOD"]=='POST') {
                    
                    $note=mysqli_real_escape_string($db->link,$_POST['note']);
                   
                    if ($note==null  ) 
                    {
                    echo "<span class='error'>Please Select field!</span>";
                    }else{
                        $query="update footer set note='$note' where id ='1'";
                                    
                        $update_rows = $db->update($query);
                        if ($update_rows) {
                            echo "<span class='success'>Image Inserted Successfully.
                            </span>";
                            echo "<script> window.location='copyright.php' </script>";
                        }else {
                            echo "<span class='error'>Image Not Inserted !</span>";
                        }


                    }
                      
                  
                }

               ?>

                <div class="block copyblock"> 

        <?php
        $query="select * from footer where id=1";
        $socialinfo=$db->select($query);
        while($result=mysqli_fetch_array($socialinfo)){           
        ?>    
                 <form action="#" method="post"  enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="note" value="<?php echo $result['note'];?>"  class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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
