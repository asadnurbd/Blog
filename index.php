
<?php include"inc/header.php";?>
<?php include"inc/slider.php";?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">


		<!-- pagination start -->
		<?php
		 $per_page=4;
		 if(isset($_GET['page'])){
			 $page=$_GET['page'];


		 }else{
			 $page=1;
		 }

		 $start_form=($page-1)*$per_page;
		
		
		?>
		<!-- pagination end -->



		<?php 
		 $query="select * from post limit $start_form,$per_page";
		 $post=$db->select($query);
		 if($post){

			while($result=$post->fetch_assoc()){


			
		?>

			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title'];?></a></h2>
				<h4><?php echo $fm->formatDate($result['date']); ?> <a href="#"><?php echo $result['author'];?></a></h4>
				 <a href="#"><img src="images/<?php echo $result['image']; ?>" alt="post image"/></a>
				<p>
  
				<?php echo $fm->shorter($result['body'],200);?>
				</p>
				<div class="readmore clear">
					<a  href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
			</div>


			<?php }?>

			<!-- pagination start  -->


			<?php 
			
			$query="select * from post";
			$result=$db->select($query);
			$totalrow=mysqli_num_rows($result);
			$totalpage=ceil($totalrow/$per_page);
			
			echo "<span><a href='index.php?page=1'>".'First page'."</a>";
			for ($i=1;$i<$totalpage;$i++){
				echo"<a href='index.php?page=".$i."'>".$i."</a>" ;
			}
		    
		     echo "<a href='index.php?page=$totalpage'>".'Last page'."</a> </span>"?>
			
			





		 <?php } else{ header("Location:404.php");}?>
		 
			
			

		</div>
	
	
       
         <?php include"inc/sidebar.php";?>
		
	</div>

	<?php include"inc/footer.php";?>