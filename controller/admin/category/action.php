<?php 
    include_once '../autoload/autoload.php';
    include_once '../../../view/admin/index.php';
    $cate_id = intval(getInput('id'));
    $action = getInput('action');
    //lấy quyền của user đag login
    $id_roles=intval($_SESSION['member_roles']);
    $cate_old = $db->fetchOne("category","cate_id=$cate_id ");// lấy dữ liệu cũ để hiện ra nếu update
    $messages = $toart_type = $title =''; //thông báo bằng toastr
    switch ($action) {
            case 'add':
                if ($id_roles==1 || $id_roles==2 )//full quyền hoặc quyền create
                {
                    $data =[    "cate_name"         => postInput("cate_name"),
                                "cate_discription"  => postInput("cate_discription"),];
                    //ktra submit
                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                    {   
                        $is_check = $db->fetchOne("category"," cate_name= '".$data['cate_name']."'  " );
                        if ($data['cate_name'] == '') {
                            $error['cate_name'] = "Tên thể loại không được để trống !!!";
                        }elseif ($is_check !=NULL)
                        {
                          $error['cate_name']="Thể loại sách đã tồn tại !!!";
                        }elseif (empty($error)){
                            $insert = $db->insert("category",$data);
                            if ($insert > 0) {
                                $toart_type = 'success';$title = 'Thành công';$messages = 'Thêm mới thành công';
                            }else {
                                $toart_type = 'error';$title = 'Lỗi';$messages = 'Thêm mới thất bại';
                            }                
                            
                        }
                    }
                    include_once '../../../view/admin/category/create.php';
                    include_once '../../../view/admin/category/form.php';
                }else{
                    // $toart_type = 'error';$title = 'Lỗi';$messages = 'Bạn không có quyền';
                    // include_once '../../../view/admin/404.php';
                    $_SESSION['toart_type'] = 'error';
                    $_SESSION['title'] = 'Lỗi';
                    $_SESSION['messages'] = 'Bạn không có quyền';
                    echo "<script>location.href='./index.php' </script>" ;
                }
                break;    
            case 'edit':
                if (isset($cate_old) && ($id_roles==1 || $id_roles==2) )
                //full quyền hoặc quyền edit
                {
                    $data =[    "cate_name"         => postInput("cate_name"),
                                "cate_discription"  => postInput("cate_discription"),];
                    //ktra submit
                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                    {
                        if ($data['cate_name'] == '') {
                            $error['cate_name'] = "Tên thể loại không được để trống !!!";
                        }
                        if ($data['cate_name']!=$cate_old['cate_name']) {
                            $is_check = $db->fetchOne("category"," cate_name= '".$data['cate_name']."'  ");
                            if ($is_check !=NULL){
                                $error['pro_name']="Thể loại sách đã tồn tại !!!";
                            }
                        }
                        if (empty($error)){
                            $update = $db->update("category",$data,array("cate_id"=>$cate_id));
                            $toart_type = 'success';$title = 'Thành công';$messages = 'Cập nhật thành công';  
                        }
                    }
                    include_once '../../../view/admin/category/update.php';
                    include_once '../../../view/admin/category/form.php';
                }else{
                    // $toart_type = 'error';$title = 'Lỗi';$messages = 'Bạn không có quyền';
                    // include_once '../../../view/admin/404.php';
                    $_SESSION['toart_type'] = 'error';
                    $_SESSION['title'] = 'Lỗi';
                    $_SESSION['messages'] = 'Bạn không có quyền';
                    echo "<script>location.href='./index.php' </script>" ;
                }
                break;
            case 'delete':
                if (isset($cate_old) && ($id_roles==1 || $id_roles==2) )
                //full quyền hoặc quyền delete
                {
                    if ($cate_old['cate_quantity']>0) {
                        $_SESSION['toart_type'] = 'warning';
                        $_SESSION['title'] = 'Cảnh báo';
                        $_SESSION['messages'] = 'Không thể xóa thể loại còn sách';
                        echo "<script>location.href='./index.php' </script>" ;
                    }else{
                        $db->deletesql("category","cate_id=$cate_id ");
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
        }
        if ($toart_type!='') {
        echo "<script>toastr.$toart_type('$messages','$title');</script>"; 
        }



?>