 <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li class="active">Phiếu mượn</li>
        </ol>

    </div>
    <div class="table-responsive">
        <div class="row">
            <h2><div class="col-sm-8">Quản lý phiếu mượn </div></h2>
            <!-- <div class="col-sm-4">
            </div> -->
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Thông tin người mượn</th>
                <th>Thông tin người duyệt</th>
                <th>Ngày mượn</th>
                <th style="text-align: center">Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                <?php $stt=1; foreach ($transaction  as $tran): ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td>
                        <i class="fa fa-user col-lg-1 pull-left" title="Người mượn"></i>Name: <?php echo $tran['nameuser']; ?><br>
                        <i class="fa fa-mail-bulk col-lg-1 pull-left" title="Email"></i>Email: <?php echo $tran['emailuser']; ?><br>
                        <i class="fa fa-mobile-alt col-lg-1 pull-left" title="Số điện thoại"></i>Phone: <?php echo $tran['phoneuser']; ?>
                    </td>
                    <td>
                        <i class="fa fa-user col-lg-1 pull-left" title="Người cho mượn"></i>Name: <?php echo $tran['tr_handler_name']; ?><br>
                        <i class="fa fa-address-card col-lg-1 pull-left" title="Địa chỉ nhận"></i>Email: <?php echo $tran['tr_handler_email']; ?><br>
                        <i class="fa fa-mobile-alt col-lg-1 pull-left" title="Số điện thoại"></i>Phone: <?php echo $tran['tr_handler_phone']; ?>
                    </td>
                    <td><?php echo date("d/m/Y H:i:s",strtotime($tran['tr_create_at'])); ?></td>
                    <td>
                       <?php if($tran['tr_status'] == 0): ?>
                                <p><a href="./action.php?action=handling&id=<?php echo $tran['tr_id'] ?>" class="label label-default">Chưa xử lý</a></p>
                        
                            <?php  elseif($tran['tr_status'] == 1): ?>
                                <p><a href="./action.php?action=handling&id=<?php echo $tran['tr_id'] ?>"  class="label label-warning" title="Chờ giao hàng">Đã xử lý</a><br>
                                <?php echo date("d/m/Y H:i:s",strtotime($tran['tr_update_at'])); ?>
                                </p> 
                            <?php endif ; ?>
                    </td>
                    <td>
                        <a href="./action.php?action=delete&id=<?php echo $tran['tr_id'] ?>" class="btn btn-xs btn-danger" ><i class="fa fa-trash-alt"></i> Xóa</a>
                        <a href="./order.php?id=<?php echo $tran['tr_id'] ?>" class="btn btn-xs btn-warning js_order_item" data-id="<?php echo $tran['tr_id'] ?>"><i class="fa fa-eye"></i> Xem
                    </td>
                </tr>
            <?php $stt++; endforeach ?>
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
    <div class="modal fade" id="myModalOrder" role="dialog">
        <div class="modal-dialog modal-lg ">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết phiếu mượn #<b class="transaction_id"></b></h4>
                </div>
                <div class="modal-body" id="md_content">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>view/admin/theme_admin/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>view/admin/theme_admin/js/toastr.min.js"></script>
        <script>
        $(function(){
            $(".js_order_item").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $(".transaction_id").text('').text($this.attr('data-id'));

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

