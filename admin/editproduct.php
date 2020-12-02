<?php
session_start();
require_once("../config/connect.php");
if(!isset($_SESSION['email'])&& empty($_SESSION['email'])){
	header("location:login.php");
}

if(isset($_GET['id'])&& !empty($_GET['id'])){
    $getid=$_GET['id'];
}else{
    header("location:products.php");
}
if(isset($_POST['submit'])){
	
	$productname=mysqli_real_escape_string($con,$_POST['name']);
	$description=mysqli_real_escape_string($con,$_POST['description']);
	$proupdateid=mysqli_real_escape_string($con,$_POST['proupdateid']);
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
        //$autoImagename=uniqid($productimage);
		if(isset($productimage)&&!empty($productimage)){
			if( $extention=='jpg' || $extention=='jpeg' || $extention=='png' && $size<=$max_size){
				$location='uploads/';
				$filepath=$location.$productimage;
				
				if(move_uploaded_file($tmp_name,$filepath)){

					$smsg="Uploded Successfull";

				}else{
					$fmsg="Uploded Failed";
				}
					
			}else{
				$fmsg="Jpeg file are allowed and should be less than 1MB";
			}
				
		}else{
			$fmsg="Plase select a file";
		}
	}else{
		if(isset($_POST['filepath'])){
			$productimage=$_POST['filepath'];
		}
	}
	if(!empty($productname)&&!empty($description)&&!empty($proupdateid)&&!empty($price)&&!empty($price)){
		
			 $sql="UPDATE products SET name='$productname',catid='$proupdateid',price='$price',description='$description', thumbnail='$productimage' WHERE id='$getid' ";
			$res=mysqli_query($con,$sql);
			if($res){
				
				$smsg="Updated product successfull";
			}else{
				
				$fmsg="Not Updated product";
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
            <?php
                $sql="SELECT * FROM products WHERE id='$getid'";
                $result=mysqli_query($con,$sql);
                $data=mysqli_fetch_array($result);
                    $id=$data['id'];
                    $productname=$data['name'];
                    $catproid=$data['catid'];
                    $price=$data['price'];
                    $thumbnail=$data['thumbnail'];
                    $des=$data['description'];
            ?>
					<form action="" method="post" class="col-md-12 " enctype="multipart/form-data" >
						<div class="form-group">
							<input type="hidden" name="filepath" value="<?php echo $thumbnail; ?>">
							<label for="productname">Product Name:</label>
							<input type="text" name="name" class="form-control" id="productname" placeholder="Product name" value="<?php echo $productname; ?>" >
						</div>
						<div class="form-group">
							<label for="productdes">Product Description:</label>
							<textarea name="description" style="resize: none;height=100px;width:100%;"  id="productdes" cols="30" placeholder="Product Description" rows="10"><?php echo $des; ?></textarea>
						<div class="form-group">
							<label for="productcate">Product Category:</label>
							<select name="proupdateid" class="form-control" id="productcate">
								<?php
							$sql="SELECT * FROM category";
							$result=mysqli_query($con,$sql);
							while($data=mysqli_fetch_array($result)){
									$catid=$data['id'];
									$categoryname=$data['categoryname'];
									?>
							<option value="<?php echo $catid; ?>" <?php if($catid==$catproid){ echo "selected";} ?>> <?php echo $categoryname; ?></option>
							<?php } ?>		
							</select>
						</div>
						<div class="form-group">
							<label for="price">Product Price:</label>
							<input type="text" value="<?php echo $price; ?>" name="price" class="form-control" id="price" placeholder="Product price" >
						</div>
						<div class="form-group">
							<label for="image">Product Image:</label><br>
                            <?php if(isset($thumbnail)&&!empty($thumbnail)){ ?>
                                    <img style="width:200px;height:200px" src="uploads/<?php echo $thumbnail; ?>" alt=""> <br><br>
                                    <a class="btn btn-danger" href="deleteproductimgage.php?id=<?php echo $id; ?>">Delete Image</a>
                            <?php }else{?>
							<input type="file" name="productimage" class="form-control" id="image" placeholder="Product Image" >
							<p>Only jpg/png allowed.</p>
                            <?php }?>
						</div>
						
						<button type="submit" name="submit" class="btn btn-primary" >Submit</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	
	<div class="clearfix space70"></div>

	<?php require_once("inc/footer.php"); 