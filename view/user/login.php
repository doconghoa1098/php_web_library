<!-- login-->
    <section class="resume-section" id="login">
        <div class="resume-section-content">
            <h2 class="mb-5">Login</h2>
            <!-- Đăng nhập thành công đã alert nên không cần echo ra nữa, chỉ error lỗi ra thôi  -->
            <?php if(isset($_SESSION['error'])) :?>
                <div class="alert alert-danger">
                    <strong>Error! </strong><?php echo $_SESSION['error'];unset($_SESSION['error']) ?>
                </div>
            <?php endif ?>
            <form action="#" method="POST">
                <div class="login-input">
                    <input class="input100" type="email" name="email" placeholder="Email" 
                    value="<?php echo $data['email']; ?>">
                    <span class="symbol-input"><i class="fa fa-envelope " aria-hidden="true"></i></span>
                    <?php if (isset($error['email'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['email']; ?></p>
                    <?php endif ?>
                </div>
                <div class="login-input">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="symbol-input"> <i class="fa fa-lock" aria-hidden="true"></i></span>
                    <span class="symbol-input"><a href="javascript:void(0)" style=""><i class="fa fa-eye" style="position: absolute;left: 32rem;"></i></a></span>
                    <?php if (isset($error['password'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['password']; ?></p>
                    <?php endif ?>
                </div><p style="margin-bottom: 3px"></p>
                    <div class="g-recaptcha" data-sitekey=" "></div>
                    <?php if (isset($error['capcha'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['capcha']; ?></p>
                    <?php endif ?>      
                <div class="">
                    <button class="login-btn btn btn-primary">
                        Login
                    </button>
                </div>
                <div class="refer">
                    <div class="forgot">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="./forgot_pass.php" >
                            Username / Password?
                        </a>
                    </div>
                    <div class="register">
                        <a class="txt2" href="./register.php">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
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
<!-- Core theme JS-->
<!-- <script src="../../view/js/scripts.js"></script> -->
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
</body>
</html>
