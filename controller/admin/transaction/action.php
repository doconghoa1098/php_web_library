<?php 
	include_once '../autoload/autoload.php';
    include_once '../../../view/admin/index.php';
    $tr_id = intval(getInput('id')); //id user muốn sửa hoặc xóa
    $action = getInput('action');
    $id_login=intval($_SESSION['member_id']);
    $user_handler = $db->fetchsqlOne("SELECT u_name,u_phone,u_email FROM users WHERE u_id=$id_login  ");
    //lấy quyền của user đag login
    $tran = $db->fetchOne("transaction","tr_id=$tr_id ");
    $messages = $toart_type = $title =''; //thông báo bằng toastr
    switch ($action) {
    	case 'handling':
    		if (isset($tran)) {
    			$data=[
    				"tr_status" 	    =>	intval($tran['tr_status'])==0?1:0,
    				"tr_handler_name"	=>	$user_handler['u_name'],
                    "tr_handler_email"  =>  $user_handler['u_email'],
                    "tr_handler_phone"  =>  $user_handler['u_phone'],
    				"tr_update_at"	    =>	date('Y-m-d H:i:s'),];
    			if($data['tr_status']==0){
                    $data['tr_handler_name']=$data['tr_handler_email']=$data['tr_handler_phone']='';
                }
                $update = $db->update("transaction",$data,array("tr_id"=>$tr_id ));
                $_SESSION['toart_type'] = 'success';
                $_SESSION['title'] = 'Thành công';
                $_SESSION['messages'] = 'Xử lý thành công';
                echo "<script>location.href='./index.php' </script>" ;
    		}else{
                $_SESSION['toart_type'] = 'error';
                $_SESSION['title'] = 'Lỗi';
                $_SESSION['messages'] = 'Bạn không có quyền';
                echo "<script>location.href='./index.php' </script>" ;
             }
    		break;

    	case 'delete':
    		if (isset($tran)) {
                // $db->deletesql("transaction","tr_id=$tr_id ");
                $_SESSION['toart_type'] = 'success';
                $_SESSION['title'] = 'Thành công';
                $_SESSION['messages'] = 'Xóa phiếu mượn thành công';
                echo "<script>location.href='./index.php' </script>" ;
            }else{
                $_SESSION['toart_type'] = 'error';
                $_SESSION['title'] = 'Lỗi';
                $_SESSION['messages'] = 'Bạn không có quyền';
                echo "<script>location.href='./index.php' </script>" ;
            }
    		break;
    }
    if ($toart_type!='') {
            echo "<script>toastr.$toart_type('$messages','$title');</script>"; 
        }


 ?>