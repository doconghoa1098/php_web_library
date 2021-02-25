<?php
    include_once '../../model/autoload.php';
    include_once '../../view/user/menu.php';
    if (isset($_SESSION['name_email']) && $_SESSION['name_active']==1) {
      echo  "<script>alert('Bạn đã đăng nhập. Logout để sử dụng chức năng này');location.href='about.php'</script>";
    }

	$data =["email"         => postInput("email"),];
    //ktra submit
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $error=[];
      $secret='????????';
      $verifyResponse = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response'] );
      $responseData   = json_decode( $verifyResponse );
      if(!$responseData->success){
         $error['capcha'] = "Bạn chưa xác minh capcha";
      }
      if ($data['email'] == '') {
        $error['email'] = "Email không được để trống !!!";
      }
      else
       {
           $is_check = $db->fetchOne("users"," u_email= '".$data['email']."'  " );
           if ($is_check ==NULL)
           {
              $error['email']="Email chưa đăng ký tài khoản nào !!!";
           }
       }
      if (empty($error))
      {
    	$to = $data['email']; //đc người nhận
  		$subject = 'Lấy lại mật khẩu';  //tiêu đề
      $code = md5(time().$to);
      $code_hash = crypt('hoadzai_private_key', '$2y$10$'.$code.'$');
      $time_code = date('Y-m-d H:i:s');

      $data1=["u_code" => $code_hash,"u_time_code" => $time_code,];
      
      $update = $db->update("users",$data1,array("u_email"=>$to));
  		
      $message = "<div style='font-size:20px'>Truy cập vào <a href='http://localhost:8007/mvc/controller/user/set_forgot_pass.php?mail=$to&code=$code_hash' style='color:red;font-size: 30px'>đây</a> để đặt mật khẩu</div>";
      $_SESSION['type_mail'] = "forgot_pass";
		include_once './send_email.php';
        
      }
    }


    include_once '../../view/user/forgot_pass.php'
 ?>