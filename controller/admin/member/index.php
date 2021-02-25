<?php 
    include_once '../autoload/autoload.php';

	// $users = $db->fetchsql("SELECT * FROM users WHERE u_roles!=0 ");
  if (isset($_GET['p']) ) {
        $p = $_GET['p'];
      }
      else {
        $p =1;
      };
 
    $sql="SELECT * FROM users WHERE u_roles=1 OR u_roles=2 ";
    $total = count($db->fetchsql($sql));

      $users = $db->fetchJones("users",$sql,$total,$p,10,true);
      $sotrang = $users['page'];
      unset($users['page']);
      $path = $_SERVER['SCRIPT_NAME'];
    include_once '../../../view/admin/index.php';
    include_once '../../../view/admin/member/index.php';

    if (isset($_SESSION['toart_type'])) {
	    $toart_type=$_SESSION['toart_type'];
	    $messages=$_SESSION['messages'];
	    $title=$_SESSION['title'];
	    echo "<script>toastr.$toart_type('$messages','$title');</script>"; 
	    unset($_SESSION['toart_type']);unset($_SESSION['messages']);unset($_SESSION['title']);
    }
    
 
?>