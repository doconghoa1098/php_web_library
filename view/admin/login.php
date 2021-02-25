<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="<?php echo base_url() ?>/view/admin/theme_admin/css/toastr.min.css" rel="stylesheet" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/view/admin/theme_admin/js/toastr.min.js?>"></script>      
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style type="text/css">
    body{
        background-image: url("<?php echo base_url() ?>view/img/4.jpg");
        background-attachment: fixed;
    }
    .form_login{
        background-image: url("<?php echo base_url() ?>view/img/1.jpg");
        background-size: 100%;
          border-radius: 25px;

    }
    .panel-title{color: #def00b; font-weight: bold;}
    .errors-text{color: #d3fd0a;font-style: italic; font-size: 13px; margin:-2% 0px 2% 10%}
</style>
<!------ Include the above in your HEAD tag ---------->
<title>Trang Quản Trị</title>

<body>

<div class="container" style="margin-top: 200px;">
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default form_login" >
            <div class="form_login panel-heading">
                <div class="panel-title text-center">ĐĂNG NHẬP TRANG QUẢN TRỊ</div>
            </div>

            <div class="panel-body" >
                <?php if(isset($_SESSION['error'])) :?>
                <div class="alert alert-danger">
                    <strong>Error! </strong><?php echo $_SESSION['error'];unset($_SESSION['error']) ?>
                </div>
            <?php endif ?>

                <form action="" name="form" id="form" class="form-horizontal" method="POST">
                    <div class="input-group" style="margin-bottom: 15px">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="user" type="email" class="form-control" name="email" value="" placeholder="Email...">
                    </div>
                    <?php if (isset($error['email'])) :?>
                        <div class="errors-text" ><?php echo $error['email']; ?></div>
                    <?php endif ?>

                    <div class="input-group" style="margin-bottom: 15px">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password..." >
                    </div>
                    <?php if (isset($error['password'])) :?>
                            <div class="errors-text"><?php echo $error['password']; ?></div>
                    <?php endif ?>
                   <!--  <div class="g-recaptcha" data-sitekey="" style="margin-bottom: 15px"></div>
                    <?php if (isset($error['capcha'])) :?>
                            <div class="errors-text">
                                <?php echo $error['capcha']; ?>
                            </div>
                    <?php endif ?> -->

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">

                            <button type="submit" href="#" class="btn btn-primary pull-right">
                                <i class="glyphicon glyphicon-log-in"></i> Đăng nhập</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<div id="particles"></div>
</body>

