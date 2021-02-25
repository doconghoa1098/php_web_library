<?php 
    include_once '../../model/autoload.php';
    $pro_id = intval(postInput('id'));
    $pro_qty = intval(postInput('qty'));
    $product = $db->fetchID("product",$pro_id);
    if (!isset($_SESSION['name_user'])) {
        $_SESSION['toart_type'] = 'warning';
        $_SESSION['title'] = 'Lỗi';
        $_SESSION['messages'] = 'Bạn phải đăng nhập để tạo phiếu mượn';
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
            $_SESSION['cart'][$id]['pro_qty'] += $pro_qty;
        }
        $_SESSION['toart_type'] = 'success';
        $_SESSION['title'] = 'Thành công';
        $_SESSION['messages'] = 'Thêm vào phiếu mượn thành công';
        echo "<script>location.href='./book-details.php?id=$pro_id' </script>" ;
    }

?>