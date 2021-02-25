<?php 
    include_once '../../model/autoload.php';


    $data =
        [
            "email"         => postInput("email"),
            "password"      => postInput("password"),
        ];
    $toart_type=$messages=$title='';
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error=[];
        if ($data['email'] == '') {
           $error['email'] = "Email không được để trống !!!";
        }
        if ($data['password'] == '') {
           $error['password'] = "Mật khẩu không được để trống !!!";
        }
        if (empty($error))
        {
$is_check = $db->fetchOne("users"," u_email= '".$data['email']."' AND u_password= '".md5($data['password'])."' ");
// $is_check = $db->fetchOne("users"," u_email= '".$data['email']."' AND u_password= '".md5($data['password'])."' AND u_roles!=0 ");
            if ($is_check !=NULL && $is_check['u_roles']!=0 && $is_check['u_roles']!=3 && $is_check['u_is_working']==1 && $is_check['u_is_lock']==0){ 
            //là nhân viên(!=0 sv !=3 giảng viên) chưa nghỉ việc(==1) không bị khóa(==0) ms login dc
                $_SESSION=[
                    "member_id"    => $is_check['u_id'],
                    "member_name"    => $is_check['u_name'],
                    "member_roles"    => $is_check['u_roles'],
                ];

                echo "<script> alert('Đăng nhập thành công'); location.href='./index.php' </script>" ;
            }else{
               $toart_type='error';$messages='Email hoặc mật khẩu không đúng';$title='Lỗi';
               $_SESSION['error']= "Email hoặc mật khẩu không đúng";
            }
        }
    }

    
    include_once '../../view/admin/login.php';
    echo "<script>toastr.$toart_type('$messages','$title')</script>";
    
    
?>