<?php 

	include_once '../autoload/autoload.php';

    include_once '../../../view/admin/index.php';

    // $sql = "SELECT transaction.*, users.u_name as nameuser, users.u_phone as phoneuser, users.u_email as emailuser FROM transaction LEFT JOIN users  on users.u_id = transaction.tr_users_id
    //         ORDER BY tr_id DESC ";


    // $transaction = $db->fetchsql($sql); 
    // _debug($transaction);
    if (isset($_GET['p']) ) {
        $p = $_GET['p'];
      }
      else {
        $p =1;
      };
 
   $sql = "SELECT transaction.*, users.u_name as nameuser, users.u_phone as phoneuser, users.u_email as emailuser FROM transaction LEFT JOIN users  on users.u_id = transaction.tr_users_id
            ORDER BY tr_id DESC ";
    $total = count($db->fetchsql($sql));

    $transaction = $db->fetchJones("transaction",$sql,$total,$p,5,true);
    $sotrang = $transaction['page'];
    unset($transaction['page']);
    $path = $_SERVER['SCRIPT_NAME'];
    // _debug($transaction);
    include_once '../../../view/admin/transaction/index.php';

  
    if (isset($_SESSION['toart_type'])) {
	    $toart_type=$_SESSION['toart_type'];
	    $messages=$_SESSION['messages'];
	    $title=$_SESSION['title'];
	    echo "<script>toastr.$toart_type('$messages','$title');</script>"; 
	    unset($_SESSION['toart_type']);unset($_SESSION['messages']);unset($_SESSION['title']);
    }
    
    
?>