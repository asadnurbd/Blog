<?php include"../lib/Session.php";
 Session::checkLogin();
?>
<?php include"../config/config.php";?>
<?php include"../lib/Database.php";?>
<?php include"../helpers/Formate.php";?>



<?php

$db= new Database();
$fm= new Formate();




?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">

	<?php 
	 if ($_SERVER["REQUEST_METHOD"]=='POST') {
		 $username=$fm->Validation($_POST['username']);
		 $password=$fm->Validation(md5($_POST['password']));
		 $username=mysqli_real_escape_string($db->link,$username);
		 $password=mysqli_real_escape_string($db->link,$password);


		$query="select*from user where name ='$username' and password ='$password'";
        
		 $result=$db->select($query);
		 if ($result==true) {
			 $value=mysqli_fetch_array($result);
			 $row=mysqli_num_rows($result);
			 if ($row>0) {
			  Session::set("login",true);
			  Session::set("username",$value['username']);
			  Session::set("userid",$value['id']);
			  header("Location:index.php");
			  
			  
				 # code...
			 }else{
         echo"<span style='color:red;font-size:10px;'>Not mach found </span>";
                 
			 }
			 
			 # code...
		 }else{

         echo"<span style='color:red;font-size:10px;'>User name and password not mach</span>";
		 }
	 }
	
	?>
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>