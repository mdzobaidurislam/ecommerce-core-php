<?php
ob_start();
session_start();
require_once("../config/connect.php");
if(!isset($_SESSION['email'])&& empty($_SESSION['email'])){
	header("location:login.php");
}
 require_once("inc/header.php"); 
 require_once("inc/nav.php");



if (isset($_POST)&& !empty($_POST)) {
	
		$massage=filter_var ($_POST['massage'],FILTER_SANITIZE_STRING);
		$status=filter_var ($_POST['status'],FILTER_SANITIZE_STRING);
		$id=filter_var ($_POST['orders'],FILTER_SANITIZE_STRING);
		$orderProgressSql="INSERT INTO ordertracking (orderid,status,massage) VALUES('$id','$status','$massage') ";
		$orderProgresquery=mysqli_query($con,$orderProgressSql);
		if ($orderProgresquery) {
			$orderProgressUpdate="UPDATE ordres SET orderstatus='$status' WHERE id='$id' ";
			$orderProgressUpdateQuery=mysqli_query($con,$orderProgressUpdate);
			if ($orderProgressUpdateQuery) {
				header('location:orders.php');
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
				<div class="page_header text-center">
						<h2>Admin -Order Process</h2>
						
					</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Order Processing</h3>
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
						header('location:orders.php');
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
						<label class="">Order Status </label>
							<select name="status" class="form-control">
								<option value="">Select Status</option>
								<option value="Cancelled">Cancelled</option>
								<option value="In progress">In progress</option>
								<option value="Dispatched">Dispatched</option>
								<option value="Delivered">Delivered</option>
							</select>
							<label>Massage:</label>
							<div class="space30"></div>
							<input type="hidden" name="orders" value="<?php echo $_GET['id']; ?>">
							<textarea class="form-control" name="massage" id="" cols="10"></textarea>
							<div class="space30"></div>
							<input type="submit" class="button btn-lg" value=" Update Order Status">
					</div>
				</div>
				
			</div>
		</div>		
	</form>
		</div>
	</section>
	
	<div class="clearfix space70"></div>
	<?php require_once("inc/footer.php"); ?>



