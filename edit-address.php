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
		
		
		$sql="SELECT * FROM usersmeta WHERE uid='$uid'";
		$query=mysqli_query($con,$sql);
		if ($query) {
			// update datails .
			 $usql="UPDATE `usersmeta` SET `country`='$country',`firstname`='$fname',`lastname`='$lname',`company`='$company',`address1`='$address1',`address2`='$address2',`city`='$city',`state`='$state',`zip`='$zipcode',`mobaile`='$mobaile' WHERE uid='$uid' " ;
			$ures=mysqli_query($con,$usql) or die(mysqli_error($con));
			
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
			<div class="space30"></div>

<form action="" method="post">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Update My Billing Details</h3>
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
							<div class="space30"></div>
							<input type="submit" class="button btn-lg" value="Update">
					</div>
				</div>
				
			</div>
		</div>		
	</form>
		</div>
	</section>
	
	<div class="clearfix space70"></div>
	<?php require_once("inc/footer.php"); ?>