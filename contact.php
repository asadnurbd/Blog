<?php include"inc/header.php";?>



	<div class="contentsection contemplete clear">


	
	<?php 
	 if ($_SERVER["REQUEST_METHOD"]=='POST') {
		 $firstname=$fm->Validation($_POST['firstname']);
		 $lastname=$fm->Validation($_POST['lastname']);
		 $email=$fm->Validation($_POST['email']);
		 $body=$fm->Validation($_POST['body']);
		 $confirstname=mysqli_real_escape_string($db->link,$firstname);
		 $conlastname=mysqli_real_escape_string($db->link,$lastname);
		 $conemail=mysqli_real_escape_string($db->link,$email);
		 $conbody=mysqli_real_escape_string($db->link,$body);

		 $error="";

		 if (empty($confirstname)) {
			$error= "First name must not Empty !!";
		 }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$confirstname)){
			
			  $error = "Only letters and white space allowed";
			
		 }elseif(empty($conlastname)){
			$error= "Last name must not Empty !!";
             
		 }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$conlastname)) {
			
			
				$error= "Only letters and white space allowed";
			
		 }elseif(empty($conemail)){
			$error="Email is required";;
		 }elseif(!filter_var($conemail, FILTER_VALIDATE_EMAIL)) {
		
				$error = "Invalid email format";
			
		 }elseif(empty($conbody)){
			$error= "Body must not Empty";       
		 }
		 else{
			 
			$query="insert into contact(firstname,lastname,email,body) values('$confirstname','$conlastname','$conemail','$conbody')";
			$catinsert=$db->insert($query);
			if ($catinsert) {
			  echo"<span style='color:green;font-size:18px;'>Comment inserted successfully</span>";
				   
			}else{

			  echo"<span style='color:red;font-size:18px;'>Comment not inserted </span>";

			}
		 }
	 }
 ?>
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>


				<center style="color:red;font-size:20px; margin-left:30%;   margin-bottom: 25px; border:1px solid green;width:40%;">
				<?php if(isset($error)){
					echo $error;}
				?></center>


			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
		<?php include"inc/sidebar.php";?>
	</div>

	<?php include"inc/footer.php";?>