<?php
session_start();
require_once("../config/connect.php");
if(!isset($_SESSION['email'])&& empty($_SESSION['email'])){
	header("location:login.php");
}
if(isset($_POST['submit'])){
	
	$productname=mysqli_real_escape_string($con,$_POST['name']);
	$description=mysqli_real_escape_string($con,$_POST['description']);
	$productcategory=mysqli_real_escape_string($con,$_POST['productcategory']);
	$price=mysqli_real_escape_string($con,$_POST['price']);
	if(isset($_FILES)&&!empty($_FILES)){
		$productimage=$_FILES['productimage']['name'];
		$type=$_FILES['productimage']['type'];
		$size=$_FILES['productimage']['size'];
		$tmp_name=$_FILES['productimage']['tmp_name'];
		$max_size=10000000;
		// $extention=substr($imagename,strpos($imagename,'.')+1);
		$explode=explode('.',$_FILES['productimage']['name']);
		$extention=end($explode);
		//$autoImagename=uniqid().$productimage;
		if(isset($productimage)&&!empty($productimage)){
			if( $extention=='jpg' || $extention=='jpeg' || $extention=='png' && $size<=$max_size){
				$location='uploads/';
				
				if(move_uploaded_file($tmp_name,$location.$productimage)){
					$sql="INSERT INTO products (name,catid,price,thumbnail,description) VALUES ('$productname','$productcategory','$price','$productimage','$description')";
						$res=mysqli_query($con,$sql);
						if($res){
							header("location:products.php");
						}else{
							
							$fmsg="Not Added product";
						}

				}else{
					$fmsg="Uploded Failed";
				}
					
			}else{
				$fmsg="Jpeg file are allowed and should be less than 1MB";
			}
				
		}else{
			$fmsg="Please select  a file";
		}
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

					<form action="" method="post" class="col-md-12 " enctype="multipart/form-data" >
						<div class="form-group">
							<label for="productname">Product Name:</label>
							<input type="text" name="name" class="form-control" id="productname" placeholder="Product name" >
						</div>
						<div class="form-group">
							<label for="productdes">Product Description:</label>
							<textarea name="description" style="resize: none;height=100px;width:100%;"  id="productdes" cols="30" placeholder="Product Description" rows="10"></textarea>
						<div class="form-group">
							<label for="productcate">Product Category:</label>
							<select name="productcategory" class="form-control" id="productcate">
								<option value="">Selectet</option>
								<?php
							$sql="SELECT * FROM category";
							$result=mysqli_query($con,$sql);
							while($data=mysqli_fetch_array($result)){
									$id=$data['id'];
									$categoryname=$data['categoryname'];
									?>
				<option value="<?php echo $id; ?>"> <?php echo $categoryname; ?></option>
							<?php } ?>		
							</select>
						</div>
						<div class="form-group">
							<label for="price">Product Price:</label>
							<input type="text" name="price" class="form-control" id="price" placeholder="Product price" >
						</div>
						<div class="form-group">
							<label for="image">Product Image:</label>
							<input type="file" name="productimage" class="form-control" id="image" placeholder="Product Image" >
							<p>Only jpg/png allowed.</p>
						</div>
						
						<button type="submit" name="submit" class="btn btn-primary" >Submit</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	
	<div class="clearfix space70"></div>
<!-- 
	<?php require_once("inc/footer.php"); ?> -->