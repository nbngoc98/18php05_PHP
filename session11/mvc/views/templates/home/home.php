<?php include "header.php" ?>

<section  class="homepage-slider" id="home-slider">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<img src="public/themes/images/carousel/banner-1.jpg" alt="" />
			</li>
			<li>
				<img src="public/themes/images/carousel/banner-2.jpg" alt="" />
				<div class="intro">
					<h1>Mid season sale</h1>
					<p><span>Up to 50% Off</span></p>
					<p><span>On selected items online and in stores</span></p>
				</div>
			</li>
		</ul>
	</div>			
</section>
<section class="header_text">
	We stand for top quality templates. Our genuine developers always optimized bootstrap commercial templates. 
	<br/>Don't miss to use our cheap abd best bootstrap templates.
</section>
<section class="main-content">
	<div class="row">
		<div class="span12">													
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails">	
									<?php 
								        if ($result->num_rows > 0) {
								          while ($row = $result->fetch_assoc()) {
								            $id = $row['id'];
								            $image = 'public/uploads/'.$row['image'];
								            echo"<li class='span3'>
													<div class='product-box'>
														<span class='sale_tag'></span>
														<p><a href='index.php?controller=home&action=detail&id=$id'><img src='$image' width='70%'></a></p>
														<a href='product_detail.html' class='title'>" . $row['name']. "</a><br/>
														<a href='products.html' class='category'>" . $row['desscription']. "</a>
														<p class='price'>" . $row['price']."</p>
													</div>
												</li>";
								                   
								          }
								        } 
								      ?>										
								</ul>
							</div>
							<!-- <div class="item">
								<ul class="thumbnails">
									<li class="span3">
										<div class="product-box">
											<p><a href="product_detail.html"><img src="public/themes/images/ladies/5.jpg" alt="" /></a></p>
											<a href="product_detail.html" class="title">Know exactly</a><br/>
											<a href="products.html" class="category">Quis nostrud</a>
											<p class="price">$22.30</p>
										</div>
									</li>
																																						
								</ul>
							</div> -->
						</div>							
					</div>
				</div>						
			</div>
			<br/>

			<div class="row feature_box">						
				<div class="span4">
					<div class="service">
						<div class="responsive">	
							<img src="public/themes/images/feature_img_2.png" alt="" />
							<h4>MODERN <strong>DESIGN</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
						</div>
					</div>
				</div>
				<div class="span4">	
					<div class="service">
						<div class="customize">			
							<img src="public/themes/images/feature_img_1.png" alt="" />
							<h4>FREE <strong>SHIPPING</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="service">
						<div class="support">	
							<img src="public/themes/images/feature_img_3.png" alt="" />
							<h4>24/7 LIVE <strong>SUPPORT</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
						</div>
					</div>
				</div>	
			</div>		
		</div>				
	</div>
</section>
<?php include "footer.php" ?>