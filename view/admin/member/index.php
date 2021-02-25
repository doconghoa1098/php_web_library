
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="../index.php">Trang chủ</a></li>
            <li class="active">Thành viên</li>
        </ol>

    </div>
    <div class="table-responsive">
        <h2>Quản lý nhân viên <a href="./action.php?action=add" class="btn btn-xs btn-success">Thêm mới</a></h2>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Chức vụ</th>
                <th>Trạng thái</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
<?php if (isset($users)): ?>
            <?php $i=1;foreach($users as $item) :?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $item['u_name'] ?></td>
                            <td><?php echo $item['u_email']?></td>
                            <td><?php echo $item['u_phone']?></td>
                            <td>
                                <?php if($item['u_roles']==1) :?>
                                    <a href="#" class="label label-warning">QUẢN TRỊ VIÊN</a>
                                <?php elseif($item['u_roles']==2) :?>
                                    <a href="#"  class="label label-default">THỦ THƯ</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($item['u_is_working']!=2 && $item['u_is_lock']!=1) :?>
                                    <a href="./action.php?id=<?php echo $item['u_id'] ?>&action=quit_job" class="label label-primary">Bình thường</a>
                                <?php elseif($item['u_is_working']==2) :?>
                                    <a href="./action.php?id=<?php echo $item['u_id'] ?>&action=quit_job"  class="label label-danger">Đã nghỉ việc</a>
                                <?php elseif($item['u_is_lock']==1) :?>
                                    <a href="./action.php?id=<?php echo $item['u_id'] ?>&action=lock"  class="label label-default">Bị khóa</a>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="./action.php?id=<?php echo $item['u_id'] ?>&action=edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i>Sửa</a>
                                <a href="./action.php?id=<?php echo $item['u_id'] ?>&action=delete" class="btn btn-xs btn-danger" ><i class="fa fa-times"></i>Xóa</a>
                                <a href="./roles.php?id=<?php echo $item['u_id'] ?>" class="btn btn-xs btn-warning js_order_item" data-name="<?php echo $item['u_name'] ?>"><i class="fa fa-eye"></i> Xem chi tiết
                            </td>
                        </tr>
            <?php $i++; endforeach ?>
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
<?php endif; ?>
   <div class="modal fade" id="myModalOrder" role="dialog">
        <div class="modal-dialog modal-lg ">

            <!-- Modal content-->
            <div class="modal-content" style="background-color: #e1f6ff">
            <!-- <div class="modal-content" style="background-image: url('<?php echo base_url() ?>view/img/1.jpg');color: white"> -->
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết #<b class="transaction_id"></b></h4>
                </div>
                <div class="modal-body" id="md_content">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    
                </div>
            </div>

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
        <script>
            $(function(){
                $(".js_order_item").click(function (event) {
                    event.preventDefault();
                    let $this = $(this);
                    let url = $this.attr('href');
                    $(".transaction_id").text('').text($this.attr('data-name'));

                    $("#myModalOrder").modal('show');
                    $.ajax({
                        url: url,
                    }).done(function (result) {
                        if(result)
                        {
                            $("#md_content").html('').append(result);
                        }
                        // console.log(result);
                    });
                });
            })
        </script>