<?php
session_start();
require_once("../config/connect.php");
if(!isset($_SESSION['email'])&& empty($_SESSION['email'])){
	header("location:login.php");
}

if(isset($_GET['id'])&& !empty($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT thumbnail FROM products WHERE id='$id' ";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $data=$row['thumbnail'];
    if(!empty($data)){
       if(unlink('uploads/'.$data)){
            $delsql="UPDATE products SET thumbnail='' WHERE id='$id' ";
            if(mysqli_query($con,$delsql)){
                header("location:editproduct.php?id={$id}");
            }
        }else{
            $delsql="UPDATE products SET thumbnail='' WHERE id='$id' ";
            if(mysqli_query($con,$delsql)){
                header("location:editproduct.php?id={$id}");
            }
        }

    }

}
























?>