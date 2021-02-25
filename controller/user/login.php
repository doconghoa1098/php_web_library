<?php
    include_once '../../model/autoload.php';
    include_once '../../view/user/menu.php';
    // _debug($db->fetchOne("user","u_id='1'"));
    if (isset($_SESSION['name_user'])) {
      echo  "<script>alert('Bạn đã đăng nhập');location.href='about.php'</script>";
    }
    $data =
        [
            "email"         => postInput("email"),
            "password"      => postInput("password"),
        ];
    //ktra submit
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $error=[];
      $secret='?????????';
      $verifyResponse = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response'] );
      $responseData   = json_decode( $verifyResponse );
      if(!$responseData->success){
         $error['capcha'] = "Bạn chưa xác minh capcha";
      }
      if ($data['email'] == '') {
        $error['email'] = "Email không được để trống !!!";
      }
      if ($data['password'] == '') {
        $error['password'] = "Mật khẩu không được để trống !!!";
      }
      if (empty($error))
      {
     $is_check = $db->fetchOne("users"," u_email= '".$data['email']."' AND u_password= '".md5($data['password'])."' " );
          if ($is_check !=NULL && intval($is_check['u_active']) ==1 && intval($is_check['u_is_lock']) ==0){
              $_SESSION['name_user']     = $is_check['u_name'];
              $_SESSION['name_id']       = $is_check['u_id'];
              $_SESSION['name_email']    = $is_check['u_email'];
              $_SESSION['name_password'] = $is_check['u_password'];
              $_SESSION['name_active']   = $is_check['u_active'];
              echo "<script> alert('Đăng nhập thành công'); location.href='./about.php' </script>" ;
          }elseif ($is_check !=NULL && intval($is_check['u_active']) ==0 && intval($is_check['u_is_lock']) ==0) {
              $_SESSION['name_active']   = $is_check['u_active'];
          //gửi mail active
              $to = $is_check['u_email']; //đc người nhận
              $subject = 'Active tài khoản';  //tiêu đề   
              $code = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);
              $message = "<div style='font-size:20px'>Mã active tài khoản của bạn là: 
              <b style='color:red;font-size: 60px;'> $code</b></div>";   //nội dụng mail
              include_once 'send_email.php';    
          //đưa time gửi active vào db cột u_time_code để check tg hết hạn của code
              $time_code = date('Y-m-d H:i:s');
              $update = $db->update("users",["u_time_code" => $time_code],array("u_email"=>$to));
              
              //đưa vào session để sang active check
            $_SESSION['name_email'] = $is_check['u_email'];
            $_SESSION['code'] =$code;
            $_SESSION['success']= "Code active đã được gửi đến mail của bạn !!! Hãy check mail !!! ";
          //chuyển hướng
              echo '<script> alert("Tài khoản chưa kích hoạt \n!!! Kích hoạt ngay !!!");location.href="./active.php"</script>' ;
        }elseif ($is_check !=NULL && intval($is_check['u_is_lock'])==1) {
             echo '<script> alert("Tài khoản của bạn bị khóa \n!!! Liên hệ admin để biết thêm!!!");location.href="./login.php"</script>' ;
        }
        else{
          $_SESSION['error']= "Email hoặc mật khẩu không đúng";
        }
      }
    }

    include_once '../../view/user/login.php';

?>