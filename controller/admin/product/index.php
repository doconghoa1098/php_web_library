<?php 
    include_once '../autoload/autoload.php';
  if (isset($_GET['p']) ) {
        $p = $_GET['p'];
      }
      else {
        $p =1;
      };
    $sql='';
    $pro_search=getInput('name');
    $cate_search=getInput('cate');
    if ($pro_search!=''||$cate_search!='') {
        $sql = " SELECT product.*,category.cate_name as cate_name  FROM product LEFT JOIN category ON category.cate_id = product.pro_category_id WHERE pro_name LIKE '%".$pro_search."%' AND pro_category_id LIKE '%".$cate_search."%' ";
    }else{
      $sql = "SELECT product.*,category.cate_name as cate_name FROM product LEFT JOIN category on category.cate_id = product.pro_category_id";
    }
    $total = count($db->fetchsql($sql));

      $product = $db->fetchJones("product",$sql,$total,$p,3,true);
      $sotrang = $product['page'];
      unset($product['page']);
      $path = $_SERVER['SCRIPT_NAME'];
      $category = $db->fetchAll("category");

      include_once '../../../view/admin/index.php';
    include_once '../../../view/admin/product/index.php';
    if (isset($_SESSION['toart_type'])) {
      $toart_type=$_SESSION['toart_type'];
      $messages=$_SESSION['messages'];
      $title=$_SESSION['title'];
      echo "<script>toastr.$toart_type('$messages','$title');</script>"; 
      unset($_SESSION['toart_type']);unset($_SESSION['messages']);unset($_SESSION['title']);
    }
  
?>
