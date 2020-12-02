<?php
session_start();
require_once("../config/connect.php");
if(!isset($_SESSION['email'])&& empty($_SESSION['email'])){
	header("location:login.php");
}
if(isset($_POST['submit'])){
	
	$categoryname=mysqli_real_escape_string($con,$_POST['categoryname']);
	if(!empty($categoryname)){
		if(strlen($categoryname)>2 && strlen($categoryname)<21){
			$sql="INSERT INTO category (categoryname) VALUES ('$categoryname')";
			$res=mysqli_query($con,$sql);
			if($res){
				
				$smsg="Added Category";
			}else{
				
				$fmsg="Not Added";
			}
		}else{
			$smsg= "At last 2-21 word";
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
							<input type="text" name="categoryname" class="form-control" id="categoryname" placeholder="Category name" > <br>
							<button type="submit" name="submit" class="btn btn-primary mt-2" >Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	
	<div class="clearfix space70"></div>

	<?php require_once("inc/footer.php"); ?>