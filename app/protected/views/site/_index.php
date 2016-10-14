<ol class="breadcrumb">
    <li><a href="#">ส่วนผู้ใช้</a></li>
    <li class="active">ปฏิทินกิจกรรมการใช้รถ</li>
</ol>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">ปฏิทินการใช้รถ</a></li>
        <li><a href="#tabs-2">ประวัติการขอใช้รถ</a></li>
    </ul>

    <!-- Carlendar -->
    <div id="tabs-1">
        <div class="pull-right" style="padding-bottom:10px"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/orders" class="btn btn-info" role="button"><i class="glyphicon glyphicon-plus-sign"></i> เพิ่มกิจกรรมการขอใช้รถ</a></div>
        <br/><br/>
        <div id="calendar"></div>
    </div>
    
    <div id ="tabs-2">
        <?php
			$this->widget('zii.widgets.grid.CGridView', array(
				'id' => 'car-grid',
				'dataProvider' => $provider,
				'columns' => array(
                                        'title',
					'person_name',
					'datetogo',
                                        'datetosuccess',
                                        'person_number',
                                        'status',
					array(
						'header' => 'แก้ไข',
						'class' => 'CLinkColumn',
						'imageUrl' => 'images/edit.png',
						'labelExpression' => 'แก้ไขข้อมูล',
						 'urlExpression' => 'Yii::app()->createUrl("site/car",array("id"=>$data->id))',
						'htmlOptions' => array(
                			'style' => 'text-align:center',
                			'id' => 'opener'
            			)
					),

				)
			));
		?>
    </div>

</div>


<script language="javascript">

    $(function () {
        $("#tabs").tabs();

        $('#calendar').fullCalendar({
            lang: 'th',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'month',
            editable: true,
            events: [
<?php
foreach ($model as $data) {

    // step 1 set compare url with action and icon image status
    if ($data->status == "รออนุมัติ") {
        $url = "site/orders";
        $img = "images/edit.png";
        //	$image = "edit.png";
    } else if ($data->status == "อนุมัติ") {
        $url = "site/card";
        $img = "images/car.png";
    } else {
        $url = "site/orders";
        $img = "images/delete.png";
    }

    // step 2 convert datetime
    $year_created = date("Y", strtotime($data->datetogo));
    $month_created = date("m", strtotime($data->datetogo)) - 1;
    $day_created = date("d", strtotime($data->datetogo));
    $hour_created = date("H", strtotime($data->datetogo));
    $min_created = date("i", strtotime($data->datetogo));

    $year_success = date("Y", strtotime($data->datetosuccess));
    $month_success = date("m", strtotime($data->datetosuccess)) - 1;
    $day_success = date("d", strtotime($data->datetosuccess));
    $hour_success = date("H", strtotime($data->datetosuccess));
    $min_success = date("i", strtotime($data->datetosuccess));

    // step 3 set color for car event
    $color = "#" . $data->car->color;


    // step 4 set properties for fullcalendar
    echo "{";
    echo "title: '" . $data->activities->name . "',";
    echo "start: new Date(" . $year_created . "," . $month_created . "," . $day_created . "," . $hour_created . "," . $min_created . "),";
    echo "end: new Date(" . $year_success . "," . $month_success . "," . $day_success . "," . $hour_success . "," . $min_success . "),";
    echo "url: '" . Yii::app()->createUrl('site/orders', array("id" => $data->id)) . "',";
    echo "color: '" . $color . "',";
    echo "imageurl:'" . $img . "'";
    echo "},";
}
?>
            ],
            eventClick: function (event) {
                if (event.url) {
                    window.open(event.url, "_blank");
                    return false;
                }
            },
            eventRender: function (event, eventElement) {
                if (event.imageurl)
                {
                    eventElement.find("div.fc-event-inner").prepend("&nbsp;<img src='" + event.imageurl + "' width='32' height='32'>&nbsp;");
                }
            },
        });


    });



</script>