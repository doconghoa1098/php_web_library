<?php 
    include_once '../../model/autoload.php';
    if (!isset($_SESSION['member_id'])) {
      echo  "<script>location.href='./login.php'</script>";
    }

    include_once '../../view/admin/index.php';
    // _debug($_SESSION);
    include_once '../../view/admin/dashboard.php';
?>