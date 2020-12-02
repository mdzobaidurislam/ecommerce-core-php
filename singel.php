<?php 
ob_start();
session_start();
 require_once("config/connect.php");
 require_once("inc/header.php"); 
 require_once("inc/nav.php");

if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
	$sqlProduct="SELECT * FROM products WHERE id='$id' ";
	$query=mysqli_query($con,$sqlProduct);
	$getdata=mysqli_fetch_assoc($query);

}else{
	header('location:index.php');
}
$uid=$_SESSION['customerid'];

if(isset($_POST)&& !empty($_POST)){
	 $reviewMassage=$_POST['reviewMassage'];
	 $reviewSql="INSERT INTO reviews (pid,uid,review) VALUES('$id','$uid','$reviewMassage') ";
	 $revieQuery=mysqli_query($con,$reviewSql) or die(mysqli_error($con));
	 if ($revieQuery) {
	 	$smsg="Review submitted successfull";
	 }else{
	 	$fmsg="Failed to review";
	 }
}



 ?>


	<div class="close-btn fa fa-times"></div>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Shop</h2>
						<p>Get the best kit for smooth shave</p>
					</div>		
					<div class="col-md-10 col-md-offset-1">
				<?php if(isset($smsg)){?>
		                    <p class=" alert alert-success" role="alert" ><?php echo $smsg; ?></p>
		               <?php }?>
		               <?php if(isset($fmsg)){?>
		                    <p class=" alert alert-danger" role="alert" ><?php echo $fmsg; ?></p>
		               <?php }?>
               <div class="space10"></div>
					<div class="row">
						<div class="col-md-5">
							<div class="gal-wrap">
								<div id="gal-slider" class="flexslider">
									<ul class="slides">
										<li><img src="admin/uploads/<?php echo $getdata['thumbnail']; ?>" class="img-responsive" alt=""/></li>
									</ul>
								</div>
								<ul class="gal-nav">
									<li>
										<div>
											<img src="admin/uploads/<?php echo $getdata['thumbnail']; ?>" class="img-responsive" alt=""/>
										</div>
									</li>
									<li>
								</ul>
								<div class="clearfix"></div>
							
							</div>
						</div>
						<div class="col-md-7 product-single">
							<h2 class="product-single-title no-margin"><?= $getdata['name']; ?></h2>
							<div class="space10"></div>
							<div class="p-price"><?= $getdata['price']; ?></div>
							<p><?= $getdata['description']; ?></p>
							<form method="get" action="addtocart.php">
								<div class="product-quantity">
									<span>Quantity:</span> 
									<form>
										<input type="hidden" name="id" value="<?= $getdata['id']; ?>">
										<input type="text" name="quant" placeholder="1">
									
								</div>
								<div class="shop-btn-wrap">
									<input type="submit" class="button btn-small" value="Add to Cart">
								</div>
							</form>
							<div class="clearfix space30"></div>
							<a href="addtowishlist.php?id=<?php echo $getdata['id']; ?>"  class="button btn-small">Add to Wishlist</a>
							<div class="product-meta">
							<span>Categories:
								<?php
										$catsql="SELECT * FROM category WHERE id={$getdata['catid']} ";
										$catQuery=mysqli_query($con,$catsql);
										$catData=mysqli_fetch_assoc($catQuery);
									?>
								 <a href="#"><?= $catData['categoryname']; ?></a>
							</span>
							</div>
						</div>
					</div>
					<div class="clearfix space30"></div>
					<div class="tab-style3">
						<!-- Nav Tabs -->
						<div class="align-center mb-40 mb-xs-30">
							<ul class="nav nav-tabs tpl-minimal-tabs animate">
								<li class="active col-md-6">
									<a aria-expanded="true" href="#mini-one" data-toggle="tab">Overview</a>
								</li>
								<!-- <li class="col-md-4">
									<a aria-expanded="false" href="#mini-two" data-toggle="tab">Product Info</a>
								</li> -->
								<li class="col-md-6">
									<a aria-expanded="false" href="#mini-three" data-toggle="tab">Reviews</a>
								</li>
							</ul>
						</div>
						<!-- End Nav Tabs -->
						<!-- Tab panes -->
						<div style="height: auto;" class="tab-content tpl-minimal-tabs-cont align-center section-text">
							<div style="" class="tab-pane fade active in" id="mini-one">
								<p><?= $getdata['description']; ?></p>
								<!-- <table class="table tba2">
									<tbody>
										<tr>
											<td>Sizes</td>
											<td>M, L, XL, XXL</td>
										</tr>
										<tr>
											<td>Prodused in</td>
											<td>USA</td>
										</tr>
										<tr>
											<td>Material</td>
											<td>plastic, textile</td>
										</tr>
									</tbody>
								</table> -->
							</div>
							<div style="" class="tab-pane fade" id="mini-two">
								<table class="table tba2">
									<tbody>
										<tr>
											<td>Sizes</td>
											<td>M, L, XL, XXL</td>
										</tr>
										<tr>
											<td>Prodused in</td>
											<td>USA</td>
										</tr>
										<tr>
											<td>Material</td>
											<td>plastic, textile</td>
										</tr>
										<tr>
											<td>Colors</td>
											<td>red, black, grey</td>
										</tr>
										<tr>
											<td>Dimension</td>
											<td>20x40x33</td>
										</tr>
										<tr>
											<td>Type</td>
											<td>bag</td>
										</tr>
										<tr>
											<td>Weight</td>
											<td>0.35kg</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div style="" class="tab-pane fade" id="mini-three">
								<div class="col-md-12">
									<?php
										$countSql="SELECT count(*) AS countr FROM reviews r WHERE r.pid=$id";
										$countQuery=mysqli_query($con,$countSql);
										$countData=mysqli_fetch_assoc($countQuery);
									?>
									<h4 class="uppercase space35"><?php echo $countData['countr'];?> Reviews for <?= substr($getdata['name'],0,20); ?></h4>
									<ul class="comment-list">
									<?php
									$comSql="SELECT u.firstname,u.lastname,r.timestamp,r.review FROM reviews r JOIN usersmeta u WHERE r.uid=u.uid AND r.pid=$id";
									$comQuery=mysqli_query($con,$comSql);
									while($comdata=mysqli_fetch_assoc($comQuery)){
									?>
										<li>
											<a class="pull-left" href="#"><img class="comment-avatar" src="images/quote/1.jpg" alt="" height="50" width="50"></a>
											<div class="comment-meta">
												<a href="#"><?php echo $comdata['firstname'].' '.$comdata['lastname']; ?></a>
												<span>
												<em><?php echo $comdata['timestamp'];?></em>
												</span>
											</div>
											<div class="rating2">
												<span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
											</div>
											<p>
												<?php echo $comdata['review'];?>
											</p>
										</li>
									<?php } ?>

									</ul>
									<?php
										$checkReview=" SELECT count(*) reviewcount FROM reviews r WHERE r.uid=$uid";
										$checkReviewQuery=mysqli_query($con,$checkReview);
										$checkReviewData=mysqli_fetch_assoc($checkReviewQuery);
										if ($checkReviewData['reviewcount']>=1) {
											echo '<h4 class="uppercase space20">You have already Reviews This Product....</h4>';
										}else{
									?>
									<h4 class="uppercase space20">Add a review</h4>
									<form id="form" class="review-form" method="POST" action="">
										<?php
										$reviewUserSql="SELECT u.email,u1.firstname,u1.lastname FROM user u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
											$reviewUserQuery=mysqli_query($con,$reviewUserSql);
											$reviewUserData=mysqli_fetch_assoc($reviewUserQuery);
										?>
										<div class="row">
											<div class="col-md-6 space20">
												<input name="name" class="input-md form-control" placeholder="Name *" value="<?php echo $reviewUserData['firstname'].' '.$reviewUserData['lastname']; ?>" maxlength="100" disabled required="" type="text">
											</div>
											<div class="col-md-6 space20">
												<input name="email" class="input-md form-control" placeholder="Email *" value="<?php echo $reviewUserData['email'];?>" disabled maxlength="100" required="" type="email">
											</div>
										</div>
										<!-- <div class="space20">
											<span>Your Ratings</span>
											<div class="clearfix"></div>
											<div class="rating3">
												<span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
											</div>
											<div class="clearfix space20"></div>
										</div> -->
										<div class="space20">
											<textarea name="reviewMassage" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400"></textarea>
										</div>
										<input type="submit" class="button btn-small" value="Submit Review">	
									</form>
								<?php } ?>
								</div>
								<div class="clearfix space30"></div>
							</div>
						</div>
					</div>
					<div class="space30"></div>
					<div class="related-products">
						<h4 class="heading">Related Products</h4>
						<hr>
						<div class="row">
							<div id="shop-mason" class="shop-mason-3col">
								<?php
									$relsql="SELECT * FROM products WHERE id!='$id' ORDER BY rand() LIMIT 3";
									$releted=mysqli_query($con,$relsql);
									while($reldata=mysqli_fetch_array($releted)){?>
								
								<div class="sm-item isotope-item">
									<div class="product">
										<div class="product-thumb">
											<img src="admin/uploads/<?php echo $reldata['thumbnail']; ?>" class="img-responsive" alt="">
											<div class="product-overlay">
												<span>
												<a href="singel.php?id=<?php echo $reldata['id']; ?>" class="fa fa-link"></a>
												<a href="#" class="fa fa-shopping-cart"></a>
												</span>					
											</div>
										</div>
										<div class="rating">
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
										</div>
										<h2 class="product-title"><a href="#"><?php echo $reldata['name']; ?></a></h2>
										<div class="product-price"><?php echo $reldata['price']; ?><span></span></div>
									</div>
								</div>
							<?php } ?>
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