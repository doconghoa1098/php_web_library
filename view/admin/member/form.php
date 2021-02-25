<hr>
<div class="col-md-12">
            <form class="form-horizontal" action="" method="POST"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tên thành viên</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Đỗ Công Hòa" name="username" value="<?php echo $user_old['u_name']; ?>">
                        <?php if (isset($error['u_name'])) :?>
                            <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                              <?php echo $error['u_name']; ?>
                                </span>
                       <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" placeholder="email" name="email" value="<?php echo $user_old['u_email']; ?>">
                       <?php if (isset($error['u_email'])) :?>
                            <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                              <?php echo $error['u_email']; ?>
                                </span>
                       <?php endif ?>
                    </div>
                </div>
              <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" placeholder="*******"
                               value="<?php echo $user_old['u_password']; ?>"><a href="javascript:void(0)" style="position: absolute;top:16%;right: 22px"><i class="fa fa-eye"></i></a>
                        <?php if (isset($error['u_password'])) :?>
                            <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                              <?php echo $error['u_password']; ?>
                                </span>
                       <?php endif ?>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" placeholder="phone" name="phone" value="<?php echo $user_old['u_phone']; ?>">
                    <?php if (isset($error['u_phone'])) :?>
                            <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                              <?php echo $error['u_phone']; ?>
                                </span>
                       <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="address" name="address" value="<?php echo $user_old['u_address']; ?>">
                    <?php if (isset($error['u_address'])) :?>
                            <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                              <?php echo $error['u_address']; ?>
                                </span>
                       <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Avatar</label>
                    <div class="col-sm-3">
                        <input type="file" class="form-control" id="input_img"  name="avatar" value="">
                      <img id="out_img"  src="<?php echo pare_url_file($user_old['u_avatar'],'users') ?>" alt="" style="height: 100px;width: 100px">
                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">Ngày sinh:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"  name="date" value="<?php echo $user_old['u_date']; ?>">
                    </div>
                </div>
                <?php if ($id_roles == 1): ?><!-- là admin mới hiển thị cho chọn chức vụ để thêm hay sửa nv-->
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Chức vụ</label>
                    <div class="col-sm-3">
                    <select class="form-control col-md-8" name="roles">
                        <!-- <option value="">---Chọn chức vụ---</option> -->
                        <option value="1" <?php echo $user_old['u_roles']==1?'selected':'';?>>QUẢN TRỊ VIÊN</option>
                        <option value="2" <?php echo $user_old['u_roles']==2?'selected':'';?>>THỦ THƯ</option>
                        <option value="3" <?php echo $user_old['u_roles']==3?'selected':'';?>>Cán bộ</option>
                        <option value="0" <?php echo $user_old['u_roles']==0?'selected':'';?>>Sinh viên</option>
                    </select>
                    </div>
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url() ?>view/admin/theme_admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>view/admin/theme_admin/js/toastr.min.js"></script>
<script>
        $(function(){
            $(".form-group a").click(function () {
                let $this = $(this);
                if($this.hasClass('active'))
                {
                    $this.parents('.form-group').find('input').attr('type','text')
                    $this.removeClass('active');
                }else
                {
                    $this.parents('.form-group').find('input').attr('type','password')
                    $this.addClass('active');
                }
            });
        })
</script>


