<?php
    include_once '../../model/autoload.php';
    include_once '../../view/user/menu.php';
    // _debug(isset($_SESSION['name_email'])&&$_SESSION['name_active']==1); //tk chưa active vẫn vào tạo tk mới
	if (isset($_SESSION['name_email']) && $_SESSION['name_active']==1) {
      echo  "<script>alert('Bạn đã đăng nhập,thoát trước để đăng ký');location.href='about.php'</script>";
    }

    $data =
        [
            "u_name"          => postInput("username"),
            "u_email"         => postInput("email"),
            "u_password"      => postInput("password"),
            "u_phone"         => postInput("phone"),
            "u_date"       	  => postInput("date"),
            "u_address"       => postInput("address"),
            // "u_avatar"        => postInput("u_avatar"),
        ];
        // _debug($data);
    //ktra submit
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    { //thay bằng required="name" bên html nên bỏ mấy hàm check trống
      $error =[];
      $secret='??????';
      $verifyResponse = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response'] );
      $responseData   = json_decode( $verifyResponse );
      if(!$responseData->success){
         $error['capcha'] = "Bạn chưa xác minh capcha";
      }
       if ($data['u_name'] == '') {
         $error['u_name'] = "Username không được để trống !!!";
       }
       if (strlen($data['u_name']) > 17) {
         $error['u_name'] = "Username quá dài !!!";
       }
       if ($data['u_email'] == '') {
         $error['u_email'] = "Email không được để trống !!!";
       }
       else
       {
           $is_check = $db->fetchOne("users"," u_email= '".$data['u_email']."'  " );
           if ($is_check !=NULL)
           {
              $error['u_email']="Email đã tồn tại !!!";
           }
       }

       if (postInput("repassword") == '') {
         $error['re_password'] = "Xác nhận lại mật khẩu !!!";
       }
       if (postInput("repassword") != $data['u_password']) {
         $error['re_password'] = "Xác nhận mật khẩu sai !!!";
       }
       $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
       if ($data['u_password'] == '') {
         $error['u_password'] = "Mật khẩu không được để trống !!!";
       }
       elseif (!preg_match($pattern,$data['u_password'])) {
         $error['u_password'] = "Mật khẩu phải có ít nhất 8 ký tự bao gồm chữ hoa,chữ thường và ký tự đặc biệt !!!";
       }
       else{
          $data['u_password']= MD5(postInput("password"));
       }

       $phone_validate = preg_replace("/[^0-9]/", '', $data['u_phone']);
       if ($phone_validate == '') {
         $error['u_phone'] = "Số điện thoại không được để trống !!!";
       }
       if (strlen($phone_validate) != 10){
          $error['u_phone'] = "Số điện thoại chỉ 10 số  !!!";
       } 
       if ($data['u_address'] == '') {
         $error['u_address'] = "Địa chỉ không được để trống !!!";
       }
       if ($data['u_date'] == '') {
         $error['u_date'] = "Ngày sinh chưa chọn !!!";
       }
        if (empty($error))
        {
           $id_insert = $db->insert("users",$data);
           if ($id_insert > 0) {
             
              //gửi mail active
                $to = $data['u_email']; //đc người nhận
                $subject = 'Active tài khoản';  //tiêu đề
                $code = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);
                $message = "<div style='font-size:20px'>Mã active tài khoản của bạn là: <b style='color:red;font-size: 60px;'> $code</b></div>";
                include_once 'send_email.php';
      //đưa time gửi active vào db cột u_time_code
                 $time_code = date('Y-m-d H:i:s');
                 $update = $db->update("users",["u_time_code" => $time_code],array("u_email"=>$to));
              
              //đưa vào session để sang active check
               $_SESSION['name_email'] = $data['u_email']; 
               $_SESSION['code'] =$code;
               $_SESSION['type_mail'] = "active";
               // $_SESSION['success']= "Code active đã được gửi đến mail của bạn!!! Hãy check mail !!!";   
          // chuyển hướng
              echo "<script> alert('Đăng ký thành công! Mời bạn active tài khoản!!!');location.href='./active.php'</script>" ;
           }
           else {
             echo "Đăng ký thất bại";
           }
        }
    }
	include_once '../../view/user/register.php';
?>