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

           
     
 ?>

 <?php
 
 if ($_SERVER["REQUEST_METHOD"]=='POST') {
    $to=$fm->Validation($_POST['ToEmail']);
    $form=$fm->Validation($_POST['FormEmail']);
    $subject=$fm->Validation($_POST['subject']);
    $message=$fm->Validation($_POST['message']);

   $sendmail=mail($to,$form,$subject,$message);


   if ($sendmail) {
       echo "Email Successfully send";
   }else{
       echo "Email Successfully not send";

   }

   
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
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" readonly name="ToEmail" value="<?php echo $result['email']?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Form</label>
                            </td>
                            <td>
                                <input type="text"  name="FormEmail" class="medium" placeholder="Please Enter your Email .."/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="Please Enter your Subject .." class="medium" />
                            </td>
                        </tr>
                     
                    
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea name="message" class="tinymce">
                                
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