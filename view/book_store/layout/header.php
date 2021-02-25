<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>DOCONGHOA - LIBRARY</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
        <!-- Favicon
		============================================ -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		
		<!-- Fonts
		============================================ -->
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
		
 		<!-- CSS  -->
		
		<!-- Bootstrap CSS
		============================================ -->      
        <link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/css/bootstrap.min.css">
        
		<!-- owl.carousel CSS
		============================================ -->      
        <link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/css/owl.carousel.css">
        
		<!-- owl.theme CSS
		============================================ -->      
        <link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/css/owl.theme.css">
           	
		<!-- owl.transitions CSS
		============================================ -->      
        <link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/css/owl.transitions.css">
        
		<!-- font-awesome.min CSS
		============================================ -->      
        <link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/css/font-awesome.min.css">
		
		<!-- font-icon CSS
		============================================ -->      
        <link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/fonts/font-icon.css">
		
		<!-- nivo slider CSS
		============================================ -->
		<link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/custom-slider/css/nivo-slider.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/custom-slider/css/preview.css" type="text/css" media="screen" />
        
 		<!-- animate CSS
		============================================ -->         
        <link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/css/animate.css">
		
		<!-- mobile menu CSS
		============================================ -->
		<link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/css/meanmenu.min.css">
        
 		<!-- normalize CSS
		============================================ -->        
        <link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/css/normalize.css">
   
        <!-- main CSS
		============================================ -->          
        <link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/css/main.css">
        
        <!-- style CSS
		============================================ -->          
        <link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/css/style.css">
        
        <!-- responsive CSS
		============================================ -->          
        <link rel="stylesheet" href="<?php echo base_url() ?>/view/book_store/theme/css/responsive.css">
        
        <script src="<?php echo base_url() ?>/view/book_store/theme/js/vendor/modernizr-2.8.3.min.js"></script>
        <link href="<?php echo base_url() ?>/view/admin/theme_admin/css/toastr.min.css" rel="stylesheet" >
    </head>
    <body class="home-three">
		<!-- header area start -->
		<header class="short-stor">
			<div class="container">
				<div class="row">
					<!-- logo start -->
					<div class="col-md-3 text-center">
						<div class="top-logo">
							<a href="./index.php" style="font-size: 20px;font-weight: 900;color: red;"><img src="<?php echo base_url() ?>/view/book_store/theme/img/dohoa.gif" alt=""  />DOCONGHOA</a>
						</div>
					</div>
					<!-- logo end -->
					<!-- mainmenu area start -->
					<div class="col-md-6 text-center">
						<div class="mainmenu">
							<nav>
								<ul>
									<li class="expand"><a href="./index.php">Trang chủ</a></li>
									<li class="expand"><a href="#">Thể loại sách</a>
										<ul class="restrain sub-menu">
											<?php foreach ($Category as $cate):?>
											<li><a href=""><?php echo $cate['cate_name']; ?></a></li>
										<?php endforeach; ?>
										</ul>
									</li>
									<li class="expand"><a href="#">Tin tức</a></li>
									<li class="expand"><a href="#">Giới thiệu</a></li>
									<li class="expand"><a href="#">Liên hệ</a></li>
								</ul>
							</nav>
						</div>
						<!-- mobile menu start -->
						<!-- mobile menu start -->
						<div class="row">
							<div class="col-sm-12 mobile-menu-area">
								<div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
									<span class="mobile-menu-title">Menu</span>
									<nav>
										<ul>
											<li class="expand"><a href="">Trang chủ</a></li>
											<li class="expand"><a href="">Thể loại sách</a>
												<ul>
													<li><a href="">AN TOÀN THÔNG TIN</a></li>
													<li><a href="">CÔNG NGHỆ THÔNG TIN</a></li>
													<li><a href="">ĐIỆN TỬ VIỄN THÔNG</a></li>
													<li><a href="">KHOA CƠ BẢN</a></li>
													<li><a href="">LÝ LUẬN CHÍNH TRỊ</a></li>
												</ul>
											</li>
											<li class="expand"><a href="#">Tin tức</a></li>
											<li class="expand"><a href="">Giới thiệu</a></li>
											<li class="expand"><a href="">Liên hệ</a></li>
										</ul>
									</nav>
								</div>						
							</div>
						</div>
						<!-- mobile menu end -->
						<!-- mobile menu end -->
					</div>
					<!-- mainmenu area end -->
					<!-- top details area start -->
					<div class="col-md-3 text-center">
						<div class="top-detail">
							
							 <div class="disflow dflt-src">
								<div class="header-search expand">
									<div class="search-icon fa fa-search"></div>
									<div class="product-search restrain">
										<div class="container nopadding-right">
											<form action="./search.php" id="searchform" method="get">
												<div class="input-group">
													<input type="text" name="book" class="form-control" placeholder="Search book">
													<span class="input-group-btn">
														<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
													</span>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>	
							<div class="disflow">	
							<div class="expand dropps-menu">
							<?php if (isset($_SESSION['name_user'])): ?>
								<a href="#">XIN CHÀO: <?php echo $_SESSION['name_user'] ; ?></a>
								<ul class="restrain language">
									<li><a href="<?php echo base_url() ?>/controller/book_store/cart.php"><i class="fa fa-ticket" aria-hidden="true"></i>  Phiếu mượn</a></li>
									<li><a href="<?php echo base_url() ?>/controller/book_store/view_order.php"><i class="fa fa-crosshairs" aria-hidden="true"></i>  Đang mượn</a></li>
									<li><a href="<?php echo base_url() ?>controller/user/logout.php"><i class="fa fa-user"></i>  Log out</a></li>
								</ul>
							<?php else:?>
								<a href="<?php echo base_url() ?>controller/user/login.php"><i class="fa fa-unlock"></i> Log in</a>
							<?php endif; ?>
							</div>
							</div>
						</div>
					</div>
					<!-- top details area end -->
				</div>
			</div>
		</header>
		<!-- header area end -->
		<!-- start home slider -->
        <div class="slider-area an-1 hm-1 clr">
             <!-- slider -->
			<div class="bend niceties preview-2">
				<div id="ensign-nivoslider" class="slides" style="width: 1920px;height: 450px;">	
					<img src="<?php echo base_url() ?>/view/book_store/theme/img/slider/1.jpg" alt="" title="#slider-direction-1"  />
					<img src="<?php echo base_url() ?>/view/book_store/theme/img/slider/2.jpg" alt="" title="#slider-direction-2"  />
				</div>
				<!-- direction 1 -->
				<div id="slider-direction-1" class="t-cn slider-direction">
					<div class="slider-progress"></div>
					<div class="slider-content t-lfl lft-pr s-tb slider-1">
						<div class="title-container s-tb-c title-compress">
							<h2 class="title1 low-f ">ĐỖ CÔNG HÒA</h2>
							<h1 class="title1 low-f" >MÃ SV: AT130923 </h1>
						</div>
					</div>	
				</div>
				<!-- direction 2 -->
				<div id="slider-direction-2" class="slider-direction">
					<div class="slider-progress"></div>
					<div class="slider-content t-lfl s-tb slider-2 lft-pr">
						<div class="title-container s-tb-c">
							<h2 class="title1 low-f">STT: 07</h2>
							<h1 class="title1 low-f">CLASS: XÂY DỰNG ỨNG DỤNG WEB AN TOÀN</h1>
						</div>
					</div>	
				</div>
			</div>
			<!-- slider end-->
		</div>
        <!-- end home slider -->