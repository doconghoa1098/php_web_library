<?php 
    include_once '../autoload/autoload.php';

    $users = $db->fetchAll("category");
    include_once '../../../view/admin/index.php';
    include_once '../../../view/admin/category/index.php';
    
    if (isset($_SESSION['toart_type'])) {
	    $toart_type=$_SESSION['toart_type'];
	    $messages=$_SESSION['messages'];
	    $title=$_SESSION['title'];
	    echo "<script>toastr.$toart_type('$messages','$title');</script>"; 
	    unset($_SESSION['toart_type']);unset($_SESSION['messages']);unset($_SESSION['title']);
    }

?>