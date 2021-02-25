<?php include_once 'layout/header.php'; ?>

<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="container-inner">
							<ul>
								<li class="home">
									<a href="./index.html">Home</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>Phiếu mượn</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- Shopping Table Container -->
		<div class="cart-area-start">
			<div class="container">
				<!-- Shopping Cart Table -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="cart-table">
								<thead>
									<tr>
										<th>STT</th>
										<th width="20%">Image</th>
										<th>Tên sách</th>
										<th>Số lượng</th>
										<th width="20%">Tác vụ</th>
									</tr>
								</thead>
								<tbody>
									<?php if (isset($_SESSION['cart'] ) && count($_SESSION['cart']) > 0 ): $stt=1;
									$sumqty=0; foreach ($_SESSION['cart'] as $key => $value):  ?>
									<tr>
										<td><?php echo $stt; ?></td>
										<td>
											<a href="#"><img src="<?php echo pare_url_file($value['pro_avatar'],'product'); ?>" class="" alt=""/></a>
										</td>
										<td>
											<h6><?php echo $value['pro_name']; ?></h6>
										</td>
										<td>
										<form action="action.php?action=edit" method="POST">
										<input type="hidden" name="id" value="<?php echo $value['pro_id'];?>"/>
										<input type="number" placeholder="1" min="1" name="qty_new" value="<?php echo $value['pro_qty'] ?>"/>
										</td>
										<td>
											<input type="submit" class="btn btn-xs btn-primary"id="cart_action" value="Cập nhật"/></form>
				                        	<a href="./action.php?key=<?php echo $key ?>&action=delete" class="btn btn-xs btn-danger" ></i>Xóa</a>
				                    	</td>
									</tr>
									<?php $sumqty+= $value['pro_qty']; $_SESSION['sumqty'] = $sumqty; ?>
								<?php  $stt++; endforeach ; endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Shopping Cart Table -->
				<!-- Shopping Coupon -->
				<?php if (isset($_SESSION['cart'] ) && count($_SESSION['cart']) > 0 ): ?>
				<div class="row">
					<div class="col-sm-5 pull-right">
						<li class="list-group-item pull-right">
                            <a href="./index.php" class="btn btn-primary">Tiếp tục xem sách</a>
                            <a href="./action.php?action=confirm_cart" class="btn btn-warning">Xác nhận gửi phiếu mượn</a>
                        </li>
						<!-- Shopping Totals -->
					</div>
				</div>
			<?php endif; ?>
				<!-- Shopping Coupon -->
			</div>	
		</div>
		<!-- Shopping Table Container -->
		<!-- FOOTER START -->



<?php include_once 'layout/footer.php'; ?>