
  <div class="page-header">
    <ol class="breadcrumb">
      <li><a href="../index.php">Trang chủ</a></li>
      <li class="active">Sách</li>
    </ol>

  </div>
  <div class="table-responsive">
      <div class="row">
          <div class="col-sm-4">
              <h2>Quản lý sách <a href="./action.php?action=add" class="btn btn-xs btn-success">Thêm mới</a></h2>
          </div>
          <div class="col-sm-8"><h2>
              <form class="form-inline" action="#" style="margin-bottom: 20px">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Tên sách...." name="name" value="<?php echo xss_clean($pro_search);?>" style="width:300px;">
                </div>
                <div class="form-group">
                    <select name="cate" id="" class="form-control">
                        <option value="">Thể loại</option>
                        <?php if(isset($category)): foreach($category as $cate): ?>
                          <option value="<?php echo $cate['cate_id'] ?>" 
                           <?php echo $cate_search == $cate['cate_id'] ? "selected ='selected'" : "" ?> >
                                  <?php echo $cate['cate_name'] ?>
                          </option>
                        <?php endforeach; endif ?>
                    </select>
                </div>
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </form></h2>
          </div>
      </div>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th width="1%">STT</th>
            <th width="7%">Mã sách</th>
            <th width="13%">Tên sách</th>
            <th width="10%">Thể loại</th>
            <th width="10%">Ảnh</th>
            <th width="15%">Thông tin xuất bản</th>
            <th width="7%">Số lượng</th>
            <th width="7%">Đơn giá</th>
            <th width="20%">Nội dung</th>
            <th width="10%">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php if (isset($product)): ?>
            <?php $i=1;foreach($product as $item) :?>
              <tr width="100%">
                <td><?php echo $i; ?></td>
                <td><?php echo "DOHOA_".$item['pro_id']; ?></td>
                <td><a href="#" style="font-weight: bold;text-decoration: none;"><?php echo $item['pro_name']; ?></a></td>
                <td><?php echo $item['cate_name']; ?></td>
                <td><img src="<?php echo pare_url_file($item['pro_avatar'],'product')  ?>"  class="img img-responsive"style="width: 80px;height: 100px;"></td>
                <td>
                  <i class="fa fa-user" aria-hidden="true" title="NXB"></i> <?php echo $item['pro_publisher']; ?> <br>
                  <i class="fa fa-clock-o" aria-hidden="true" title="Năm XB"></i> <?php echo $item['pro_date']; ?>
                </td>
                <td>
                  <?php if($item['pro_number']> 0): echo $item['pro_number'];?>
                  <?php else: ?> 
                          <a href="" class="label label-default">Hết sách</a><br>
                  <?php endif; ?>
                </td>
                <td><?php echo fomatprice($item['pro_price']); ?></td>
                <td><div style="height: 80px;overflow: auto;"><?php echo $item['pro_description']; ?></div></td>
                      <td>
                        <a href="./action.php?id=<?php echo $item['pro_id'] ?>&action=edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Sửa</a>
                        <a href="./action.php?id=<?php echo $item['pro_id'] ?>&action=delete" class="btn btn-xs btn-danger" ><i class="fa fa-times"></i>Xóa</a>
                    </td>
                </tr>
                <?php $i++; endforeach ?>
              <?php endif; ?>
        </tbody>
    </table>
      <div class=" pull-right">
        <nav class="text-right">
          <?php if (isset($sotrang)): ?>
             <ul class="pagination ">
                <?php for ($i=1; $i <= $sotrang; $i++) : ?>
                  <li class="">
                    <a href="<?php echo $path ?> ? p=<?php echo $i?>">
                      <?php echo $i; ?>
                    </a>
                    </li>

                  <?php endfor; ?>
              </ul>
        <?php endif ?>
            </nav>
      </div>
</div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url() ?>view/admin/theme_admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>view/admin/theme_admin/js/toastr.min.js"></script>
    </body>
</html>