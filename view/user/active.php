<!-- reset-->
    <section class="resume-section" id="reset">
        <div class="resume-section-content">
            <?php if(isset($_SESSION['name_email'])) :?>
            <h2 class="mb-5">ACTIVE YOUR ACCOUNT</h2>
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
                    <input class="input100" type="text" name="code_active" placeholder="Code Active">
                    <span class="symbol-input"> <i class="fa fa-lock" aria-hidden="true"></i></span>
                    <?php if (isset($error['code_active'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['code_active']; ?></p>
                    <?php endif ?>

                </div><p style="margin-bottom: 3px"></p>
                <div class="g-recaptcha" data-sitekey=""></div> 
                <?php if (isset($error['capcha'])) :?>
                      <p class="text-danger txt-error"><?php echo $error['capcha']; ?></p>
                    <?php endif ?> 
                <div class="">
                    <button class="login-btn btn btn-primary">
                        ACTIVE
                    </button >
                    <a class="text-primary" href="./forgot_pass.php" >
                    <button class="btn btn-default" style="margin-left: 20%;">
                     Gửi lại code???</button> </a>
                
                </div>    
            </form>         
            <?php else : ?>
                <script> alert('Trang không tồn tại!!!');location.href='./about.php' </script>
                <h2 class="mb-5">TRANG KHÔNG TỒN TẠI</h2>
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
</body>
</html>