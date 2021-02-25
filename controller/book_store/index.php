<?php 
	include_once '../../model/autoload.php';

// _debug($_SESSION);
    $Category = $db->fetchsql("SELECT cate_name,cate_id FROM category");
    $Product_hot = $db->fetchsql("SELECT pro_id,pro_name,pro_avatar,pro_description FROM product WHERE pro_hot=1 ORDER BY pro_id DESC LIMIT 3 ");
    $Product_new = $db->fetchsql("SELECT pro_id,pro_name,pro_avatar,pro_description FROM product ORDER BY pro_create_at");
    include_once '../../view/book_store/index.php';

	
	if (isset($_SESSION['toart_type'])) {
        $toart_type=$_SESSION['toart_type'];
        $messages=$_SESSION['messages'];
        $title=$_SESSION['title'];
        echo "<script>toastr.$toart_type('$messages','$title');</script>"; 
        unset($_SESSION['toart_type']);unset($_SESSION['messages']);unset($_SESSION['title']);
    }
    
	
?>