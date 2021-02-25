<style type="text/css">
  
.table_1{ 
  border-spacing: 1; 
  border-collapse: collapse; 
  background:white;
  border-radius:4px;
  overflow:hidden;
  max-width:800px; 
  width:100%;
  margin:0 auto;
  position:relative;
  font:400 20px 'Calibri','Arial';
  padding:20px;
}
.th_1,.td_1{
  border: 1px solid #F81212;
  text-align: center;
  width: 16%;
  height: 60px;
}
.th_1{background-color: #65CC0A}
.td_1{background-color: #FFFF}
.info > .avatar{width: 20%;height: 20%;border-radius: 50%;margin-left: 40%;}
.info >ul{margin-top: 1%;list-style: none;}
.info > ul > li{margin-left: 38%;font-weight: bold;font-style: italic;}
.info > ul > li > span{color: #F70F0F}
.star {margin-left: 48%;color: #0c2bd5;}
.tbl_name{text-transform: uppercase;color: #F70F0F;font-style: italic; }
</style>
<div class="info">
  <img src="<?php echo pare_url_file($users_id['u_avatar'],'users') ?>" class="avatar">
  <ul>
    <li>Họ tên: <span><?php echo $users_id['u_name'] ; ?></span></li>
    <li>Email: <span><?php echo $users_id['u_email'] ; ?></span></li>   
    <li>Phone: <span><?php echo $users_id['u_phone'] ; ?></span></li>
    <li>Address: <span><?php echo $users_id['u_address'] ; ?></span></li>
    <li>Chức vụ: <span>
      <?php if ($users_id['u_roles'] ==1): ?>QUẢN TRỊ VIÊN
       <?php else: ?>THỦ THƯ
      <?php endif ?>
      </span>
    </li>
    <li>Trạng thái: <span>
      <?php if($users_id['u_is_working']!=2 && $users_id['u_is_lock']!=1) :?> Bình thường
      <?php elseif($users_id['u_is_working']==2) :?>Đã nghỉ việc
      <?php elseif($users_id['u_is_lock']==1) :?>Bị khóa
      <?php endif ?>
      </span>   
    </li>
  </ul>
</div>
<div class="star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><br>

