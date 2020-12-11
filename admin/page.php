<?php include"inc/header.php";?>
<?php include"inc/sidebar.php";?>

<style>

.delbutton{
    border: 1px solid #ddd;
    color: #444;
    cursor: pointer;
    font-size:10px;
    padding: 2px 10px;
    font-weight:normal;
    background:#CCC;
    }
</style>


<?php 
  if (!isset($_GET['pageid']) || $_GET['pageid']==null) {
      echo "<script> window.location='catlist.php' </script>";
  }else{
      $pageid=$_GET['pageid'];
  }


?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update New Page</h2>
                <div class="block"> 
         <?php       
                if ($_SERVER["REQUEST_METHOD"]=='POST') {
                    // $username=$fm->Validation($_POST['username']);
                    // $password=$fm->Validation(md5($_POST['password']));
                    $name=mysqli_real_escape_string($db->link,$_POST['name']);
                    $body=mysqli_real_escape_string($db->link,$_POST['body']);
                   



                    if ($name==null ||$body==null ) {
                        echo "<span class='error'>Please Select field !</span>";
                     } else{
                       
                        $query="update  page set name='$name' ,body='$body' where id='$pageid'";
                        $update_row=$db->update($query);
                       if ($update_row ){
                        echo "<span class='success'>page Updated Successfully.
                        </span>";
                       }else {
                        echo "<span class='error'>page Not Updated  !</span>";
                       }
                        
                       }
                  }
        ?>





           <?php
               $query="select * from page where id='$pageid'";
               $title=$db->select($query);
               while($result=mysqli_fetch_array($title)){

               
             ?>   

                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']?>" class="medium" />
                            </td>
                        </tr>
                     
                    
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">

                                <?php echo $result['body']?>
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <span class="delbutton"> <a onclick="return confirm('Are you sure to Delete?');" href="delpage.php?delpageid=<?php echo $result['id'];?>">Delete</a></span>
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