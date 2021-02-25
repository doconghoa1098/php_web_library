<?php 

	include_once '../autoload/autoload.php';
	$tr_id=intval(getInput('id'));
	$sql = "SELECT orders.*,product.pro_name as pro_name ,product.pro_avatar as pro_avatar,product.pro_number as pro_number FROM (orders LEFT JOIN product  on orders.or_product_id = product.pro_id) WHERE or_transaction_id = $tr_id ";
	$orders = $db->fetchsql($sql);

	// _debug($orders);
    include_once '../../../view/admin/transaction/order.php';
    
    
?>