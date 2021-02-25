
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã sách</th>
            <th>Tên sách</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Time mượn</th>
        </tr>
        </thead>
        <tbody>
        <?php $sum=0;$i =1 ; foreach ($orders as $item):?>
            <tr>
                <td><?php echo $i; ?></td>
                <td align="center"><?php echo "DOHOA_".$item['or_product_id']; ?></td>
                <td><a href=""><?php echo $item['pro_name']; ?></a>
                    <br>Kho còn: <?php echo $item['pro_number']; ?> cuốn</td>
                <td>
                    <img style="height: 100; width: 80px" src="<?php echo pare_url_file($item['pro_avatar'],'product')  ?>" alt="">
                </td>
                <td align="center"><?php echo $item['or_quantity']; ?></td>
                <td><?php echo date("d/m/Y H:i:s",strtotime($item['or_create_at'])); ?></td>
            </tr>
            <?php $sum+= $item['or_quantity'];$i++ ;endforeach;?>
        </tbody>
    </table>
   <span class="pull-right" style="color: #00AA00;font-weight: bold"> Tổng mượn: <?php echo $sum; ?> cuốn</span><br>
