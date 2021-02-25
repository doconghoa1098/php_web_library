<!-- register-->
    <section class="resume-section" id="register">
        <div class="resume-section-content">
            <h2 class="mb-5">register</h2>
            <form action="#" method="POST">
                <div class="row">
                    <div class="login-input">
                    <input class="input100" type="text" name="username" placeholder="Username" value="<?php echo postInput("username"); ?>">
                    <span class="symbol-input"><i class="fa fa-user " aria-hidden="true"></i></span>
                    <?php if (isset($error['u_name'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['u_name']; ?></p>
                    <?php endif ?>
                    </div>
                    <div class="login-input">
                    <input class="input100" type="email" name="email" placeholder="Email" value="<?php echo postInput("email"); ?>">
                    <span class="symbol-input"> <i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <?php if (isset($error['u_email'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['u_email']; ?></p>
                    <?php endif ?>
                    </div>
                </div>
                <div class="row">
                    <div class="login-input" alt="Bao gồm chữ hoa,chữ thường,ký tự đặc biệt và tối thiểu 8 ký tự">
                        <input class="input100" type="password" name="password" placeholder="Password" value="<?php echo postInput("password"); ?>">
                        <span class="symbol-input"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <span class="symbol-input"><a href="javascript:void(0)" style=""><i class="fa fa-eye" style="position: absolute;left: 32rem;"></i></a></span>
                        <?php if (isset($error['u_password'])) :?>
                          <p class="text-danger txt-error"><?php echo $error['u_password']; ?></p>
                        <?php endif ?>
                    </div>
                    <div class="login-input">
                        <input class="input100" type="number" name="phone" placeholder="Phone" value="<?php echo postInput("phone"); ?>">
                        <span class="symbol-input"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <?php if (isset($error['u_phone'])) :?>
                          <p class="text-danger txt-error"><?php echo $error['u_phone']; ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row">
                    <div class="login-input" alt="Bao gồm chữ hoa,chữ thường,ký tự đặc biệt và tối thiểu 8 ký tự">
                        <input class="input100" type="password" name="repassword" placeholder="Re_Password" value="<?php echo postInput("repassword"); ?>">
                        <span class="symbol-input"><i class="fa fa-lock" aria-hidden="true"></i></span>
                         <span class="symbol-input"><a href="javascript:void(0)" style=""><i class="fa fa-eye" style="position: absolute;left: 32rem;"></i></a></span>
                        <?php if (isset($error['re_password'])) :?>
                          <p class="text-danger txt-error"><?php echo $error['re_password']; ?></p>
                        <?php endif ?>
                    </div>
                    <div class="login-input">
                        <input class="input100" type="date" name="date" placeholder="Date" value="<?php echo postInput("date"); ?>">
                        <span class="symbol-input"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                        <?php if (isset($error['u_date'])) :?>
                          <p class="text-danger txt-error"><?php echo $error['u_date']; ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row">
                    <div class="login-input">
                        <input class="input100" type="text" name="address" placeholder="Address" value="<?php echo postInput("address"); ?>">
                        <span class="symbol-input"><i class="fa fa-address-book" aria-hidden="true"></i></span>
                        <?php if (isset($error['u_address'])) :?>
                          <p class="text-danger txt-error"><?php echo $error['u_address']; ?></p>
                        <?php endif ?>
                    </div>
                    <div class="login-input">
                        <input class="input100" type="file" name="u_avatar" style="padding-top: 10px;">
                        <span class="symbol-input"><i class="fa fa-file-image" aria-hidden="true"></i></span>
                        
                    </div>
                </div><p style="margin-bottom: 3px"></p>
                <div class="g-recaptcha" data-sitekey=""></div> 
                <?php if (isset($error['capcha'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['capcha']; ?></p>
                    <?php endif ?>  
                <div class="">
                    <button class="login-btn btn btn-primary">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </section>
    <hr class="m-0" />
    </div>
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script>
        $(function(){
            $(".login-input a").click(function () {
                let $this = $(this);
                if($this.hasClass('active'))
                {
                    $this.parents('.login-input').find('input').attr('type','text')
                    $this.removeClass('active');
                }else
                {
                    $this.parents('.login-input').find('input').attr('type','password')
                    $this.addClass('active');
                }
            });
        })
</script>
<!-- Core theme JS-->
<!-- <script src="../../view/js/scripts.js"></script> -->
</body>
</html>