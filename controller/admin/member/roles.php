<?php 
    include_once '../autoload/autoload.php';
    $member_id = $_SESSION['member_id']; //id user đag logoin
  	$id_user_view = intval(getInput('id'));  //id user muốn xem
  	// $permission = $db->fetchsql("SELECT per_id,tbl_name FROM user_per WHERE u_id=$id_user ");
    $users_id= $db->fetchsqlOne("SELECT * FROM users WHERE u_id=$id_user_view ");
    include_once '../../../view/admin/member/roles.php';
    
    
?>