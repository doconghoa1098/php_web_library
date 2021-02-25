<?php
    session_start();
    include('../../../model/database.php');
    include('../../../model/function.php');
    $db= new Database;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    define("ROOT", $_SERVER['DOCUMENT_ROOT'] . "/MVC/view/img/uploads/");
    if (!isset($_SESSION['member_id'])) {
      echo  "<script>location.href='../login.php'</script>";
    }
?>
