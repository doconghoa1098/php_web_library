<?php 
    
	include_once '../autoload/autoload.php';
	// $users = $db->fetchAll("users");
if (isset($_GET['p']) ) {
        $p = $_GET['p'];
      }
      else {
        $p =1;
      };
 
    $sql='';
    $u_search=getInput('name');
    if ($u_search!='') {
        $sql = "SELECT * FROM users WHERE u_email LIKE '%".$u_search."%' ";
    }else{
      $sql="SELECT * FROM users";
    }
    $total = count($db->fetchsql($sql));

      $users = $db->fetchJones("users",$sql,$total,$p,5,true);
      $sotrang = $users['page'];
      unset($users['page']);
      $path = $_SERVER['SCRIPT_NAME'];
    include_once '../../../view/admin/index.php';    
    include_once '../../../view/admin/users/index.php';
    if (isset($_SESSION['toart_type'])) {
	    $toart_type=$_SESSION['toart_type'];
	    $messages=$_SESSION['messages'];
	    $title=$_SESSION['title'];
	    echo "<script>toastr.$toart_type('$messages','$title');</script>"; 
	    unset($_SESSION['toart_type']);unset($_SESSION['messages']);unset($_SESSION['title']);
    }

?>