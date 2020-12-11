<?php include"inc/header.php";?>
<?php include"inc/sidebar.php";?>

<?php
     if(isset($_GET['delpageid'])){
			$delid=$_GET['delpageid'];	
            $query="delete from page where id='$delid'";
			$delpage=$db->delete($query);
			if ($delpage) {
                	 
                echo"<span style='color:green;font-size:18px;'>Page Deleted successfully</span>";
                echo "<script> window.location='index.php' </script>";
                
              }else{

                    echo"<span style='color:red;font-size:18px;'>Page not Deleted</span>";
                    echo "<script> window.location='page.php' </script>";
	
				}
				 
					
			}

	  
 
 ?>