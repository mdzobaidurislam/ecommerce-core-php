<?php 
session_start();

 
	require_once("config/connect.php");
	require_once("inc/header.php"); 
	require_once("inc/nav.php"); 
	$cart=$_SESSION['cart'];
?>


	<div class="close-btn fa fa-times"></div>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Shop Cart</h2>
						<p>Get the best kit for smooth shave</p>
					</div>
					<div class="col-md-12">

				<table class="cart-table table table-bordered">
					<thead>
						<tr>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>Product</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$total=0;	
						foreach ($cart as $key => $value) {
						 $cartsql="SELECT * FROM products WHERE id=$key; ";
						 $cartQuery=mysqli_query($con,$cartsql);
						 $cartData=mysqli_fetch_assoc($cartQuery);
						?>
	

						<tr>
							<td>
								<a class="remove" href="delcart.php?id=<?php echo $key; ?>"><i class="fa fa-times"></i></a>
							</td>
							<td>
								<a href="singel.php?id=<?= $cartData['id']; ?>"><img src="admin/uploads/<?php echo $cartData['thumbnail']; ?>" alt="" height="90" width="90"></a>					
							</td>
							<td>
								<a href="singel.php?id=<?= $cartData['id']; ?>"><?= substr($cartData['name'],0,20); ?></a>					
							</td>
							<td>
								<span class="amount"><?= $cartData['price']; ?></span>					
							</td>
							<td>
								<div class="quantity"><?php echo $value['quantity']; ?></div>
							</td>
							<td>
								
	<span class="amount"> $<?php echo ($cartData['price'] * $value['quantity']) ;?></span>					
							</td>
						</tr>
					<?php 
						 $total=$total + ($cartData['price'] * $value['quantity']);
					 }?>
					 <tr>
						<td colspan="6" class="actions">
							<div class="col-md-6">
								<div class="coupon">
									<label>Coupon:</label><br>
									<input placeholder="Coupon code" type="text"> <button type="submit">Apply</button>
								</div>
							</div>
							<div class="col-md-6">
								<div class="cart-btn">
									<!-- <button class="button btn-md" type="submit">Update Cart</button> -->
									<a href="checkout.php" class="button btn-md">Checkout</a>
								</div>
							</div>
						</td>
					</tr>
					</tbody>
				</table>		

				<div class="cart_totals">
					<div class="col-md-6 push-md-6 no-padding">
						<h4 class="heading">Cart Totals</h4>
						<table class="table table-bordered col-md-6">
							<tbody>
								<tr>
									<th>Cart Subtotal</th>
									<td><span class="amount">$<?= $total;?></span></td>
								</tr>
								<tr>
									<th>Shipping and Handling</th>
									<td>
										Free Shipping				
									</td>
								</tr>
								<tr>
									<th>Order Total</th>
									<td><strong><span class="amount">$<?= $total;?></span></strong> </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>			
								
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<div class="clearfix space70"></div>

		
	<?php require_once("inc/footer.php"); ?>