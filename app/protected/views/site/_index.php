<ol class="breadcrumb">
    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site">หน้าหลัก</a></li>
    <li>ปฏิทินกิจกรรมการใช้รถ</li>
</ol>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">ปฏิทินกิจกรรมการใช้รถ</a></li> 
    </ul>

    <!-- Carlendar -->
    <div id="tabs-1">
        <div>
            <b>สีสัญลักษณ์รถ:</b>
            <label style="background-color:#3986AA;height:25px;width:200px;">
                <center>    
                    ยังไม่ได้ระบุรถ
                </center>
            </label>
            <?php
            
                $cars = Car::model()->findAll(); 
                
                foreach($cars as $car) {
                    ?>
            <label style="background-color:#<?php echo $car->color;?>;height:25px;width:200px;">
                <center>    
                    <?php echo $car->name;?>
                    ทะเบียน:<?php echo $car->serial;?>
                </center>
            </label>
                                
                <?php
                    }
                               
            ?>
        </div>
        
        <div class="pull-right" style="padding-bottom:10px">
            <?php if (Yii::app()->session["username"] == null){ ?>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/frmlogin" class="btn btn-info" role="button"><i class="glyphicon glyphicon-plus-sign"></i> เพิ่มกิจกรรมการขอใช้รถ</a>
            <?php } else {?>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/orders" class="btn btn-info" role="button"><i class="glyphicon glyphicon-plus-sign"></i> เพิ่มกิจกรรมการขอใช้รถ</a>
            <?php } ?>
        </div>
        <br/><br/>
        <div id="calendar"></div>
    </div>

    
</div>


<script language="javascript">

    $(function () {
        // Tab
        $("#tabs").tabs();



        // Calendar
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
    echo "title: '" . 'เรื่อง' . $data->title . ' (ผู้ขอ: ' . $data->person_name . ')' . "',";
    echo "start: new Date(" . $year_created . "," . $month_created . "," . $day_created . "," . $hour_created . "," . $min_created . "),";
    echo "end: new Date(" . $year_success . "," . $month_success . "," . $day_success . "," . $hour_success . "," . $min_success . "),";
    echo "url: '" . Yii::app()->createUrl('site/orders', array("id" => $data->id)) . "',";
    echo "color: '" . $color . "',";
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