<?php 
	include_once '../../model/autoload.php';
	$Category = $db->fetchsql("SELECT cate_name,cate_id FROM category");
	$pro_id = intval(getInput('id'));
    $product = $db->fetchsqlOne("SELECT * FROM product WHERE pro_id=$pro_id ");
    // _debug($_SESSION);
	include_once '../../view/book_store/book-details.php';
	if (isset($_SESSION['toart_type'])) {
	    $toart_type=$_SESSION['toart_type'];
	    $messages=$_SESSION['messages'];
	    $title=$_SESSION['title'];
	    echo "<script>toastr.$toart_type('$messages','$title');</script>"; 
	    unset($_SESSION['toart_type']);unset($_SESSION['messages']);unset($_SESSION['title']);
    }

?>