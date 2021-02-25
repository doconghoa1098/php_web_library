<style type="text/css">
    .avatar{
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }
</style>
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="../index.php">Trang chủ</a></li>
            <li class="active">Người dùng</li>
        </ol>

    </div>
    <div class="table-responsive">
        <div class="row">
          <div class="col-sm-9">
              <h2>Quản lý người dùng</h2>
          </div>
          <div class="col-sm-3"><h2>
              <form class="form-inline" action="#" style="margin-bottom: 20px">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Email" name="name" value="">
                </div>
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </form></h2>
          </div>
      </div>
        <!-- <h2>Quản lý người dùng <a href="" class="btn btn-xs btn-success ">Nâng cấp người dùng</a></h2> -->
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Avatar</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
                <th width="10%">Action</th>
            </tr>
            </thead>
            <tbody> 
                 <?php $stt=1; foreach ($users  as $item): ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><img src="<?php echo pare_url_file($item['u_avatar'],'users') ?>" class="avatar"></td>
                        <td><?php echo $item['u_name']?><br>
                            <?php if($item['u_roles']==1) :?>
                                <a href="#" class="label label-warning">ADMIN</a>
                            <?php elseif($item['u_roles']==2&&$item['u_is_working']==1&&$item['u_is_lock']==0) :?>
                                <a href="#"  class="label label-primary">THỦ THƯ</a>
                            <?php elseif($item['u_roles']==3):?>
                                <a href="#"  class="label label-success">GIẢNG VIÊN</a>
                            <?php else:?>
                                <a href="#"  class="label label-success">SINH VIÊN</a>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $item['u_email']?></td>
                        <td><?php echo $item['u_phone']?></td>
                        <td><?php echo $item['u_address']?></td>
                        <td>
                         <!-- 1-> đã active;2-> bình thường,3->đã nghỉ việc,4-> đã band  -->
                            <?php if($item['u_active']==0) :?>
                                <a href="action.php?id=<?php echo $item['u_id'] ?>&action=active"  class="label label-info" title="no_active <=> active">Chưa active</a>
                            <?php elseif($item['u_active']==1) :?>
                                <a href="action.php?id=<?php echo $item['u_id'] ?>&action=active"  class="label label-primary" title="no_active <=> active">Đã active</a>
                            <?php endif; if($item['u_is_lock']==0) :?>
                                <a href="action.php?id=<?php echo $item['u_id'] ?>&action=lock" class="label label-warning" title="band <=> exit_band">Bình thường</a>
                            <?php elseif($item['u_is_lock']==1) :?>
                                <a href="action.php?id=<?php echo $item['u_id'] ?>&action=lock"  class="label label-default" title="band <=> exit_band">Bị khóa</a>
                            <?php endif ?>
                        </td>
                        <td>
                            <a href="./action.php?id=<?php echo $item['u_id'] ?>&action=delete" class="btn btn-xs btn-danger" ><i class="fa fa-times"></i> Xóa</a><br>
                            <?php if($item['u_roles']==0||$item['u_roles']==3) :?>
                            <a href="./action.php?id=<?php echo $item['u_id'] ?>&action=upgrade" class="btn btn-xs btn-primary" style="margin-top: 5px" ><i class="fa fa-handshake"></i> Cấp quyền thủ thư</a>
                            <?php endif; ?>
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

                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>/view/admin/theme_admin/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>/view/admin/theme_admin/js/toastr.min.js?>"></script>
    </body>
</html>