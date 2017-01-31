<ol class="breadcrumb">
    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/graph">หน้าหลัก</a></li>
    <li>กราฟสถิติการขอใช้รถ</li>
</ol>


<div id="tabs">
    <ul>
        <li><a href="#tabs-1">กราฟสถิติการขอใช้รถ</a></li> 
    </ul>


    <div id ="tabs-1"> 
        <div id="container" style="width:70%; height:400px;"></div>
    </div>

</div>

<?php
  Yii::app()->clientScript->registerScriptFile("../jquery.js");
?>
<script language="javascript">

    $(function () {
        // Tab
        $("#tabs").tabs();
        
        $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Fruit Consumption'
            },
            xAxis: {
                categories: ['Apples', 'Bananas', 'Oranges']
            },
            yAxis: {
                title: {
                    text: 'Fruit eaten'
                }
            },
            series: [{
                    name: 'Jane',
                    data: [1, 0, 4]
                }, {
                    name: 'John',
                    data: [5, 7, 3]
                }],
        });



    });

</script>


