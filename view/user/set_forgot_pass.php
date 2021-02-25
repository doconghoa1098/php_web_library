<!-- reset-->
    <section class="resume-section" id="reset">
        <div class="resume-section-content">
            <h2 class="mb-5">Set your new password?</h2>
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
                    <input class="input100" type="password" name="new_password" placeholder="New_Password">
                    <span class="symbol-input"> <i class="fa fa-lock" aria-hidden="true"></i></span>
                    <?php if (isset($error['new_password'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['new_password']; ?></p>
                    <?php endif ?>

                </div>
                <div class="login-input">
                    <input class="input100" type="password" name="conf_new_password" placeholder="Confirm_New_Password">
                    <span class="symbol-input"> <i class="fa fa-lock" aria-hidden="true"></i></span>
                    <?php if (isset($error['conf_new_password'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['conf_new_password']; ?></p>
                    <?php endif ?>
                </div>
                <p style="margin-bottom: 3px"></p>
                    <div class="g-recaptcha" data-sitekey=" "></div>
                    <?php if (isset($error['capcha'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['capcha']; ?></p>
                    <?php endif ?> 

                <div class="">
                    <button class="login-btn btn btn-primary">
                        Confirm
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
<!-- Core theme JS-->
<!-- <script src="../../view/js/scripts.js"></script> -->
</body>
</html>