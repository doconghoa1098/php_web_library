<?php 
    include_once '../autoload/autoload.php';
    include_once '../../../view/admin/index.php';
    $pro_id_edit = intval(getInput('id'));
    $action = getInput('action');
    //lấy quyền của user đag login
    $id_roles=intval($_SESSION['member_roles']);

    $category = $db->fetchAll("category");
  
    $pro_old = $db->fetchOne("product","pro_id=$pro_id_edit ");// lấy dữ liệu cũ để hiện ra nếu update
    $messages = $toart_type = $title =''; //thông báo bằng toastr
    switch ($action) {
            case 'add':
                if ($id_roles==1||$id_roles==2 )//full quyền hoặc quyền create
                {
                    $data =[    "pro_category_id"  => postInput("pro_category_id"),
                                "pro_name"         => postInput("pro_name"),
                                "pro_publisher"    => postInput("pro_publisher"),
                                "pro_date"         => postInput("pro_date"),
                                "pro_price"        => postInput("pro_price"),
                                "pro_number"       => postInput("pro_number"),
                                "pro_avatar"       => postInput("pro_avatar"),
                                "pro_description"  => postInput("pro_description"),
                            ];
                            // _debug($data);
                    //ktra submit
                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                    {   
                        $error = [];
                        if ($data['pro_name']=='') {
                            $error['pro_name']="Chưa nhập tên sách";
                        }
                        $is_check = $db->fetchOne("product"," pro_name= '".$data['pro_name']."'  " );
                        if ($is_check !=NULL)
                        {
                          $error['pro_name']="Sách đã tồn tại !!!";
                        }
                        if ($data['pro_category_id']=='') {
                            $error['pro_category_id']="Chưa chọn thể loại sách";
                        }
                        if ($data['pro_publisher']=='') {
                            $error['pro_publisher']="Chưa nhập nhà xuất bản";
                        }
                        if ($data['pro_date']=='') {
                            $error['pro_date']="Chưa nhập năm xuất bản";
                        }
                        if ($data['pro_price']=='') {
                            $error['pro_price']="Chưa nhập đơn giá sách";
                        }
                        if ($data['pro_number']=='') {
                            $error['pro_number']="Chưa nhập số lượng sách";
                        }
                        if ($data['pro_description']=='') {
                            $error['pro_description']="Chưa nhập mô tả về sách";
                        }
                        if (empty($error)){
                            if (isset($_FILES['pro_avatar']))
                            {
                                $file = upload_image('pro_avatar','product');  //up ảnh vào file folder users
                                if (isset($file['name']))
                                {
                                    $data['pro_avatar']=  $file['name'];
                                }
                            }
                            $insert = 1;               
                            $insert = $db->insert("product",$data);               
                            if ($insert > 0) {
                                $pro_category_id=$data['pro_category_id'];
                                $sql="SELECT cate_quantity FROM category WHERE cate_id=$pro_category_id ";
                                $old=$db->fetchsqlOne($sql);
                                $quantity_new=$old['cate_quantity']+$data['pro_number'];
                                $quantity_cate=$db->update("category",["cate_quantity"=>$quantity_new],array("cate_id"=>$data['pro_category_id'] ));
                                $toart_type = 'success';$title = 'Thành công';$messages = 'Thêm mới thành công';
                            }else {
                                $toart_type = 'error';$title = 'Lỗi';$messages = 'Thêm mới thất bại';
                            } 
                        }               
                           
                    }
                    include_once '../../../view/admin/product/create.php';
                    include_once '../../../view/admin/product/form.php';
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
                if (isset($pro_old) && ($id_roles==1||$id_roles==2) )
                //full quyền hoặc quyền edit
                {
                    $data =[    "pro_category_id"  => postInput("pro_category_id"),
                                "pro_name"         => postInput("pro_name"),
                                "pro_publisher"    => postInput("pro_publisher"),
                                "pro_date"         => postInput("pro_date"),
                                "pro_price"        => postInput("pro_price"),
                                "pro_number"       => postInput("pro_number"),
                                "pro_avatar"       => postInput("pro_avatar"),
                                "pro_description"  => postInput("pro_description"),
                            ];
                            // _debug($data);
                    //ktra submit
                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                    {   
                        $error = [];
                        if ($data['pro_name']=='') {
                            $error['pro_name']="Chưa nhập tên sách";
                        }
                        if ($data['pro_name']!=$pro_old['pro_name']) {
                            $is_check = $db->fetchOne("product"," pro_name= '".$data['pro_name']."'  " );
                            if ($is_check !=NULL){
                                $error['pro_name']="Sách đã tồn tại !!!";
                            }
                        }
                        if ($data['pro_category_id']=='') {
                            $error['pro_category_id']="Chưa chọn thể loại sách";
                        }
                        if ($data['pro_publisher']=='') {
                            $error['pro_publisher']="Chưa nhập nhà xuất bản";
                        }
                        if ($data['pro_date']=='') {
                            $error['pro_date']="Chưa nhập năm xuất bản";
                        }
                        if ($data['pro_price']=='') {
                            $error['pro_price']="Chưa nhập đơn giá sách";
                        }
                        if ($data['pro_number']=='') {
                            $error['pro_number']="Chưa nhập số lượng sách";
                        }
                        if ($data['pro_description']=='') {
                            $error['pro_description']="Chưa nhập mô tả về sách";
                        }
                        if (empty($error)){
                            if (isset($_FILES['pro_avatar']))
                            {
                                $file = upload_image('pro_avatar','product');  //up ảnh vào file folder users
                                if (isset($file['name']))
                                {
                                    $data['pro_avatar']=  $file['name'];
                                }
                            }
                            $update = $db->update("product",$data,array("pro_id"=>$pro_id_edit ));
                            $toart_type = 'success';$title = 'Thành công';$messages = 'Cập nhật thành công';
                            $pro_category_id=$data['pro_category_id'];
                            $sql="SELECT cate_quantity FROM category WHERE cate_id=$pro_category_id ";
                            $old=$db->fetchsqlOne($sql);
                            $quantity_new=$data['pro_number']!=$pro_old['pro_number']?$old['cate_quantity']-$pro_old['pro_number']+$data['pro_number']:$old['cate_quantity'];
                            $quantity_cate=$db->update("category",["cate_quantity"=>$quantity_new],array("cate_id"=>$data['pro_category_id'] ));
                            
                        }
                    }
                    include_once '../../../view/admin/product/update.php';
                    include_once '../../../view/admin/product/form.php';
                }else{
                    $_SESSION['toart_type'] = 'error';
                    $_SESSION['title'] = 'Lỗi';
                    $_SESSION['messages'] = 'Bạn không có quyền';
                    echo "<script>location.href='./index.php' </script>" ;
                }
                break;
            case 'delete':
                if (isset($pro_old) && ($id_roles==1||$id_roles==2) )
                //full quyền hoặc quyền delete
                {
                    // $db->deletesql("product","pro_id=$pro_id_edit ");
                    $toart_type = 'success';$title = 'Thành công';$messages = 'Xóa dữ liệu thành công';
                    $_SESSION['toart_type'] = 'success';
                    $_SESSION['title'] = 'Thành công';
                    $_SESSION['messages'] = 'Xóa dữ liệu thành công';
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