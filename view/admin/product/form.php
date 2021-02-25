<div class="col-md-12">
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Thể loại sách</label>
                    <div class="col-sm-8">
                        <select class="form-control col-md-8" name="pro_category_id">
                          <option value="<?php echo $pro_old['']?>">---Chọn thể loại sách---</option>
                           <?php if(isset($category)): ?>
                                <?php foreach ($category as $item ) : ?>
                                  <option value="<?php echo $item['cate_id'] ?>" 
                <?php echo $pro_old['pro_category_id']==$item['cate_id'] ? "selected= 'selected' " : '' ?> >
                                    <?php echo $item['cate_name'] ?>
                                  </option>
                                <?php endforeach?> 
                           <?php endif;  ?>
                        </select>
                        <?php  if(isset($error['pro_category_id'])): ?>
                            <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                              <?php echo $error['pro_category_id']; ?>
                            </span>
                         <?php endif;  ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tên sách</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Kĩ thuật giấu tin" 
                        name="pro_name" value="<?php echo $pro_old['pro_name']?>">
                        <?php  if(isset($error['pro_name'])): ?>
                            <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                              <?php echo $error['pro_name']; ?>
                          </span>
                         <?php endif;  ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nhà xuất bản</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="BGD&ĐT" name="pro_publisher" value="<?php echo $pro_old['pro_publisher']?>">
                        <?php  if(isset($error['pro_publisher'])): ?>
                            <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                              <?php echo $error['pro_publisher']; ?>
                          </span>
                         <?php endif;  ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Năm xuất bản</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" id="inputEmail3" placeholder="2003" name="pro_date" value="<?php echo $pro_old['pro_date']?>" min="1">
                        <?php  if(isset($error['pro_date'])): ?>
                            <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                              <?php echo $error['pro_date']; ?>
                          </span>
                         <?php endif;  ?>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">Đơn giá</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" id="inputEmail3" placeholder="100.000" name="pro_price" value="<?php echo $pro_old['pro_price']?>" min="0">
                        <?php  if(isset($error['pro_price'])): ?>
                            <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                              <?php echo $error['pro_price']; ?>
                          </span>
                         <?php endif;  ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Số lượng</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" id="inputEmail3"  name="pro_number" value="<?php echo $pro_old['pro_number']?>" min="1" >
                        <?php  if(isset($error['pro_number'])): ?>
                          <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                              <?php echo $error['pro_number']; ?>
                          </span>
                        <?php endif;  ?>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
                    <div class="col-sm-3">
                     <input type="file" class="form-control" id="input_img"  name="pro_avatar" >
                        <img id="out_img"  src="<?php echo pare_url_file($pro_old['pro_avatar'],'product') ?>" alt="" style="height: 100px;width: 80px">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Mô tả ngắn</label>
                    <div class="col-sm-8">
                        <textarea class="form-control ckeditor" name="pro_description" rows="10" placeholder="Mô tả sản phẩm" ><?php echo $pro_old['pro_description']; ?></textarea>
                        <?php  if(isset($error['pro_description'])): ?>
                            <span class="errors-text" style="color: red;font-style: italic; font-size: 12px;">
                              <?php echo $error['pro_description']; ?>
                          </span>
                     <?php endif;  ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url() ?>view/admin/theme_admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>view/admin/theme_admin/js/toastr.min.js"></script>
    <script type="text/javascript">
        var editor = CKEDITOR.replace('pro_description',{
          language : 'vi',
          filebrowserImageBrowseUrl : "<?php echo base_url() ?>view/ckfinder/ckfinder.html?Type=Images",
          filebrowserFlashBrowseUrl : "<?php echo base_url() ?>view/ckfinder/ckfinder.html?Type=Flash",
          filebrowserImageUploadUrl : "<?php echo base_url() ?>view/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",
          filebrowserFlashUploadUrl : "<?php echo base_url() ?>view/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash",
        });
    </script>
 <script type="text/javascript">
     config = {};
     config.toolbarGroups = [
         { name: 'clipboard', groups: [ 'undo', 'clipboard' ] },
         { name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks', 'bidi', 'paragraph' ] },
         { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
         { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
         { name: 'forms', groups: [ 'forms' ] },
         { name: 'colors', groups: [ 'colors' ] },
         { name: 'links', groups: [ 'links' ] },
         { name: 'insert', groups: [ 'insert' ] },
         { name: 'tools', groups: [ 'tools' ] },
         { name: 'others', groups: [ 'others' ] },
         { name: 'about', groups: [ 'about' ] },
         { name: 'document', groups: [ 'document', 'mode', 'doctools' ] },
         { name: 'styles', groups: [ 'styles' ] },

     ];
     config.removeButtons = 'About,ShowBlocks,Image,Flash,Table,HorizontalRule,SpecialChar,PageBreak,Iframe,Anchor,Unlink,Link,BidiLtr,BidiRtl,Language,CreateDiv,Outdent,Indent,CopyFormatting,Subscript,Superscript,RemoveFormat,Form,Radio,Select,Button,ImageButton,HiddenField,Textarea,TextField,SelectAll,Find,Replace,Cut,Templates,Save,NewPage,Print,Checkbox,Blockquote,PasteText,PasteFromWord,Copy';

     CKEDITOR.replace('pro_content',config);
 </script>

