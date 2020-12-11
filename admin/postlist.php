<?php include"inc/header.php";?>
<?php include"inc/sidebar.php";?>


<?php
     if(isset($_GET['delpostid'])){
			$delid=$_GET['delpostid'];
			
			$query="select* from post where id='$delid'";
			$imagedel=$db->select($query);
			if ($imagedel) {
                 while($delimg=mysqli_fetch_array($imagedel)){
					 $dellink=$delimg['image'];
					 unlink($dellink);


				 }
				 $query2="delete from post where id='$delid'";
				 $deldata=$db->delete($query2);
				 if ($deldata) {
					 
				echo"<span style='color:green;font-size:18px;'>Category Deleted successfully</span>";
				 }else{

					echo"<span style='color:red;font-size:18px;'>Category not Deleted</span>";
	
				}
				 
					
			}

	 }

	 
 
 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">Serial No.</th>
							<th width="15%">Post Title</th>
							<th width="20%">Description</th>
							<th width="10%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="10%">Date</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>

					<?php
					  $query="select post.*,category.name from post inner join category on post.cat=category.id order by post.title desc";
					  $post=$db->select($query);
					  if ($post) {
						  $i=0;
						while($result=mysqli_fetch_array($post)){
                           $i++;
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['title']?></td>
							<td><?php echo $fm->shorter($result['body'],'50')?></td>
							<td><?php echo $result['name']?></td>
							<td> <img src="<?php echo $result['image']?>" alt="No image found" height="40px" width="35px"></td>
							<td><?php echo $result['author']?></td>
							<td><?php echo $result['tags']?></td>
							<td class="center"> <?php echo $fm->formatDate($result['date'])?></td>
							<td><a href="editpost.php?postid=<?php echo $result['id'];?>">Edit</a> || 
							<a onclick="return confirm('Are you sure to Delete?');" 
					 href="?delpostid=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
				  <?php 	}}?>
					</tbody>
				</table>
	
               </div>
            </div>
		</div>
		
<script type="text/javascript">

$(document).ready(function () {
setupLeftMenu();

$('.datatable').dataTable();
setSidebarHeight();


});
</script>
		<?php include"inc/footer.php";?>