<?php include_once 'layout/header.php'; ?>
		<!-- main area start -->
		<div class="main-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<!-- block category area start -->
						<div class="block-category side-area">
							<!-- featured block start -->
							<!-- block title start -->
							<div class="bar-title">
								<div class="bar-ping"><img style="width: 50%" src="<?php echo base_url() ?>/view/book_store/theme/img/bar-ping.png" alt="" /></div>
								<h3 style="color: #0339E9">Tài liệu nổi bật</h3 >
							</div>
							<!-- block title end -->
							<!-- block carousel start -->
							<div class="block-carousel">
								<div class="block-content">
									<!-- single block start -->
									<?php foreach ($Product_hot as $item):?>
									<div class="single-block">
										<div class="block-image pull-left">
											<a href="./book-details.php?id=<?php echo $item['pro_id'] ?>"><img src="<?php echo pare_url_file($item['pro_avatar'],'product'); ?>" alt="" /></a>
										</div>
										<div class="category-info">
											<h3><a href="./book-details.php?id=<?php echo $item['pro_id'] ?>"><?php echo $item['pro_name']; ?></a></h3>
											<a href="" class="pro_hot_description"><?php echo $item['pro_description']; ?></a>
											<div class="cat-rating">
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
											</div>								
										</div>
									</div>
								<?php endforeach; ?>
									<!-- single block end -->
								</div>
							</div>
							<!-- block carousel end -->
						</div>
					</div>
					<div class="col-md-9">
						<!-- unit banner area end -->
						<!-- product section start -->
						<div class="our-product-area">
							<!-- area title start -->
							<!-- <div class="area-title"> -->
							<div style="margin-top: 9%">
								<!-- <h2>Mới nhất</h2> -->
							</div>
							<!-- area title end -->
							<!-- our-product area start -->
							<div class="row">
								<div class="col-md-12">
									<div class="features-tab">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs">
											<li role="presentation" class="active"><a href="#home" data-toggle="tab">Mới nhất</a></li>
											<li role="presentation"><a href="#profile" data-toggle="tab">Xem nhiều</a></li>
										</ul>
										<!-- Tab panes -->
										<!-- Tab panes -->
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane fade in active" id="home">
												<div class="row">
													<div class="featuresthree-curosel">
														<!-- sản phẩm đưa ra đây -->
														<?php foreach ($Product_new as $pro_new): ?>
														<div class="col-lg-12 col-md-12">
															<!-- single-product start -->
															<div class="single-product first-sale">
																<div class="product-img">
																	<a href="./book-details.php?id=<?php echo $pro_new['pro_id'] ?>">
																		<img class="primary-image" src="<?php echo pare_url_file($pro_new['pro_avatar'],'product'); ?>" alt="" />
																	</a>
																</div>
																<div class="product-content">
																	<h2 class="product-name"><a href="./book-details.php?id=<?php echo $pro_new['pro_id'] ?>"><?php echo $pro_new['pro_name']; ?></a></h2>
																	<span class="pro_hot_description"><?php echo $pro_new['pro_description']; ?></span>
																</div>
															</div>
														</div>
														<?php endforeach ?>
														
														<!-- single-product end -->
													</div>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane fade" id="profile">
												<div class="row">
													<div class="featuresthree-curosel">
														<!-- sản phẩm đưa ra đây -->
														<?php foreach ($Product_new as $pro_new): ?>
														<div class="col-lg-12 col-md-12">
															<!-- single-product start -->
															<div class="single-product first-sale">
																<div class="product-img">
																	<a href="./book-details.php?id=<?php echo $pro_new['pro_id'] ?>">
																		<img class="primary-image" src="<?php echo pare_url_file($pro_new['pro_avatar'],'product'); ?>" alt="" />
																	</a>
																</div>
																<div class="product-content">
																	<h2 class="product-name"><a href="./book-details.php?id=<?php echo $pro_new['pro_id'] ?>"><?php echo $pro_new['pro_name']; ?></a></h2>
																	<span class="pro_hot_description"><?php echo $pro_new['pro_description']; ?></span>
																</div>
															</div>
														</div>
														<?php endforeach ?>
														
														<!-- single-product end -->
													</div>
												</div>
											</div>
										</div>
									</div>				
								</div>
							</div>
							<!-- our-product area end -->
						</div>
						<!-- product section end -->
						<!-- banner-area start -->
						<div class="banner-area">
							<a href=""><img src="<?php echo base_url() ?>/view/book_store/theme/img/banner/3.jpg" alt="" /></a>
						</div>
						<!-- banner-area end -->
					</div>
				</div>
			</div>
		</div>
<?php include_once 'layout/footer.php'; ?>
	