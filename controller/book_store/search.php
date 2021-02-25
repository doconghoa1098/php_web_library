<?php 
	include_once '../../model/autoload.php';
	 $Category = $db->fetchsql("SELECT cate_name,cate_id FROM category");
    $book_search=getInput('book');
    
    $sql = "SELECT * FROM product WHERE pro_name LIKE '%".$book_search."%' ";
    $pro_search= $db->fetchsql($sql);
    include_once '../../view/book_store/search.php';
    

 ?>