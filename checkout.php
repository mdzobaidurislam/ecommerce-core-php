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
$cart=$_SESSION['cart'];


if (isset($_POST)&& !empty($_POST)) {
	if (!$_POST['agree']) {
		$country=filter_var ($_POST['country'],FILTER_SANITIZE_STRING);
		$fname=filter_var ($_POST['fname'],FILTER_SANITIZE_STRING);
		$lname=filter_var ($_POST['lname'],FILTER_SANITIZE_STRING);
		$company=filter_var ($_POST['company'],FILTER_SANITIZE_STRING);
		$address1=filter_var ($_POST['address1'],FILTER_SANITIZE_STRING);
		$address2=filter_var ($_POST['address2'],FILTER_SANITIZE_STRING);
		$city=filter_var ($_POST['city'],FILTER_SANITIZE_STRING);
		$state=filter_var ($_POST['state'],FILTER_SANITIZE_STRING);
		$zipcode=filter_var ($_POST['zipcode'],FILTER_SANITIZE_NUMBER_INT);
		$mobaile=filter_var ($_POST['mobaile'],FILTER_SANITIZE_NUMBER_INT);
		$payment=filter_var ($_POST['payment'],FILTER_SANITIZE_STRING);
		
		$sql="SELECT * FROM usersmeta WHERE uid='$uid'";
		$query=mysqli_query($con,$sql);
		$r=mysqli_fetch_assoc($query);
		$count=mysqli_num_rows($query);
		if ($count==1) {
			// update datails .
			 $usql="UPDATE `usersmeta` SET `country`='$country',`firstname`='$fname',`lastname`='$lname',`company`='$company',`address1`='$address1',`address2`='$address2',`city`='$city',`state`='$state',`zip`='$zipcode',`mobaile`='$mobaile',`payment`='$payment' WHERE uid='$uid' " ;
			$ures=mysqli_query($con,$usql) or die(mysqli_error($con));
			if ($ures) {
				$total=0;	
				foreach ($cart as $key => $value) {
				 $ordsql="SELECT * FROM products WHERE id=$key; ";
				 $ordQuery=mysqli_query($con,$ordsql);
				 $ordData=mysqli_fetch_assoc($ordQuery);
				 $total=$total + ($ordData['price'] * $value['quantity']);
				}
				$iosql="INSERT INTO ordres (uid,totalprice,orderstatus,paymentmode) VALUES('$uid','$total','Order Placed','$payment') ";
				$iosqlr=mysqli_query($con,$iosql) or die(mysqli_error($con));
				if ($iosqlr) {
					// echo "Order inserted ,insert orderitems</br>";
					$orderid=mysqli_insert_id($con);
					foreach ($cart as $key => $value) {
					 $ordsql="SELECT * FROM products WHERE id=$key; ";
					 $ordQuery=mysqli_query($con,$ordsql);
					 $ordData=mysqli_fetch_assoc($ordQuery);
					 $pid=$ordData['id'];
					 $productprice=$ordData['price'];
					 $productQuantity=$value['quantity'];
					 $orderitemsql="INSERT INTO orderitems (pid,pquantity,orderid,productprice) VALUES('$pid','$productQuantity','$orderid','$productprice') ";
					 $orderitemQuery=mysqli_query($con,$orderitemsql) or die(mysqli_error($con));
					 
					}
					
				}
				unset($_SESSION['cart']);
				header('location:my-account.php');
			}
		}else{
			// insert customer datails
			  $isql="INSERT INTO  usersmeta (uid,country,firstname,lastname,company,address1,address2,city,state,zip,mobaile,payment) VALUES('$uid','$country','$fname','$lname','$company','$address1','$address2','$city','$state','$zipcode','$mobaile','$payment') ";
			$ires=mysqli_query($con,$isql) or die(mysqli_error($con));
			if ($ires) {
				$total=0;	
				foreach ($cart as $key => $value) {
				 $ordsql="SELECT * FROM products WHERE id=$key; ";
				 $ordQuery=mysqli_query($con,$ordsql);
				 $ordData=mysqli_fetch_assoc($ordQuery);
				 $total=$total + ($ordData['price'] * $value['quantity']);
				}
				$iosql="INSERT INTO ordres (uid,totalprice,orderstatus,paymentmode) VALUES('$uid','$total','Order Placed','$payment') ";
				$iosqlr=mysqli_query($con,$iosql) or die(mysqli_error($con));
				if ($iosqlr) {
					// echo "Order inserted ,insert orderitems</br>";
					$orderid=mysqli_insert_id($con);
					foreach ($cart as $key => $value) {
					 $ordsql="SELECT * FROM products WHERE id=$key; ";
					 $ordQuery=mysqli_query($con,$ordsql);
					 $ordData=mysqli_fetch_assoc($ordQuery);
					 $pid=$ordData['id'];
					 $productprice=$ordData['price'];
					 $productQuantity=$value['quantity'];
					 $orderitemsql="INSERT INTO orderitems (pid,pquantity,orderid,productprice) VALUES('$pid','$productQuantity','$orderid','$productprice') ";
					 $orderitemQuery=mysqli_query($con,$orderitemsql) or die(mysqli_error($con));
					 
					}
					
				}
				unset($_SESSION['cart']);
				header('location:my-account.php');
			}
		}
	}
}
 $sql="SELECT * FROM usersmeta WHERE uid='$uid'";
		$query=mysqli_query($con,$sql);
		$r=mysqli_fetch_assoc($query);
 ?>

  
 
	<div class="close-btn fa fa-times"></div>

	
	<!-- SHOP CONTENT -->
