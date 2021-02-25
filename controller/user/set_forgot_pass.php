<?php
    include_once '../../model/autoload.php';
    include_once '../../view/user/menu.php';



    $data =[ 
        "u_password"      => postInput("new_password"), 
        "u_code"          => getInput("code"),
        "u_email"          => getInput("mail"),
        "u_time_code"     => '',
      ];
      $is_check = $db->fetchOne("users"," u_code='".$data['u_code']."' ");
      $time_revice_code= $is_check['u_time_code'];
      $sosanh_time = date_diff(date_create($is_check['u_time_code']), date_create(date('Y-m-d H:i:s',time())));
    //kiểm tra thời gian gửi mail sống
      $check_Y = (intval($sosanh_time->format('%Y'))==0) ? 0 : 1;
      $check_m = (intval($sosanh_time->format('%m'))==0) ? 0 : 1;
      $check_d = (intval($sosanh_time->format('%d'))==0) ? 0 : 1;
      $check_H = (intval($sosanh_time->format('%H'))==0) ? 0 : 1;
      $check_i = (intval($sosanh_time->format('%i'))>10)  ? 0 : 1;
      //0 đúng - 1 sai
      // _debug($check_Y);
      // _debug($check_m);
      // _debug($check_d);
      // _debug($check_H);
      // _debug($check_i);
      if($time_revice_code==NULL || $check_Y==1 || $check_m==1 || $check_d==1 || $check_H==1 || $check_i==0 ) {
          echo  "<script>alert('Link không tồn tại!!!!');location.href='about.php'</script>";
   } else {
    //ktra submit
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
          $secret='??????';
          $verifyResponse = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response'] );
          $responseData   = json_decode( $verifyResponse );
          if(!$responseData->success){
             $error['capcha'] = "Bạn chưa xác minh capcha";
          }
         if (postInput("conf_new_password") == '') {
           $error['conf_new_password'] = "Xác nhận lại mật khẩu không được để trống !!!";
         }
         if (postInput("conf_new_password") != $data['u_password']) {
           $error['conf_new_password'] = "Xác nhận mật khẩu sai !!!";
         }
         $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
         if ($data['u_password'] == '') {
           $error['new_password'] = "Mật khẩu không được để trống !!!";
         }
         elseif (!preg_match($pattern,$data['u_password'])) {
           $error['new_password'] = "Mật khẩu phải có ít nhất 8 ký tự bao gồm chữ hoa,chữ thường và ký tự đặc biệt !!!";
         }
         else{
            $data['u_password']= MD5($data['u_password']);
            $data['u_code'] = '';
         }
      
          if (empty($error))
          {
            $update = $db->update("users",$data,array("u_email"=>$data['u_email']));
            echo "<script> alert('Cập nhật mật khẩu thành công!!!');location.href='./login.php' </script>";
            // if ($update > 0) {
            //   $_SESSION['success']="Cập nhật mật khẩu thành công";
            //   echo "<script> alert('Cập nhật mật khẩu thành công!!!');location.href='./login.php' </script>"; 
            // } else {
            //     $_SESSION['error']="Cập nhật mật khẩu thất bại"; //có thể xảy ra lỗi do trùng mật khẩu cũ 
            // }
          }
      }
    include_once '../../view/user/set_forgot_pass.php';
   }
?>