
<!-- 
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script> -->

    <h1 class="page-header">Tổng quan</h1>
<div class="row placeholders">
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
        <img alt="Generic placeholder thumbnail" class="img-responsive" height="200" src="<?php echo base_url() ?>view/img/theme_admin/tronhong.png" width="200"><h4 style="position: absolute; top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: whitesmoke" >
            <img src="<?php echo base_url() ?>view/img/theme_admin/khuyenmai.jpg" alt="" height="30px" style="margin-top:-40%"><br> 99 <hr>Phiếu mượn sách mới trong ngày</h4></img>

    </div>
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
        <img alt="Generic placeholder thumbnail" class="img-responsive" height="200" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200"><h4 style="position: absolute; top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: whitesmoke">300 <hr>Tổng phiếu mượn</h4></img> 
    </div>
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
        <img alt="Generic placeholder thumbnail" class="img-responsive" height="200" src="<?php echo base_url() ?>view/img/theme_admin/tronxanhnhe.png" width="200"><h4 style="position: absolute; top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: whitesmoke">20000 <hr> Loại sách</h4></img>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
        <img alt="Generic placeholder thumbnail" class="img-responsive" height="200" src="<?php echo base_url() ?>view/img/theme_admin/red.png" width="200"><h4 style="position: absolute; top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: whitesmoke">1000 <hr>Người dùng</h4></img>
    </div>
</div>
<hr>
 <div class="col-sm-12">
    <h2 class="sub-header">Thống kê trong ngày</h2>
    <div class="table-responsive">
        <g class="highcharts-range-selector-group" transform="translate(0,54)">
            <form  action="" >
                <input type="date" name="date" class="btn btn-xs btn-default" value="">
                <button type="submit" class="btn btn-xs btn-default" title="Thống kê"><i class="fa fa-search"></i></button>
            </form>
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
        </div>
    </div>
</div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/view/admin/theme_admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>/view/admin/theme_admin/js/toastr.min.js?>"></script>
<!-- <script>
        let data = "{{ $dataMoney }}";
        dataChart = JSON.parse(data.replace(/&quot;/g,'"'));

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Biểu đồ doanh thu '
            },
            subtitle: {
                // text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Mức độ'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y: 1f}.VNĐ'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y: 1f}.VNĐ</b><br/>'
            },

            series: [
                {
                    name: "Cửa hàng",
                    colorByPoint: true,
                    data: dataChart
                }
            ],
        });
    </script> -->

