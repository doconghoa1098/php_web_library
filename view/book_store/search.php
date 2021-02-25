<?php include_once 'layout/header.php';?> 
<div class="our-product-area">
			<div class="container">
				<!-- area title start -->
				<div class="area-title">
					<h2 style="color: #0339E9">Sách tìm thấy</h2>
				</div>
				<div class="row">
								<div class="col-md-12">
									<div class="features-tab">
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane fade in active" id="home">
												<div class="row">
													<div class="featuresthree-curosel">
														<!-- sản phẩm đưa ra đây -->
														<?php foreach ($pro_search as $item): ?>
														<div class="col-lg-12 col-md-12">
															<!-- single-product start -->
														<div class="single-product first-sale"style="margin-bottom:25%;">
																<div class="product-img">
																	<a href="./book-details.php?id=<?php echo $item['pro_id'] ?>">
																		<img class="primary-image" src="<?php echo pare_url_file($item['pro_avatar'],'product'); ?>" alt="" />
																	</a>
																</div>
																<div class="product-content">
																	<h2 class="product-name"><a href="./book-details.php?id=<?php echo $item['pro_id'] ?>"><?php echo $item['pro_name']; ?></a></h2>
																	<span class="pro_hot_description"><?php echo $item['pro_description']; ?></span>
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
		</div>
<?php include_once 'layout/footer.php';?> 