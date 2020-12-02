
			<div class="menu-wrap">
				<div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
				<ul class="sf-menu">
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="#">Shop</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<?php
								$sql="SELECT * FROM category";
								$query=mysqli_query($con,$sql);
								while ($row=mysqli_fetch_assoc($query)) { ?>
									
							
							<li><a href="index.php?id=<?= $row['id']; ?>"><?php echo $row['categoryname']; ?></a></li>
						<?php	}
							?>
						</ul>
					</li>
					<li>
						<a href="#">My Account</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="http://localhost/ecommerce/my-account.php">My Orders</a></li>
							<li><a href="http://localhost/ecommerce/edit-address.php">Update Address</a></li>
							<li><a href="https://localhost/ecommerce/logout.php">Logout</a></li>
							<li><a href="https://localhost/ecommerce/login.php">Login</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
				</ul>
				<?php 
				if (isset($_SESSION['cart'])) {?>	
					<div class="header-xtra">
						<?php  $cart=$_SESSION['cart']; ?>
						<div class="s-cart">
							<div class="sc-ico"><i class="fa fa-shopping-cart"></i><em>
								<?php
							if (isset($cart)) {
								echo count($cart);
							}?>
								
							</em></div>

							<div class="cart-info">
								<small>You have <em class="highlight"><?php
							if (isset($cart)) {
								echo count($cart);
							}?>
								 item(s)</em> in your shopping bag</small>
								<br>
								<br>
								<?php
									$total=0;	
									foreach ($cart as $key => $value) {
									 $navcartsql="SELECT * FROM products WHERE id=$key; ";
									 $navcartQuery=mysqli_query($con,$navcartsql);
									 $navcartData=mysqli_fetch_assoc($navcartQuery);
								?>
								<div class="ci-item">
									<img src="admin/uploads/<?php echo $navcartData['thumbnail']; ?>" width="70" alt=""/>
									<div class="ci-item-info">
										<h5><a href="singel.php?id=<?= $navcartData['id']; ?>"><?= substr($navcartData['name'],0,20); ?></a></h5>
										<p><?php echo $value['quantity']; ?> x $<?= $navcartData['price']; ?></p>
										<div class="ci-edit">
											<a href="#" class="edit fa fa-edit"></a>
											<a href="delcart.php?id=<?php echo $key; ?>" class="edit fa fa-trash"></a>
										</div>
									</div>
								</div>
							<?php 
							$total=$total + ($navcartData['price'] * $value['quantity']);
						 }?>
								<div class="ci-total">Subtotal: $<?php echo $total;?></div>
								<div class="cart-btn">
									<a href="cart.php">View Bag</a>
									<a href="checkout.php">Checkout</a>
								</div>
							</div>
						</div>
						<div class="s-search">
							<div class="ss-ico"><i class="fa fa-search"></i></div>
							<div class="search-block">
								<div class="ssc-inner">
									<form>
										<input type="text" placeholder="Type Search text here...">
										<button type="submit"><i class="fa fa-search"></i></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
	</header>