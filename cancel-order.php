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
// $cart=$_SESSION['cart'];


if (isset($_POST)&& !empty($_POST)) {
	
		$cancel=filter_var ($_POST['cancel'],FILTER_SANITIZE_STRING);
		$id=filter_var ($_POST['orders'],FILTER_SANITIZE_STRING);
	$cancelsql="INSERT INTO ordertracking (orderid,status,massage) VALUES('$id','Cancelled','$cancel') ";
		$cancelquery=mysqli_query($con,$cancelsql);
		if ($cancelquery) {
			$orderUpdate="UPDATE ordres SET orderstatus='Cancelled' WHERE id='$id' ";
			$updateCancel=mysqli_query($con,$orderUpdate);
			if ($updateCancel) {
				header('location:my-account.php');
			}
		}
		
	
}

 ?>

  
 
	<div class="close-btn fa fa-times"></div>

	
	<!-- SHOP CONTENT -->
<section id="content">
		<div class="content-blog" style="background: #d8d8d8;color: black;">
			

<form action="" method="post">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Update My Billing Details</h3>
						<div class="space30"></div>
		<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order</th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment</th>
						<th>Total Price</th>
					</tr>
				</thead>
				<tbody>
				<?php
				if (isset($_GET['id'])) {
						$ordId=$_GET['id'];
					}else{
						header('location:my-account.php');
					}
					$orderSql="SELECT * FROM ordres WHERE id='$ordId'  ";
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
					</tr>
				<?php } ?>
				</tbody>
			</table>
						<div class="space30"></div>
							<label>Reason:</label>
							<div class="space30"></div>
							<input type="hidden" name="orders" value="<?php echo $_GET['id']; ?>">
							<textarea class="form-control" name="cancel" id="" cols="10"></textarea>
							<div class="space30"></div>
							<input type="submit" class="button btn-lg" value="Cancel Order">
					</div>
				</div>
				
			</div>
		</div>		
	</form>
		</div>
	</section>
	
	<div class="clearfix space70"></div>
	<?php require_once("inc/footer.php"); ?>



