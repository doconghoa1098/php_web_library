

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
                    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta content="" name="description">
        <meta content="" name="author">
        <!-- <link href="../../favicon.ico" rel="icon"> -->
        <link href="https://getbootstrap.com/docs/3.3/examples/dashboard/" rel="canonical">
        <title>Trang Quản Trị</title>
                                    <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() ?>/view/admin/theme_admin/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>/view/admin/theme_admin/css/dashboard.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>/view/admin/theme_admin/css/font-awesome.min.css" rel="stylesheet">
        <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" rel="stylesheet">
        <link href="<?php echo base_url() ?>/view/admin/theme_admin/css/toastr.min.css" rel="stylesheet" >
        <link href="<?php echo base_url() ?>/view/admin/theme_admin/css/style.css" rel="stylesheet" >
        <script src="<?php echo base_url() ?>/view/ckeditor/ckeditor.js"></script>
     <!--    script src="{{ asset('ckeditor/function.js') }}"></script>
        <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
        <script>tinymce.init({selector:'textarea'});</script> -->

    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top fix-color">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button aria-controls="navbar" aria-expanded="false" class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
                        <span class="sr-only">
                            Toggle navigation
                        </span>
                        <span class="icon-bar">
                        </span>
                        <span class="icon-bar">
                        </span>
                        <span class="icon-bar">
                        </span>
                    </button>
                    <a class="navbar-brand" href="#">
                    <?php if (isset($_SESSION['member_name'])) :?>
                        <b style="color: #12EE74;">Xin chào: </b>
                        <b style="color: #8cf807; font-size: 25px"><?php echo $_SESSION['member_name']; ?></b>
                        <?php if($_SESSION['member_roles']==1): ?>
                            <small title ="Admin">AD</small>
                        <?php else : ?>
                            <small title ="Nhân viên">NV</small>
                        <?php endif; ?>
                    <?php endif ?>
                        
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-fw fa-gear"></i> Settings
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fas fa-unlock-alt"></i> Đổi mật khẩu</a></li>
                                        <li><a href="<?php echo base_url() ?>controller/admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                                    </ul>
                                </a>
                            </li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="<?php echo url_no_php()=="http://localhost:8007/mvc/controller/admin/"? 'active':''?>">
                            <a href="<?php echo base_url() ?>controller/admin/">
                                Trang Tổng Quan
                                <span class="sr-only">
                                    (current)
                                </span>
                            </a>
                        </li>
                        <li class="<?php echo url_no_php()=="http://localhost:8007/mvc/controller/admin/member/"? 'active':''?>">
                            <a href="<?php echo base_url() ?>controller/admin/member/index.php">
                               Quản lý nhân viên
                            </a>
                        </li>
                        <li class="<?php echo url_no_php()=="http://localhost:8007/mvc/controller/admin/category/"? 'active':''?>">
                            <a href="<?php echo base_url() ?>controller/admin/category/index.php">
                               Quản lý thể loại sách
                            </a>
                        </li>
                        <li class="<?php echo url_no_php()=="http://localhost:8007/mvc/controller/admin/product/"? 'active':''?>">
                            <a href="<?php echo base_url() ?>controller/admin/product/index.php">
                               Quản lý sách
                            </a>
                        </li>
                        <li class="<?php echo url_no_php()=="http://localhost:8007/mvc/controller/admin/transaction/"? 'active':''?>">
                            <a href="<?php echo base_url() ?>controller/admin/transaction/index.php">
                               Quản lý phiếu mượn
                            </a>
                        </li>
                        <li class="<?php echo url_no_php()=="http://localhost:8007/mvc/controller/admin/users/"? 'active':''?>">
                            <a href="<?php echo base_url() ?>controller/admin/users/index.php">
                               Quản lý người dùng
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    