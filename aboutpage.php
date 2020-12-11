<?php include"inc/header.php";?>

<?php 
  if (!isset($_GET['pageid']) || $_GET['pageid']==null) {
	//   echo "<script> window.location='catlist.php' </script>";
	header('location:404.php');
  }else{
      $pageid=$_GET['pageid'];
  }


?>


	<div class="contentsection contemplete clear">

	<?php
			
			 $query="select * from page where id=$pageid";
			 $pageinfo=$db->select($query);
			 if($pageinfo){
			 
			  while($page=$pageinfo->fetch_assoc()){
	?>


		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $page['name'];?></h2>
				<p><?php echo $page['body'];?></p>
	
			
	</div>

		</div>

		<?php
			  }}else{

				header("location:404.php");
			  }
		?>
		
		<?php include"inc/sidebar.php";?>
	</div>

	<?php include"inc/footer.php";?>

	