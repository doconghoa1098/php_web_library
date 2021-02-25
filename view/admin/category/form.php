<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Thể loại sách</label>
        <input type="text" class="form-control" placeholder="Tên thể loại sách" value="<?php echo $cate_old['cate_name']?>" name="cate_name">   
        <?php if (isset($error['cate_name'])) :?>
            <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                <?php echo $error['cate_name']; ?>
            </span>
        <?php endif ?> 
    </div>
    <div class="form-group">
        <label for="name">Mô tả ngắn</label>
        <textarea class="form-control" placeholder="mô tả ngắn" name="cate_discription" rows="3"><?php echo $cate_old['cate_discription']?></textarea> 
    </div>
    <button type="submit" class="btn btn-success " id="toastr_alert">Lưu thông tin</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script src="<?php echo base_url() ?>view/admin/theme_admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>view/admin/theme_admin/js/toastr.min.js"></script>


