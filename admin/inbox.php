<?php include"inc/header.php";?>
<?php include"inc/sidebar.php";?>



        <div class="grid_10">
		<div class="box round first grid">
				<h2> Message</h2>
				
				<?php
				   if (isset($_GET['seenid'])) {
					   $id=$_GET['seenid'];
					   $query="update  contact set status='1' where id='$id'";
					   $update_row=$db->update($query);
					   if ($update_row) {
						 echo"<span style='color:green;font-size:18px;'>Message seen successfully</span>";
						 
							  
					   }else{

						 echo"<span style='color:red;font-size:18px;'> Message seen successfully </span>";

					   }
				   }
				
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

			
					 
					<?php 
					 $query="select *from contact where status='0' order by id desc ";
					 $contact=$db->select($query);
					 if ($contact) 
					 {    $i=0;
					      while($result=mysqli_fetch_array($contact)){
                            $i++;
					 
					?>
						<tr class="even gradeC">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].'  '.$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->shorter( $result['body'],150);?> </td>
							<td><?php echo $fm->formatDate($result['date']);?></td>

							<td>
								<a href="viewmsg.php?msgid=<?php echo $result['id'];?>"> View</a> ||
								<a href="replymsg.php?msgid=<?php echo $result['id'];?>">Reply</a> ||
								<a onclick="return confirm('Are you sure to Move message?');" href="?seenid=<?php echo $result['id'];?>"> Seen</a>
						
						
						
						     </td>
						</tr>

					<?php }}?>	
						
					</tbody>
				</table>
               </div>
            
		</div>
		
            <div class="box round first grid">
                <h2>Seen Message
				<?php
							if(isset($_GET['delid'])){
								$delid=$_GET['delid'];
								$query="delete from contact where id='$delid'";
								$delete=$db->delete($query);
								if ($delete) {
									echo"<span style='color:green;font-size:18px;'>Message Deleted successfully</span>";
										
								}else{

									echo"<span style='color:red;font-size:18px;'>Message not Deleted</span>";

								}

							}

	 
					 ?>
				</h2>
                <div class="block">        
				<table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php 
					 $query="select *from contact where status='1' order by id desc ";
					 $contact=$db->select($query);
					 if ($contact) 
					 {    $i=0;
					      while($result=mysqli_fetch_array($contact)){
                            $i++;
					 
					?>
						<tr class="even gradeC">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].'  '.$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->shorter( $result['body'],150);?> </td>
							<td><?php echo $fm->formatDate($result['date']);?></td>

							<td>
								<a onclick="return confirm('Are you sure to Delete?');" href="?delid=<?php echo $result['id'];?>">Delete</a> 
						
						     </td>
						</tr>

					<?php }}?>	
						
					</tbody>
				</table>
               </div>
			</div>
		</div>	


			
<script type="text/javascript">


</script>
		<?php include"inc/footer.php";?>
