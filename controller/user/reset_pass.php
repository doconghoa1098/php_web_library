<?php
    include_once '../../model/autoload.php';
    include_once '../../view/user/menu.php';
    //bật nếu update bằng id như dòng 41 dưới
   // $id = '';
   //  if (isset($_SESSION['name_id'])) {
   //    $id = intval($_SESSION['name_id']);
   //  }
    
    $data =[
            "u_password"      => postInput("new_password"),
        ];
    //ktra submit
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       $error =[];
       if (postInput("old_password") == '') {
         $error['old_password'] = "Mật khẩu cũ không được để trống !!!";
       } elseif (MD5(postInput("old_password")) != $_SESSION['name_password']) {
	        $error['old_password'] = "Mật khẩu cũ không đúng !!!";
       	}

       if (postInput("new_password") == '') {
         $error['new_password'] = "Mật khẩu mới không được để trống !!!";
       }
       if (postInput("conf_new_password") == '') {
         $error['conf_new_password'] = "Xác nhận mật khẩu mới không được để trống !!!";
       }

       if (postInput("conf_new_password") != $data['u_password']) {
         $error['conf_new_password'] = "Xác nhận mật khẩu sai !!!";
       }
       $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
       if (!preg_match($pattern,$data['u_password'])) {
         $error['new_password'] = $error['conf_new_password'] ="Mật khẩu phải có ít nhất 8 ký tự bao gồm chữ hoa,chữ thường và ký tự đặc biệt !!!";
       }else{
          $data['u_password']= MD5(postInput("new_password"));
       }
        if (empty($error))
        {
           	// $update = $db->update("users",$data,array("u_id"=>$id));
            $update = $db->update("users",$data,array("u_email"=>$_SESSION['name_email']));
            echo '<script> alert("Cập nhật mật khẩu thành công \n!!! Hãy login lại với mật khẩu mới nhé!!!");location.href="./logout.php" </script>';
            // if ($update > 0) {
            //     $_SESSION['success']="Cập nhật mật khẩu thành công";
            //   echo "<script> alert('Đổi mật khẩu thành công!!!'); location.href='./reset_pass.php'</script>"; 
            // } else {
            //     $_SESSION['error']="Cập nhật mật khẩu thất bại";
            // }
        }
    }
    include_once '../../view/user/reset_pass.php'
 ?>