<?php 
ob_start();
session_start();
 require_once("config/connect.php");
 require_once("inc/header.php"); 
 require_once("inc/nav.php");
 $uid=$_SESSION['customerid'];
if(!isset($_SESSION['customer'])&& empty($_SESSION['customer '])){
	header("location:login.php");
}
if(isset($_GET['id'])&&!empty($_GET['id'])){
	$pid=$_GET['id'];
	 $wishListSql="INSERT INTO wishlist (pid,uid) VALUES('$pid','$uid') ";
	 $wishListQuery=mysqli_query($con,$wishListSql) or die(mysqli_error($con));
	 if ($wishListQuery) {
	 	header('location:wishlist.php');
	 }
}else{
	header('location:wishlist.php');
}