<?php
session_start();
require_once("../config/connect.php");
if(!isset($_SESSION['email'])&& empty($_SESSION['email'])){
	header("location:login.php");
}
if(isset($_GET['id'])&& !empty($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM category WHERE id='$id' ";
    $result=mysqli_query($con,$sql);
    if($result){
          header("location:categories.php ");
          echo "delete";
    }
}else{
    header("location:categories.php ");
   
}










?>