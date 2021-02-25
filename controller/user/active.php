<?php
    include_once '../../model/autoload.php';
    include_once '../../view/user/menu.php';
    $is_check = isset($_SESSION['name_email'])?$db->fetchOne("users"," u_email= '".$_SESSION['name_email']."'  " ):1;
    $sosanh_time = date_diff(date_create($is_check['u_time_code']), date_create(date('Y-m-d H:i:s',time())));
  //kiểm tra thời gian gửi mail sống
    $check_Y = (intval($sosanh_time->format('%Y'))==0) ? 0 : 1;
    $check_m = (intval($sosanh_time->format('%m'))==0) ? 0 : 1;
    $check_d = (intval($sosanh_time->format('%d'))==0) ? 0 : 1;
    $check_H = (intval($sosanh_time->format('%H'))==0) ? 0 : 1;
    $check_i = (intval($sosanh_time->format('%i'))>10)  ? 0 : 1;
    //0 đúng - 1 sai  - u_active =1 là tk đã active
    // _debug($is_check['u_active']);
    if($is_check['u_active']==1 || $check_Y==1 || $check_m==1 || $check_d==1 || $check_H==1 || $check_i==0 ) {
        echo  "<script>alert('Link không tồn tại!!!!');location.href='about.php'</script>";
   }else{
    //ktra submit
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      { 
         $code_active=postInput("code_active");
         $error =[];
         $secret='????????';
      $verifyResponse = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response'] );
      $responseData   = json_decode( $verifyResponse );
      if(!$responseData->success){
         $error['capcha'] = "Bạn chưa xác minh capcha";
      }
         if ($code_active== '') {
           $error['code_active'] = "Chưa nhập code active !!!";
         }
         if (empty($error)){
            if (isset($_SESSION['code'])&&$code_active==$_SESSION['code']) {
              $update = $db->update("users",["u_active" => 1],array("u_email"=>$_SESSION['name_email']));
              unset($_SESSION['code']);
              unset($_SESSION['name_email']);

              echo "<script> alert('Kích hoạt tài khoản thành công!!!'); location.href='./login.php'</script>";
            } else {
              $_SESSION['error']= "Sai mã active !!!";
            }
            
         }
      }
    }
    include_once '../../view/user/active.php';
?>