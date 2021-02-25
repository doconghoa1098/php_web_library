
<?php include_once 'layout/header.php';?> 
<?php if (!empty($product)): ?>
		<!-- header area end -->
		<!-- breadcrumbs area start -->

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="container-inner">
							<ul>
								<li class="home">
									<a href="./index.php">Trang chủ</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span><?php echo $product['pro_name']; ?></span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- product-details Area Start -->
		<div class="product-details-area">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12" style="margin-left: 1%">
						<div class="zoomWrapper">
							<div id="img-1" class="zoomWrapper single-zoom">
								<a href="#">
									<img id="zoom1" src="<?php echo pare_url_file($product['pro_avatar'],'product'); ?>" >
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="product-list-wrapper">
							<div class="single-product">
								<div class="product-content">
									<a href="#"><h3 class="" style="color: #e01212"><?php echo $product['pro_name']; ?></h3></a>
									<!-- <h2 class="product-name"><a href="#">TIN HỌC ĐẠI CƯƠNG</a></h2> -->
									<div class="rating-price">	
										<div class="pro-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>
									</div>
									<div class="product-desc">
										<div><?php echo $product['pro_name']; ?></div>
										<div><?php echo $product['pro_name']; ?></div>
										<div><?php echo $product['pro_name']; ?></div>
									</div>
									<?php if($product['pro_number']>0): ?>
									<p class="availability in-stock">Trạng thái: <span>Có sẵn</span></p>
									<div class="actions-e">
										<div class="action-buttons-single">
											<form action="./action.php?action=addcart" method="post">
											<div class="inputx-content">
												<label for="qty">Số lượng:</label>
												<input type="hidden" name="id" value="<?php echo $product['pro_id']?>">
												<input type="number" name="qty" min="1" value="1" title="Qty" class="input-text qty">
											</div>
											<div class="add-to-cart ">
												<!-- <a href="#" class="muahang">Thêm vào phiếu mượn</a> -->
												<input type="submit" value="Thêm vào phiếu mượn" class="addbookcart" ></input>

											</div>
											
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>								
											</div>
											</form>
										</div>
									</div>
									<?php else: ?>
										<p class="availability in-stock">Trạng thái: <span>Hết</span></p>
										<div class="actions-e">
											<div class="action-buttons-single">
												<div class="add-to-links">
													<div class="add-to-wishlist">
														<a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
													</div>								
												</div>
											</div>
										</div>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="single-product-tab">
						  <!-- Nav tabs -->
						<ul class="details-tab">
							<li class="active"><a href="#home" data-toggle="tab">Description</a></li>
							<li class=""><a href="#messages" data-toggle="tab"> Review (1)</a></li>
						</ul>
						  <!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="product-tab-content">
									<p><?php echo $product['pro_description']; ?></p>	
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="messages">
								<div class="single-post-comments col-md-6 col-md-offset-3">
									<div class="comments-area">
										<h3 class="comment-reply-title">1 REVIEW FOR TURPIS VELIT ALIQUET</h3>
										<div class="comments-list">
											<ul>
												<li>
													<div class="comments-details">
														<div class="comments-list-img">
															<img src="<?php echo base_url() ?>/view/book_store/theme/img/logo.png" alt="">
														</div>
														<div class="comments-content-wrap">
															<span>
																<b><a href="#">Admin - </a></b>
																<span class="post-time">October 6, 2020 at 1:38 pm</span>
															</span>
															<p>Đỗ CÔNG HÒA - AT130923</p>
														</div>
													</div>
												</li>									
											</ul>
										</div>
									</div>
									<div class="comment-respond">
										<h3 class="comment-reply-title">Add a review</h3>
										<form action="#">
											<div class="row">
												<div class="col-md-12">
													<p>Your Rating</p>
													<div class="pro-rating">
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star-o"></i></a>
														<a href="#"><i class="fa fa-star-o"></i></a>
													</div>
												</div>
												<div class="col-md-12 comment-form-comment">
													<p>Your Review</p>
													<textarea id="message" cols="30" rows="10"></textarea>
													<input type="submit" value="Submit">
												</div>
											</div>
										</form>
									</div>						
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
<?php endif; ?>
	<?php include_once 'layout/footer.php'; ?>