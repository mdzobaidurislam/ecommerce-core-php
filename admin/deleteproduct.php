<?php
session_start();
require_once("../config/connect.php");
if(!isset($_SESSION['email'])&& empty($_SESSION['email'])){
	header("location:login.php");
}

if(isset($_GET['id'])&& !empty($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM products WHERE id='$id' ";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $data=$row['thumbnail'];
    if(!empty($data)){
        $del=unlink('uploads/'.$data);
        if($del){
                $delsql="DELETE FROM products WHERE id='$id' ";
                if(mysqli_query($con,$delsql)){
                    header("location:products.php");
                }
            }else{
                $delsql="DELETE FROM products WHERE id='$id' ";
                if(mysqli_query($con,$delsql)){
                    header("location:products.php");
                } 
            }

    }else {
        $delsql="DELETE FROM products WHERE id='$id' ";
            if(mysqli_query($con,$delsql)){
                header("location:products.php");
            }
    }

}else {
    header("location:products.php");
}























?>