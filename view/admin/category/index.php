 <div class="page-header">
    <ol class="breadcrumb">
      <li><a href="../index.php">Trang chủ</a></li>
      <li class="active">Thể loại sách</li>
    </ol>

  </div>
  <div class="table-responsive">
    <h2>Quản lý thể loại sách <a href="./action.php?action=add" class="btn btn-xs  btn-success">Thêm mới</a></h2>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên thể loại</th>
            <th>Mô tả</th>
            <th>Tổng số sách</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            <?php $stt=1; foreach ($users  as $item): ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $item['cate_name']?></td>
                <td><?php echo $item['cate_discription']?></td>
                <td><?php echo $item['cate_quantity']?></td>
                <td>
                    <a href="./action.php?id=<?php echo $item['cate_id'] ?>&action=edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i>Sửa</a>
                    <a href="./action.php?id=<?php echo $item['cate_id'] ?>&action=delete" class="btn btn-xs btn-danger" id="delete"><i class="fa fa-times"></i>Xóa</a>
                </td>
            </tr>
            <?php $stt++; endforeach?>
        </tbody>
    </table>
</div>
<div class="alert" role="alert" id="result"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url() ?>view/admin/theme_admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>view/admin/theme_admin/js/toastr.min.js"></script>


