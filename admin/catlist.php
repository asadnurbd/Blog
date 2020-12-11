<?php include"inc/header.php";?>
<?php include"inc/sidebar.php";?>
        <div class="grid_10">
            <div class="box round first grid">
				<h2>Category List</h2>
				

   <?php
     if(isset($_GET['delcatid'])){
			$delid=$_GET['delcatid'];
			$query="delete from category where id='$delid'";
			$delete=$db->delete($query);
			if ($delete) {
				echo"<span style='color:green;font-size:18px;'>Category Deleted successfully</span>";
					
			}else{

				echo"<span style='color:red;font-size:18px;'>Category not Deleted</span>";

			}

	 }

	 
 
 ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php 
					 $query="select *from category order by id desc ";
					 $category=$db->select($query);
					 if ($category) 
					 {    $i=0;
					      while($result=mysqli_fetch_array($category)){
                            $i++;
					 
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><a href="editcat.php?catid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete?');" 
							href="?delcatid=<?php echo $result['id'];?>">Delete</a></td>
						</tr>

					<?php }}?>
						
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


