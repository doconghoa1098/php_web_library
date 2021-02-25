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
								<li class="category3"><span>Lịch sử mượn</span></li>
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
										<th width="5%">STT</th>
										<th width="20%">Image</th>
										<th>Tên sách</th>
										<th>Số lượng</th>
										<th width="15%">Trạng thái</th>
										<th width="15%">Tác vụ</th>
									</tr>
								</thead>
								<tbody>
									<?php if (isset($transaction) ): $stt=1;
										foreach ($transaction as $item):  ?>
									<tr>
										<td><?php echo $stt; ?></td>
										<td>
											<a href="#"><img src="<?php echo pare_url_file($item['pro_avatar'],'product'); ?>" class="" alt=""/></a>
										</td>
										<td>
											<h5><?php echo $item['pro_name']; ?></h5>
										</td>
										<td><h5><?php echo $item['qty'] ?></h5></td>
										<td>
											<?php if ($item['tr_status']==0): ?>
												<span class="btn btn-xs btn-info">Đợi duyệt</span><br>
												<?php echo date("d/m/Y H:i:s",strtotime($item['or_create_at'])); ?>
											<?php elseif ($item['tr_status']==1): ?>
												<span class="btn btn-xs btn-primary">Đã mượn</span>
												<?php echo date("d/m/Y H:i:s",strtotime($item['tr_update_at'])); ?>
											<?php elseif ($item['tr_status']==2): ?>
												<span class="btn btn-xs btn-primary">Đã trả</span>
											<?php endif; ?>
										</td>
										<td>
											<?php if ($item['tr_status']==0): ?>
												<a href="./action.php?transaction_id=<?php echo $item['transaction_id'] ?>&or_id=<?php echo $item['or_id'] ?>&qty=<?php echo $item['qty'] ?>&tr_quantity=<?php echo $item['tr_quantity'] ?>&action=cancel" class="btn btn-xs btn-danger" ></i>Hủy</a>
											<?php elseif ($item['tr_status']==1): ?>
												<a href="#" class="btn btn-xs btn-danger" ></i>Trả sách</a>
											<?php endif ?>
				                    	</td>
									</tr>
								<?php $stt++; endforeach ; endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Shopping Cart Table -->
				<!-- Shopping Coupon -->
				<!-- Shopping Coupon -->
			</div>	
		</div>
		<!-- Shopping Table Container -->
		<!-- FOOTER START -->



<?php include_once 'layout/footer.php'; ?>