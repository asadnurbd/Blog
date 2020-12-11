<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>

					<?php
					 
					 $query="select * from category";
					 $cat=$db->select($query);
					if($cat){
					
					while($catinfo=$cat->fetch_assoc()){
					
					?>
						<li><a href="posts.php?category=<?php echo $catinfo['id'];?>"><?php echo $catinfo['name']; ?></a></li>
					<?php }}else{echo"NO category found";}?>						
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
                
        <?php 
		 $query="select * from post order by rand() limit 4 ";
		 $post=$db->select($query);
		 if($post){

			while($result=$post->fetch_assoc()){


			
        ?>

					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h3>
						<a href="post.php?id=<?php echo $result['id'];?>"><img src="images/<?php echo $result['image']; ?>" alt="post images"/></a>
						<?php echo $fm->shorter($result['body'],100);?>
					</div>
					
		<?php }} else{ header("Location:404.php");}?>
	
			</div>
			
		</div>