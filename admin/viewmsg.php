<?php include"inc/header.php";?>
<?php include"inc/sidebar.php";?>


    <div class="grid_10">


<?php
     if(isset($_GET['msgid'])){
			$contactid=$_GET['msgid'];
			$query="delete from category where id='$contactid'";
			$showcontact=$db->delete($query);
			if ($showcontact) {
				echo"<span style='color:green;font-size:18px;'>Contact Show successfully</span>";
					
			}else{

				echo"<span style='color:red;font-size:18px;'> Contact does not Show successfully</span>";

			}

	 }

           
     if ($_SERVER["REQUEST_METHOD"]=='POST') {

        echo "<script> window.location='index.php' </script>";
     }
 ?>
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block"> 
                <?php 
					 $query="select *from contact where id='$contactid' ";
					 $contact=$db->select($query);
					 if ($contact) 
					 {    
					      while($result=mysqli_fetch_array($contact)){
                            
					 
                          ?>
                
           
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly   value="<?php echo $result['firstname'].'  '.$result['lastname'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly  value="<?php echo $result['email']?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text"  readonly value="<?php echo $fm->formatDate($result['date'])?>" class="medium" />
                            </td>
                        </tr>
                     
                    
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea readonly  class="tinymce">
                                <?php echo $result['body']?>
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    </form>

                 <?php }}?>
                
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