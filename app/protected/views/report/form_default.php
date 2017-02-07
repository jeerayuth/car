<?php Yii::app()->clientScript->registerScriptFile("../jquery.js"); ?>

<ol class="breadcrumb">
    <li><a href="#">รายงาน</a></li>
    <li class="active">รายงานการใช้รถยนต์</li>
</ol>

<div class="alert alert-info">
    <i class="glyphicon glyphicon-list-alt"></i> รายงานการใช้รถยนต์
</div>

<div class="panel panel-default">
    <div class="panel-heading">เลือกช่วงวันที่ทำรายงาน</div>
    <div class="panel-body">
        <form>
            <div>วันที่เริ่มต้น: 
                <input type="text" name="datestart" id="datestart" class="form-control" style="width:200px" />
            </div>
            <div style="padding-top:10px">วันที่สิ้นสุด: 
                <input type="text" name="dateend" id="dateend" class="form-control" style="width:200px" />
            </div>
            <div style="padding-top:10px">
                <input type="button" class="btn btn-success" onclick ="javascript:url();" value="แสดงข้อมูล"/>
            </div>
        </form>
    </div>
</div>


<script language="javascript">
    $(function () {
        $("#datestart").datetimepicker({
            lang: 'th',
            timepicker: false,
            format: 'Y-m-d',
        });
    });

    $(function () {
        $("#dateend").datetimepicker({
            lang: 'th',
            timepicker: false,
            format: 'Y-m-d',
        });
    });

    //function เรียกหน้ารายงาน
    function url() {
        datestart = $('#datestart').val();
        dateend = $('#dateend').val();
        window.open('http://192.168.1.252/car/app/reports/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=<?= $point; ?>.mrt&datestart=' + datestart + '&dateend=' + dateend);
    }

</script>