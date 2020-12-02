<?php

ob_start();
session_start();
require_once("config/connect.php");
if(!isset($_SESSION['customer'])&& empty($_SESSION['customer '])){
	header("location:login.php");
}
 require_once("inc/header.php");
 require_once("inc/nav.php"); 
$uid=$_SESSION['customerid'];
//$cart=$_SESSION['cart'];

 ?>

	<div class="close-btn fa fa-times"></div>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>My Account</h2>
					</div>
					<div class="col-md-12">

			<h3>Recent Orders</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order</th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment</th>
						<th>Total Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$orderSql="SELECT * FROM ordres WHERE uid='$uid' ORDER BY id DESC ";
					$orderQuery=mysqli_query($con,$orderSql);
					while ($orderData=mysqli_fetch_assoc($orderQuery)) {
					
				?>	
					<tr>
						<td>
							<?= $orderData['id']; ?>
						</td>
						<td>
							<?= $orderData['timestamp']; ?>
						</td>
						<td>
							<?= $orderData['orderstatus']; ?>			
						</td>
						<td>
							<?= $orderData['paymentmode']; ?>			
						</td>
						<td>
							<?= $orderData['totalprice']; ?>			
						</td>
						<td>
							<a href="view-order.php?id=<?php echo $orderData['id']; ?>">View</a>
							 <?php if($orderData['orderstatus']!='Cancelled'){ ?>
							|| <a href="cancel-order.php?id=<?php echo $orderData['id']; ?>">Cancel</a>
						<?php } ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>		

			<br>
			<br>
			<br>

			<div class="ma-address">
						<h3>My Addresses</h3>
						<p>The following addresses will be used on the checkout page by default.</p>

			<div class="row">
				<div class="col-md-6">
								<h4>Billing Address <a href="edit-address.php">Edit</a></h4>
						<?php
						$customerInfo="SELECT u1.firstname,u1.lastname,u1.company,u1.address1,u1.address2,u1.country,u1.city,u1.state,u1.zip,u1.mobaile FROM user u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id='$uid' ";
						$customerQuery=mysqli_query($con,$customerInfo);
						$customerResult=mysqli_fetch_assoc($customerQuery);
						?>
					<p>
						<?php
							if (mysqli_num_rows($customerQuery)===1) {?>
						<?php echo $customerResult['firstname']; ?> <?php echo $customerResult['lastname']; ?><br>
						<?php echo $customerResult['company']; ?><br>
						<?php echo $customerResult['address1']; ?><br>
						<?php echo $customerResult['address2']; ?><br>
						<?php echo $customerResult['city']; ?><br>
						<?php echo $customerResult['state']; ?><br>
						<?php echo $customerResult['mobaile']; ?><br>
						<?php echo $customerResult['country']; ?>
							<?php }
						?> 
					</p>
				</div>

				<div class="col-md-6">
								<h4>Shipping Address <a href="#">Edit</a></h4>
					<p>
						Ranveer Singh<br>
						spyropress<br>
						karachi<br>
						karachi<br>
						TR05<br>
						342343<br>
						Swaziland 
					</p>

				</div>
			</div>



			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
	<div class="clearfix space70"></div>
	<?php require_once("inc/footer.php"); ?>