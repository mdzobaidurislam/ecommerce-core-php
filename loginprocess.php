

<?php
session_start();
require_once("config/connect.php");
if(isset($_POST)&&!empty($_POST)){
	$email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
	$password=$_POST['password'];
	$sql="SELECT * FROM user WHERE email='$email'";
	$result=mysqli_query($con,$sql) or die(mysqli_error($con));
	$data=mysqli_fetch_assoc($result);
	$count=mysqli_num_rows($result);
	
		if ($count==1) {
			if(password_verify($password, $data['password'])){
			// echo "user exite,create session";
			$_SESSION['customer']=$email;
			$_SESSION['customerid']=$data['id'];
			header("location:checkout.php");
		}else{
			//$fmsg="Invalid Login Credentials";
			header("location:login.php?massages=1");
		}
	}else{
			//$fmsg="Invalid Login Credentials";
			header("location:login.php?massages=1");
		}
	

}




?>