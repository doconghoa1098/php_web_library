<?php 
    include_once '../autoload/autoload.php';
    include_once '../../../view/admin/index.php';
    $u_id_edit = intval(getInput('id')); //id user muốn sửa hoặc xóa
    $action = getInput('action');
    $id_login=intval($_SESSION['member_id']);
    //lấy quyền của user đag login
    $id_roles=intval($_SESSION['member_roles']);
    $user_old = $db->fetchOne("users","u_id=$u_id_edit ");// lấy dữ liệu cũ để hiện ra nếu update
    $messages = $toart_type = $title =''; //thông báo bằng toastr
    switch ($action) {
            case 'add':
                if ($id_roles==1) //quyền admin
                {
                    $data =[    "u_name"         => postInput("username"),
                                "u_email"        => postInput("email"),
                                "u_password"     => postInput("password"),
                                "u_phone"        => postInput("phone"),
                                "u_date"         => postInput("date"),
                                "u_address"      => postInput("address"),
                                "u_avatar"       => postInput("avatar"),
                                "u_roles"        => postInput("roles"),
                                "u_active"       => 1,
                                "u_is_working"   => 1,
                            ];
                    //ktra submit
                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                    { 
                        if ($data['u_name'] == '') {
                            $error['u_name'] = "Username không được để trống !!!";
                        }
                        if (strlen(utf8_decode($data['u_name'])) > 17) {
                            $error['u_name'] = "Username quá dài !!!";
                        }
                        if ($data['u_email'] == '') {
                            $error['u_email'] = "Email không được để trống !!!";
                        }else{
                            $is_check = $db->fetchOne("users"," u_email= '".$data['u_email']."'  " );
                            if ($is_check !=NULL){
                                $error['u_email']="Email đã tồn tại !!!";
                            }
                        }
                        $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
                        if ($data['u_password'] == '') {
                            $error['u_password'] = "Mật khẩu không được để trống !!!";
                        }elseif (!preg_match($pattern,$data['u_password'])) {
                            $error['u_password'] = "Mật khẩu phải có ít nhất 8 ký tự bao gồm chữ hoa,chữ thường và ký tự đặc biệt !!!";
                        }else{
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
                        elseif (empty($error)){
                            if (isset($_FILES['avatar']))
                            {
                                $file = upload_image('avatar','users');  //up ảnh vào file folder users
                                if (isset($file['name']))
                                {
                                    $data['u_avatar']=  $file['name'];
                                }
                            }
                            $insert = $db->insert("users",$data);
                            
                            if ($insert > 0) {
                                $toart_type = 'success';$title = 'Thành công';$messages = 'Thêm mới thành công';
                            }else {
                                $toart_type = 'error';$title = 'Lỗi';$messages = 'Thêm mới thất bại';
                            }                
                            
                        }
                    }
                    include_once '../../../view/admin/member/create.php';
                    include_once '../../../view/admin/member/form.php';
                }else{
                    $_SESSION['toart_type'] = 'error';
                    $_SESSION['title'] = 'Lỗi';
                    $_SESSION['messages'] = 'Bạn không có quyền';
                    echo "<script>location.href='./index.php' </script>" ;
                    // $toart_type = 'error';$title = 'Lỗi';$messages = 'Bạn không có quyền';
                    // include_once '../../../view/admin/404.php';
                }     
                break;   
            case 'edit'://full quyền hoặc quyền edit
                // if (isset($user_old) && (in_array(1,$per_id) || in_array(4,$per_id)) )
                if (isset($user_old) && ($id_login==$u_id_edit || $id_roles==1) ) //chỉ có thể sửa thông tin user login thôi
                    {
                        $data =[    "u_name"         => postInput("username"),
                                    "u_email"        => postInput("email"),
                                    "u_password"     => postInput("password"),
                                    "u_phone"        => postInput("phone"),
                                    "u_date"         => postInput("date"),
                                    "u_address"      => postInput("address"),
                                    "u_avatar"       => postInput("avatar"),
                                    "u_roles"        => postInput("roles"),

                                ];
                        // ktra submit
                        if ($_SERVER["REQUEST_METHOD"] == "POST")
                        {
                            if ($data['u_name'] == '') {
                                    $error['u_name'] = "Username không được để trống !!!";
                                }
                                if (strlen(utf8_decode($data['u_name'])) > 17) {
                                    $error['u_name'] = "Username quá dài !!!";
                                }
                                if ($data['u_email'] == '') {
                                    $error['u_email'] = "Email không được để trống !!!";
                                }
                                if ($data['u_email']!=$user_old['u_email']) {
                                    $is_check = $db->fetchOne("users"," u_email= '".$data['u_email']."'  " );
                                    if ($is_check !=NULL){
                                        $error['u_email']="Email đã tồn tại !!!";
                                    }
                                }   
                                $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
                                if ($data['u_password'] == '') {
                                    $error['u_password'] = "Mật khẩu không được để trống !!!";
                                }
                                if ($data['u_password']!=$user_old['u_password']) {
                                    if (!preg_match($pattern,$data['u_password'])) {
                                        $error['u_password'] = "Mật khẩu phải có ít nhất 8 ký tự bao gồm chữ hoa,chữ thường và ký tự đặc biệt !!!";
                                    }else{
                                        $data['u_password']= MD5(postInput("password"));
                                    }
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
                                elseif (empty($error)){
                                    if (isset($_FILES['avatar']))
                                    {
                                        $file = upload_image('avatar','users');  //up ảnh vào file folder users
                                        if (isset($file['name']))
                                        {
                                            $data['u_avatar']=  $file['name'];
                                        }
                                    }
                                $update = $db->update("users",$data,array("u_id"=>$u_id_edit ));
                                $toart_type='success';$title ='Thành công';$messages ='Cập nhật thành công';  
                            }
                        }
                        include_once '../../../view/admin/member/update.php';
                        include_once '../../../view/admin/member/form.php';
                    }
                    else{
                        $_SESSION['toart_type'] = 'error';
                        $_SESSION['title'] = 'Lỗi';
                        $_SESSION['messages'] = 'Bạn không có quyền';
                        echo "<script>location.href='./index.php' </script>" ;
                        // $toart_type = 'error';$title = 'Lỗi';$messages = 'Bạn không có quyền';
                        // include_once '../../../view/admin/404.php';
                    }
                break;
            case 'delete':
                if (isset($user_old) && $id_roles==1 ) //chỉ admin mới được xóa
                //full quyền hoặc quyền delete
                {
                    if ($user_old['u_roles'] == 1) {
                        $_SESSION['toart_type'] = 'warning';
                        $_SESSION['title'] = 'Cảnh báo';
                        $_SESSION['messages'] = 'Không thể xóa admin';
                        echo "<script>location.href='./index.php' </script>" ;
                    }elseif ($user_old['u_roles'] == 2 && $user_old['u_is_working'] == 1) {
                        $_SESSION['toart_type'] = 'warning';
                        $_SESSION['title'] = 'Cảnh báo';
                        $_SESSION['messages'] = 'Không thể xóa nhân viên chưa nghỉ việc';
                        echo "<script>location.href='./index.php' </script>" ;
                    }else{
                        // $db->deletesql("users","u_id=$u_id_edit ");
                        $_SESSION['toart_type'] = 'success';
                        $_SESSION['title'] = 'Thành công';
                        $_SESSION['messages'] = 'Xóa dữ liệu thành công';
                        echo "<script>location.href='./index.php' </script>" ;
                    }
                }else{
                    $_SESSION['toart_type'] = 'error';
                    $_SESSION['title'] = 'Lỗi';
                    $_SESSION['messages'] = 'Bạn không có quyền';
                    echo "<script>location.href='./index.php' </script>" ;
                }
                break;
            case 'quit_job':
            //full quyền mới có thể đổi trạng thái của id đúng
                if (isset($user_old) && $id_roles==1 ) {
                    if ($user_old['u_roles'] == 1) {
                        $_SESSION['toart_type'] = 'warning';
                        $_SESSION['title'] = 'Cảnh báo';
                        $_SESSION['messages'] = 'Không thể thay đổi trạng thái của admin';
                        echo "<script>location.href='./index.php' </script>" ;
                    }elseif ($id_login == $u_id_edit) {
                        $_SESSION['toart_type'] = 'warning';
                        $_SESSION['title'] = 'Cảnh báo';
                        $_SESSION['messages'] = 'Không thể thay đổi trạng thái của chính bạn';
                        echo "<script>location.href='./index.php' </script>" ;
                    }else{ //u_is_working=0 (user bình thường),1 còn đi lm,2 là nghỉ làm
                        $u_is_working = intval($user_old['u_is_working'])==1?2:1;
                        $update = $db->update("users",["u_is_working"=>$u_is_working,],array("u_id"=>$u_id_edit ));
                        $_SESSION['toart_type'] = 'success';
                        $_SESSION['title'] = 'Thành công';
                        $_SESSION['messages'] = 'Thay đổi dữ liệu thành công';
                        echo "<script>location.href='./index.php' </script>" ;
                    }

                }else{
                    $_SESSION['toart_type'] = 'error';
                    $_SESSION['title'] = 'Lỗi';
                    $_SESSION['messages'] = 'Bạn không có quyền';
                    echo "<script>location.href='./index.php' </script>" ;
                }
                
                break;
            case 'lock':
                //full quyền mới có thể đổi trạng thái của id đúng
                if (isset($user_old) && $id_roles==1 ) {
                    if ($user_old['u_roles'] == 1) {
                        $_SESSION['toart_type'] = 'warning';
                        $_SESSION['title'] = 'Cảnh báo';
                        $_SESSION['messages'] = 'Không thể thay đổi trạng thái của admin';
                        echo "<script>location.href='./index.php' </script>" ;
                    }elseif ($id_login == $u_id_edit) {
                        $_SESSION['toart_type'] = 'warning';
                        $_SESSION['title'] = 'Cảnh báo';
                        $_SESSION['messages'] = 'Không thể thay đổi trạng thái của chính bạn';
                        echo "<script>location.href='./index.php' </script>" ;
                    }else{
                        $u_is_lock = intval($user_old['u_is_lock'])==0?1:0;
                        $update = $db->update("users",["u_is_lock"=>$u_is_lock,],array("u_id"=>$u_id_edit ));
                        $_SESSION['toart_type'] = 'success';
                        $_SESSION['title'] = 'Thành công';
                        $_SESSION['messages'] = 'Thay đổi dữ liệu thành công';
                        echo "<script>location.href='./index.php' </script>" ;
                    }
                }else{
                    $_SESSION['toart_type'] = 'error';
                    $_SESSION['title'] = 'Lỗi';
                    $_SESSION['messages'] = 'Bạn không có quyền';
                    echo "<script>location.href='./index.php' </script>" ;
                }
                
                break;
        }
        if ($toart_type!='') {
            echo "<script>toastr.$toart_type('$messages','$title');</script>"; 
        }
    


?>