<section id="content">
		<div class="content-blog" style="background: #d8d8d8;color: black;">
			<div class="page_header text-center">
				<h2>Shop - Checkout</h2>
				<p>Get the best kit for smooth shave</p>
			</div>

<form action="" method="post">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Billing Details</h3>
						<div class="space30"></div>
							<label class="">Country </label>
							<select name="country" class="form-control">
								<option value="">Select Country</option>
								<option value="AX">Aland Islands</option>
								<option value="AF">Afghanistan</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>
								<option value="BB">Barbados</option>
							</select>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input  name="fname" class="form-control" placeholder="Enter first name" value="<?php if(!empty($r['firstname'])){ echo $r['firstname']; }elseif(isset($fname)){ echo $fname;} ?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input name="lname" class="form-control" placeholder="Enter last name" value="<?php if(!empty($r['lastname'])){ echo $r['lastname']; }elseif(isset($lname)){ echo $lname;} ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Company Name</label>
							<input name="company" class="form-control" placeholder="Enter company name" value="<?php if(!empty($r['company'])){ echo $r['company']; }elseif(isset($company)){ echo $company;} ?>" type="text">
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input name="address1" class="form-control" placeholder="Street address" value="<?php if(!empty($r['address1'])){ echo $r['address1']; }elseif(isset($address1)){ echo $address1;} ?>" type="text">
							<div class="clearfix space20"></div>
							<input name="address2" class="form-control" placeholder="Apartment, suite, unit etc. (optional)" value="<?php if(!empty($r['address2'])){ echo $r['address2']; }elseif(isset($address2)){ echo $address2;} ?>" type="text">
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-4">
									<label>City </label>
									<input name="city" class="form-control" placeholder="City" value="<?php if(!empty($r['city'])){ echo $r['city']; }elseif(isset($city)){ echo $fname;} ?>" type="text">
								</div>
								<div class="col-md-4">
									<label>State</label>
									<input name="state" class="form-control" value="<?php if(!empty($r['state'])){ echo $r['state']; }elseif(isset($state)){ echo $fname;} ?>" placeholder="State" type="text">
								</div>
								<div class="col-md-4">
									<label>Postcode </label>
									<input name="zipcode" class="form-control" placeholder="Postcode / Zip" value="<?php if(!empty($r['zip'])){ echo $r['zip']; }elseif(isset($zipcode)){ echo $fname;} ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Phone </label>
							<input name="mobaile" class="form-control" id="billing_phone" placeholder="Mobaile number" value="<?php if(!empty($r['mobaile'])){ echo $r['mobaile']; }elseif(isset($mobaile)){ echo $fname;} ?>" type="text">
				
					</div>
				</div>
				
			</div>
			
			<div class="space30"></div>
			<h4 class="heading">Your order</h4>
			
			<table class="table table-bordered extra-padding">
				<tbody>
					<tr>
						<th>Cart Subtotal</th>
						<td><span class="amount">£190.00</span></td>
					</tr>
					<tr>
						<th>Shipping and Handling</th>
						<td>
							Free Shipping				
						</td>
					</tr>
					<tr>
						<th>Order Total</th>
						<td><strong><span class="amount">£190.00</span></strong> </td>
					</tr>
				</tbody>
			</table>
			
			<div class="clearfix space30"></div>
			<h4 class="heading">Payment Method</h4>
			<div class="clearfix space20"></div>
			
			<div class="payment-method">
				<div class="row">
					
						<div class="col-md-4">
							<input name="payment" id="radio1" class="css-checkbox" type="radio" value="Cash"><span>Cash On Delivery</span>
							<div class="space20"></div>
							<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
						</div>
						<div class="col-md-4">
							<input name="payment" id="radio2" class="css-checkbox" type="radio" value="Cheque"><span>Cheque Payment</span>
							<div class="space20"></div>
							<p>Please send your cheque to BLVCK Fashion House, Oatland Rood, UK, LS71JR</p>
						</div>
						<div class="col-md-4">
							<input name="payment" id="radio3" class="css-checkbox" type="radio" value="Paypal"><span>Paypal</span>
							<div class="space20"></div>
							<p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account</p>
						</div>
					
				</div>
				<div class="space30"></div>
				
					<input name="agree" id="checkboxG2" class="css-checkbox" type="checkbox" value="true"><span>I've read and accept the <a href="#">terms &amp; conditions</a></span>
			
				<div class="space30"></div>
				<input type="submit" class="button btn-lg" value="Pay Now">
			</div>
		</div>		
	</form>
		</div>
	</section>
	
	<div class="clearfix space70"></div>
	<?php require_once("inc/footer.php"); ?>