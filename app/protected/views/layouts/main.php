<?php
@ob_start();
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ระบบจัดการยานพาหนะ เวอร์ชั่น 1.0 พัฒนาโดย นายจีระยุทธ ปิ่นสุวรรณ</title>

        <!-- import css bootstrap -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css" />

        <!-- import css jquery-ui -->
        <link rel="stylesheet" href="../jquery-ui/css/humanity/jquery-ui.1.11.1.custom.min.css" />
         <link rel="stylesheet" href="../jquery-ui/css/humanity/jquery-ui.theme.min.bak.css" />

        <!-- import css datetimepicker -->
        <link rel="stylesheet" href="../datetimepicker/jquery.datetimepicker.css" />

        <!-- import css fullcalendar -->
        <link rel="stylesheet" href="../fullcalendar/fullcalendar.css" />

        <!-- import css picker color -->
        <link rel="stylesheet" href="../colorpicker/lib/1.2.3/css/pick-a-color-1.2.3.min.css"

              <!-- import css custom -->
              <link rel="stylesheet" href="../_style.css" />

    </head>

    <body>

        <!-- Design Layout Top Navigation Bar-->
        <div class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-head">
                    <a class="navbar-brand">ระบบจัดการยานพาหนะ</a>
                </div>
                <div class="collapse navbar-collapse">



                    <ul class="nav navbar-nav navbar-right">
                        <?php if (Yii::app()->session["username"] != null) { ?>
                        
                      
                            <li >
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site" ><i class="glyphicon glyphicon-calendar"></i> ปฏิทินขอรถ </a>
                            </li> 
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/ordershistory" ><i class="glyphicon glyphicon-calendar"></i> ประวัติขอรถ </a>
                            </li>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/graph" ><i class="glyphicon glyphicon-signal"></i> กราฟสถิติ </a>
                            </li>
                            
                                                 
                        <?php if ((Yii::app()->session["user_type"] == "แอดมิน") OR (Yii::app()->session["user_type"] == "ผู้อนุมัติ")){ ?>
                           
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-th-list"></i> รายงานการใช้รถ <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=report/getform&form=form_default&point=countuser"><i class="glyphicon glyphicon-list-alt"></i> รายงานผู้ขอใช้รถ</a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=report/getform&form=form_car&point=countcar"><i class="glyphicon glyphicon-list-alt"></i> รายงานการใช้รถแต่ละคัน </a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=report/getform&form=form_default&point=countdriver"><i class="glyphicon glyphicon-list-alt"></i> รายงานครั้งการทำงานของ พขร.</a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=report/getform&form=form_default&point=countrepair"><i class="glyphicon glyphicon-list-alt"></i> รายงานการซ่อมรถ</a></i>
                                </ul>
                            </li>
                        <?php } ?>
                            
                            
                              <?php if (Yii::app()->session["user_type"] == "แอดมิน"): ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i> ตั้งค่า <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/brand"><i class="glyphicon glyphicon-pencil"></i> หน่วยงาน</a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/user"><i class="glyphicon glyphicon-user"></i> ผู้ใช้งานโปรแกรม</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/car"><i class="glyphicon glyphicon-road"></i> รถยนต์</a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/company"><i class="glyphicon glyphicon-user"></i> ผู้ขอใช้รถ</a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/driver"><i class="glyphicon glyphicon-user"></i> พนักงานขับรถ</a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/activities"><i class="glyphicon glyphicon-pencil"></i> กิจกรรมการใช้รถ</a></li>
                                </ul>
                            </li>
                        <?php endif ?>
                            
                            
                            <li><a href="#"><i class="glyphicon glyphicon-user"></i> <?php echo Yii::app()->session["username"]; ?></a></li>
                            <li><a class="confirm-link" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/logout")"><i class="glyphicon glyphicon-off"></i> ออกจากระบบ</a></li>

                        <?php } else { ?>
                            <li><a  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site"><i class="glyphicon glyphicon-calendar"></i> ปฏิทินกิจกรรม</a></li>
                            <li><a  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/frmlogin"><i class="glyphicon glyphicon-lock"></i> เข้าสู่ระบบ</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>

        <!-- Design Layout Content -->
        <div class="container" id="content">
            <?php echo $content; ?>
        </div>

        <!-- Dialog Logout -->
        <div id="dialog" style="display:none" >
            คุณต้องการออกจากโปรแกรม?
        </div>
        
        <!-- import jquery libary -->
        <?php
        // import js standard jquery
        //Yii::app()->clientScript->registerScriptFile("../jquery.js");

        // import js bootstrap3
        Yii::app()->clientScript->registerScriptFile("../bootstrap/js/bootstrap.min.js");

        // import js jquery ui
        Yii::app()->clientScript->registerScriptFile("../jquery-ui/js/jquery-ui-1.11.1.custom.min.js");

        // import js datetime picker
        Yii::app()->clientScript->registerScriptFile("../datetimepicker/jquery.datetimepicker.js");

        // import js fullcalendar
        Yii::app()->clientScript->registerScriptFile("../fullcalendar/lib/moment.min.js");
        Yii::app()->clientScript->registerScriptFile("../fullcalendar/fullcalendar.min.js");
        Yii::app()->clientScript->registerScriptFile("../fullcalendar/lang-all.js");

        // import js color picker libary
        Yii::app()->clientScript->registerScriptFile("../colorpicker/lib/dependencies/tinycolor-0.9.15.min.js");
        Yii::app()->clientScript->registerScriptFile("../colorpicker/lib/1.2.3/js/pick-a-color-1.2.3.min.js");

        // import js highchart
        Yii::app()->clientScript->registerScriptFile("../highcharts/highcharts.js");
      
        // import js custom
        Yii::app()->clientScript->registerScriptFile("../_js.js");
        ?>

    </body>

</html>


<script  language="javascript">

    $(function () {
        $("#dialog").dialog({
            autoOpen: false,
            modal: true
        });

        $(".confirm-link").click(function (e) {
            e.preventDefault();
            var targetUrl = $(this).attr("href");

            $("#dialog").dialog({
                buttons: {
                    "OK": function () {
                        window.location.href = targetUrl;
                    },
                    "Cancel": function () {
                        $(this).dialog("close");
                    }
                }
            });

            $("#dialog").dialog("open");
        });
    });


</script>