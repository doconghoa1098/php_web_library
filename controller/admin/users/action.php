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
            case 'delete':
                if (isset($user_old) && ($id_roles==1 || $id_roles==2 ) )
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
                        $db->deletesql("users","u_id=$u_id_edit ");
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
            case 'active':
                if (isset($user_old) && ($id_roles==1 || $id_roles==2 ) ) {
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
                    }elseif ($user_old['u_roles'] == 2 && $user_old['u_is_working'] == 1) {
                        $_SESSION['toart_type'] = 'warning';
                        $_SESSION['title'] = 'Cảnh báo';
                        $_SESSION['messages'] = 'Không thể thay đổi trạng thái của nhân viên chưa nghỉ việc';
                        echo "<script>location.href='./index.php' </script>" ;
                    }else{
                        $u_active = intval($user_old['u_active'])==0?1:0;
                        $update = $db->update("users",["u_active"=>$u_active,],array("u_id"=>$u_id_edit ));
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
                if (isset($user_old) && ($id_roles==1 || $id_roles==2 )) {
                    if ($user_old['u_roles'] == 1) {
                        $_SESSION['toart_type'] = 'warning';
                        $_SESSION['title'] = 'Cảnh báo';
                        $_SESSION['messages'] = 'Không thể khóa tài khoản admin';
                        echo "<script>location.href='./index.php' </script>" ;
                    }elseif ($id_login == $u_id_edit) {
                        $_SESSION['toart_type'] = 'warning';
                        $_SESSION['title'] = 'Cảnh báo';
                        $_SESSION['messages'] = 'Không thể khóa tài khoản của chính bạn';
                        echo "<script>location.href='./index.php' </script>" ;
                    }elseif ($user_old['u_roles'] == 2 && $user_old['u_is_working'] == 1) {
                        $_SESSION['toart_type'] = 'warning';
                        $_SESSION['title'] = 'Cảnh báo';
                        $_SESSION['messages'] = 'Không thể khóa tài khoản của nhân viên chưa nghỉ việc';
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
            case 'upgrade'://CHỈ ADMIN MỚI NÂNG ĐC
                if (isset($user_old) && $id_roles==1) {
                        $update = $db->update("users",["u_roles"=>2,"u_is_working"=>1],array("u_id"=>$u_id_edit ));
                        $_SESSION['toart_type'] = 'success';
                        $_SESSION['title'] = 'Thành công';
                        $_SESSION['messages'] = 'Nâng cấp người dùng thành công';
                        echo "<script>location.href='./index.php' </script>" ;
                    

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
