<?php 
	include_once '../../model/autoload.php';
	$Category = $db->fetchsql("SELECT cate_name,cate_id FROM category");
	$u_id=isset($_SESSION['name_id'])?intval($_SESSION['name_id']):'';
	if (!empty($u_id)) {
    $sql = "SELECT product.pro_id as pro_id,product.pro_name as pro_name, product.pro_avatar as pro_avatar,orders.or_transaction_id as transaction_id, orders.or_id as or_id,orders.or_quantity as qty, orders.or_create_at as or_create_at, transaction.tr_update_at as tr_update_at, transaction.tr_status, transaction.tr_quantity as tr_quantity
        FROM (product LEFT JOIN orders  on product.pro_id = orders.or_product_id) LEFT JOIN transaction on transaction.tr_id = orders.or_transaction_id WHERE transaction.tr_users_id=$u_id ORDER BY tr_id DESC ";

    	$transaction = $db->fetchsql($sql);
    }
	include_once '../../view/book_store/view_order.php';

	if (isset($_SESSION['toart_type'])) {
	    $toart_type=$_SESSION['toart_type'];
	    $messages=$_SESSION['messages'];
	    $title=$_SESSION['title'];
	    echo "<script>toastr.$toart_type('$messages','$title');</script>"; 
	    unset($_SESSION['toart_type']);unset($_SESSION['messages']);unset($_SESSION['title']);
    }

?>