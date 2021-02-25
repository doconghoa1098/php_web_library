<?php 
    include_once '../../model/autoload.php';
    $action=  getInput('action');
    
    switch ($action) {
        case 'addcart':
            $pro_id = intval(postInput('id'));
            $pro_qty = intval(postInput('qty')); 
            $product = $db->fetchID("product",$pro_id);
            if ($product>0) {
                if (!isset($_SESSION['name_user'])) {
                    $_SESSION['toart_type'] = 'warning';
                    $_SESSION['title'] = 'Lỗi';
                    $_SESSION['messages'] = 'Bạn phải đăng nhập để tạo phiếu mượn';
                    echo "<script>location.href='./book-details.php?id=$pro_id' </script>" ;
                }elseif ( $pro_qty > intval($product['pro_number'])) {
                    $_SESSION['toart_type'] = 'error';
                    $_SESSION['title'] = 'Xin lỗi';
                    $_SESSION['messages'] = 'Số lượng bạn muốn mượn vượt qua số lượng tài liệu còn trong kho!!!';
                    echo "<script>location.href='./book-details.php?id=$pro_id' </script>" ;
                }else{
                    if ( ! isset($_SESSION['cart'][$pro_id])) {
                        //tạo mới giỏ hàng
                    $_SESSION['cart'][$pro_id]['pro_name']= $product['pro_name'];
                    $_SESSION['cart'][$pro_id]['pro_avatar']= $product['pro_avatar'];
                    $_SESSION['cart'][$pro_id]['pro_qty'] = $pro_qty;
                    $_SESSION['cart'][$pro_id]['pro_id'] = $product['pro_id'];
                    } else {
                      //ngược lại thì tạo mới giỏ hàng
                        $_SESSION['cart'][$pro_id]['pro_qty'] += $pro_qty;
                    }
                    $_SESSION['toart_type'] = 'success';
                    $_SESSION['title'] = 'Thành công';
                    $_SESSION['messages'] = 'Thêm vào phiếu mượn thành công';
                    echo "<script>location.href='./book-details.php?id=$pro_id' </script>" ;
                }
            }else{
                header("location: ./404.php");
            }
            break;
        
        case 'edit':
            $pro_qty_new = intval(postInput('qty_new'));
            $pro_id = intval(postInput('id'));
            $product = $db->fetchID("product",$pro_id);
            // _debug($pro_qty_new);
            if ($product>0) {
                if ($pro_qty_new <= intval($product['pro_number']) ) {
                    $_SESSION['cart'][$pro_id]['pro_qty'] = $pro_qty_new;
                    $_SESSION['toart_type'] = 'success';
                    $_SESSION['title'] = 'Thành công';
                    $_SESSION['messages'] = "Cập nhật thành công !!!";
                    header("location: ./cart.php");
                } else {
                    $_SESSION['toart_type'] = 'error';
                    $_SESSION['title'] = 'Xin lỗi';
                    $_SESSION['messages'] = 'Số lượng bạn muốn mượn vượt qua số lượng tài liệu còn trong kho!!!';
                    header("location: ./cart.php");
                }
            }else {
                header("location: ./404.php");
            }
            break;
        case 'delete':
            $pro_id = intval(getInput('key'));
            unset($_SESSION['cart'][$pro_id]);
            $_SESSION['toart_type'] = 'success';
            $_SESSION['title'] = 'Thành công';
            $_SESSION['messages'] = "Xóa sản phẩm thành công !!!";
            header("location: ./cart.php");
            break;

        case 'confirm_cart':
            $name_id = intval($_SESSION['name_id']);
            $tr_qty = intval($_SESSION['sumqty']);
            $data_tr =[    'tr_users_id' => $name_id,
                            'tr_quantity' => $tr_qty,];

            $id_tran =$db->insert("transaction",$data_tr);
            if ($id_tran > 0) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    $data_or =[ 'or_transaction_id'    => $id_tran,
                                'or_product_id'        => $key,
                                'or_quantity'          => $value['pro_qty'],];

                    $id_order = $db->insert("orders",$data_or);
                }
                unset($_SESSION['cart']);
                unset($_SESSION['sumqty']);
                $_SESSION['toart_type'] = 'success';
                $_SESSION['title'] = 'Thành công';
                $_SESSION['messages'] = "Gửi phiếu mượn thành công !!!";
                header("location: ./index.php");
            }
            break;
        case 'cancel':
            $transaction_id = intval(getInput('transaction_id'));
            $or_id = intval(getInput('or_id'));
            $qty = intval(getInput('qty'));
            $tr_quantity = intval(getInput('tr_quantity'));
            $cancel_or = $db->deletesql("orders","or_id=$or_id ");
            if ($cancel_or > 0) {
                $tr_quantity_new=$tr_quantity-$qty;
                if ($tr_quantity_new==0) {
                    $cancel_tr = $db->deletesql("transaction","tr_id=$transaction_id ");
                }else{
                    $update = $db->update("transaction",["tr_quantity"=>$tr_quantity_new,],array("tr_id"=>$transaction_id ));
                }
                $_SESSION['toart_type'] = 'success';
                $_SESSION['title'] = 'Thành công';
                $_SESSION['messages'] = "Hủy phiếu mượn thành công !!!";
                header("location: ./view_order.php");
            }
            break;
        default:
            header("location: ./404.php");
            break;
    }

?>