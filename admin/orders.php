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
								<th>Customer Name</th>
								<th>Order Id</th>
								<th>Total Price</th>
								<th>Order Status</th>
								<th>Payment Mode</th>
								<th>Order Placed On</th>
								<th>Operations</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$sql="SELECT o.id,o.totalprice,o.orderstatus,o.paymentmode,o.timestamp,u.firstname,u.lastname FROM ordres o JOIN usersmeta u WHERE o.uid=u.uid ORDER BY O.id DESC ";
							$result=mysqli_query($con,$sql);
							$i=0;
							while($data=mysqli_fetch_array($result)){
									$i++;?>
							<tr>
								<th><?php echo $i;?></th>
								<th>
									<?php echo $data['firstname']." ".$data['lastname']; ?>
										
								</th>
								<th> <?php echo $data['id'];  ?></th>
								<th> <?php echo $data['totalprice'];  ?></th>
								<th> <?php echo $data['orderstatus']; ?></th>
								<th> <?php echo $data['paymentmode']; ?></th>
								<th> <?php echo $data['timestamp'];   ?></th>
								<td>
									<a href="order-process.php?id=<?php echo $data['id']; ?>">Process Order</a> 
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