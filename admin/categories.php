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
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<table class="table table-striped table-hover ">
						<thead>
							<tr>
								<th>#</th>
								<th>Category Name</th>
								<th>Operations</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$sql="SELECT * FROM category";
							$result=mysqli_query($con,$sql);
							$i=0;
							while($data=mysqli_fetch_array($result)){
									$id=$data['id'];
									$categoryname=$data['categoryname'];
									$i++;
									
							
						?>
							<tr>
								<th><?php echo $i; ?></th>
								<th><?php echo $categoryname; ?></th>
								<td>
									<a href="editcategory.php?id=<?php echo $id; ?>">Edit</a>|
									<a href="deletecategory.php?id=<?php echo $id; ?>">Delete</a>
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