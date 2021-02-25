
    <!-- About-->
    <section class="resume-section" id="about">
        <div class="resume-section-content">
            <h1 class="mb-0">
                <?php if(isset($_SESSION['name_user'])) :?>
                    <span class="text-primary"><?php echo $_SESSION['name_user'] ?></span>
                <?php else : ?>
                    <span class="text-primary">WELCOME</span>
                <?php endif ?>
                <!-- <span class="text-primary">ĐỖ CÔNG HÒA</span> -->
            </h1>
            <div class="subheading mb-5">
                MÃ SV: AT130923 <br>
                STT: 07 <br>
                CLASS: Xây dựng ứng dụng web an toàn - L01<br>
                EMAIL: <a href="mailto:doconghoa1098@gmail.com">doconghoa1098@gmail.com</a>
            </div>
            <div class="social-icons">
                <a class="social-icon" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="social-icon" href="#"><i class="fab fa-github"></i></a>
                <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>
                <a class="social-icon" href="#"><i class="fab fa-facebook-f"></i></a>
            </div>
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