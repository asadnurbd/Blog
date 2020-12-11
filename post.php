<?php include"inc/header.php";?>

<?php 
 if (!isset($_GET['id'])||$_GET['id']==NULL) {
	header("Location:404.php");
 } else {
	 $postid=$_GET['id'];
 }
 

?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			 
			<?php
			
			 $query="select * from post where id=$postid";
			 $postinfo=$db->select($query);
			 if($postinfo){
			 
			  while($post=$postinfo->fetch_assoc()){
			?>

				<h2><?php echo $post['title'];?></h2>
				<h4><?php echo $fm->formatDate($post['date']); ?>, By<a href="#"><?php echo $post['author'];?></a></h4>
				<img src="images/<?php echo $post['image']; ?>" alt="MyImage"/>
				
				<?php echo $post['body']; ?>

			  

			 	
				<div class="relatedpost clear">
					<h2>Related articles</h2>

					<?php
					 $cat=$post['id'];
					 $query="select * from post where cat=$cat order by rand() limit 2";
					 $catid=$db->select($query);
					if($catid){
					
					while($catinfo=$catid->fetch_assoc()){
					
					?>
					<a href="post.php?id=<?php echo $catinfo['id']; ?>"><img src="images/<?php echo $catinfo['image']; ?>" alt="post image"/></a>
					<?php }}else{ echo"No img find";}?>
				</div>

				<?php  }} else{header("Location:404.php");}?>
	</div>

		</div>
		<?php include"inc/sidebar.php";?>
	</div>

	<?php include"inc/footer.php";?>