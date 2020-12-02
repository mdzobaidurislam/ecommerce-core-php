<?php
session_start();
require_once("../config/connect.php");
if(!isset($_SESSION['email'])&& empty($_SESSION['email'])){
	header("location:login.php");
}
if(isset($_GET['id'])&& !empty($_GET['id'])){
    $getid=$_GET['id'];
}else{
    header("location:categories.php");
}
if(isset($_POST['submit'])){
	
	$cateid=mysqli_real_escape_string($con,$_POST['id']);
	$categoryname=mysqli_real_escape_string($con,$_POST['categoryname']);
	if(!empty($categoryname)){
		if(strlen($categoryname)>3 && strlen($categoryname)<21){
			$sql="UPDATE category SET categoryname='$categoryname' WHERE id='$cateid'";
			$res=mysqli_query($con,$sql);
			if($res){
				$smsg="Update Category";
			}else{
				
				$fmsg="Not Update";
			}
		}else{
			$fmsg= "At last 3-21 word";
		}
	}else{
		$fmsg= "Required";
	}
	
}
?>

<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>


	
	<div class="close-btn fa fa-times"></div>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
                <?php if(isset($smsg)){?>
                    <p class=" alert alert-success" role="alert" ><?php echo $smsg; ?></p>
               <?php }?>
               <?php if(isset($fmsg)){?>
                    <p class=" alert alert-danger" role="alert" ><?php echo $fmsg; ?></p>
               <?php }?>
					<form action="" method="post" >
						<div class="form-group">
							<label for="categoryname">Category Name:</label>
                            <?php
                                $sql="SELECT * FROM category WHERE id='$getid'";
                                $result=mysqli_query($con,$sql);
                                $data=mysqli_fetch_array($result);
                                        $categoryname=$data['categoryname'];
                                 ?>
                                 <input type="hidden" name="id" value="<?php echo $getid; ?>" >
							<input type="text" name="categoryname" class="form-control" id="categoryname" value="<?php echo $categoryname; ?>" >
                           
                             <br>
							<button type="submit" name="submit" class="btn btn-primary mt-2" >Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	
	<div class="clearfix space70"></div>

	<?php require_once("inc/footer.php"); ?>