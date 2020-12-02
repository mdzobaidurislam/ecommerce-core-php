<?php
session_start();
require_once("../config/connect.php");
if(!isset($_SESSION['email'])&& empty($_SESSION['email'])){
	header("location:login.php");
}

?>
<?php require_once("inc/header.php"); ?>
<?php require_once("inc/nav.php"); ?>


	
	<div class="close-btn fa fa-times"></div>

	
	<!-- SHOP Products list -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<table class="table table-striped table-hover ">
						<thead>
							<tr>
								<th>#</th>
								<th>Produtc Name</th>
								<th>Category Name</th>
								<th>Price</th>
								<th>Thumbnail</th>
								<th>Description</th>
								<th>Operations</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$sql="SELECT * FROM products order by id desc";
							$result=mysqli_query($con,$sql);
							$i=0;
							while($data=mysqli_fetch_array($result)){
									$id=$data['id'];
									$productname=$data['name'];
									$catid=$data['catid'];
									$price=$data['price'];
									$thumbnail=$data['thumbnail'];
									$des=$data['description'];
									$i++;
									
							
						?>
							<tr>
								<th><?php echo $i; ?></th>
								<th><?php echo $productname; ?></th>
								<th><?php echo $catid; ?></th>
								<th><?php echo $price; ?></th>
								<th> <img style="width:100px;height:80px;" src="uploads/<?php echo $thumbnail; ?>" alt=""></th>
								<th><?php echo $des; ?></th>
								<td>
									<a href="editproduct.php?id=<?php echo $id; ?>">Edit</a>|
									<a href="deleteproduct.php?id=<?php echo $id; ?>">Delete</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	
	<div class="clearfix space70"></div>

	<?php require_once("inc/footer.php"); ?>