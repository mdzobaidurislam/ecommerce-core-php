

<?php
session_start();
require_once("config/connect.php");
if(isset($_POST)&&!empty($_POST)){
	//$email=mysqli_real_escape_string($con,$_POST['email']);

	$email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
	$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
	//$sql="SELECT * FROM user WHERE email='$email' AND password='$password'";
	$sql="INSERT INTO user (email,password) VALUES('$email','$password')";
	$result=mysqli_query($con,$sql) or die(mysqli_error($con));
	//$count=mysqli_num_rows($result);
	if($result){
		// echo "user exite,create session";
		$_SESSION['customer']=$email;
		 $_SESSION['customerid']=mysqli_insert_id($con);
		header("location:checkout.php");
	}else{
		//$fmsg="Invalid Login Credentials";
		header("location:login.php?massages=2");
	}

}




?>