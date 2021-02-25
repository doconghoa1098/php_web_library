<!-- reset-->
    <section class="resume-section" id="reset">
        <div class="resume-section-content">
            <h2 class="mb-5">reset your password?</h2>
            <?php if(isset($_SESSION['name_email']) && $_SESSION['name_active']==1) :?>
                <?php if(isset($_SESSION['success'])) :?>
                <div class="alert alert-success">
                 <strong>Success! </strong><?php echo $_SESSION['success']; unset($_SESSION['success'])?>
                </div>
                <?php endif ?>
                <?php if(isset($_SESSION['error'])) :?>
                    <div class="alert alert-danger">
                        <strong>Error! </strong><?php echo $_SESSION['error'];unset($_SESSION['error']) ?>
                    </div>
                <?php endif ?>
                <form action="#" method="POST">
                <div class="login-input">
                    <input class="input100" type="email" name="email" placeholder="Email" readonly="" 
                    value="<?php echo $_SESSION['name_email'] ?>">
                    <span class="symbol-input"><i class="fa fa-envelope " aria-hidden="true"></i></span>
                </div>
                <div class="login-input">
                    <input class="input100" type="password" name="old_password" placeholder="Old_Password" value="<?php echo postInput("old_password"); ?>">
                    <span class="symbol-input"> <i class="fa fa-lock" aria-hidden="true"></i></span>
                    <span class="symbol-input"><a href="javascript:void(0)" style=""><i class="fa fa-eye" style="position: absolute;left: 32rem;"></i></a></span>
                    <?php if (isset($error['old_password'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['old_password']; ?></p>
                    <?php endif ?>

                </div>
                <div class="login-input">
                    <input class="input100" type="password" name="new_password" placeholder="New_Password" value="<?php echo postInput("new_password"); ?>">
                    <span class="symbol-input"> <i class="fa fa-lock" aria-hidden="true"></i></span>
                    <span class="symbol-input"><a href="javascript:void(0)" style=""><i class="fa fa-eye" style="position: absolute;left: 32rem;"></i></a></span>
                    <?php if (isset($error['new_password'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['new_password']; ?></p>
                    <?php endif ?>

                </div>
                <div class="login-input">
                    <input class="input100" type="password" name="conf_new_password" placeholder="Confirm_New_Password" value="<?php echo postInput("conf_new_password"); ?>">
                    <span class="symbol-input"> <i class="fa fa-lock" aria-hidden="true"></i></span>
                    <span class="symbol-input"><a href="javascript:void(0)" style=""><i class="fa fa-eye" style="position: absolute;left: 32rem;"></i></a></span>
                    <?php if (isset($error['conf_new_password'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['conf_new_password']; ?></p>
                    <?php endif ?>
                </div>

                <div class="">
                    <button class="login-btn btn btn-primary">
                        Confirm
                    </button>
                </div>
            </form>         
            <?php else : ?>
                <div class="subheading mb-5">
                	Chức năng này chỉ có khi đã đăng nhập
                </div>
            <?php endif ?>
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