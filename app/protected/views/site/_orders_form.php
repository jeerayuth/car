<ol class="breadcrumb">
    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/ordershistory">ประวัติขอรถ</a></li>
    <li class="active">บันทึกข้อมูลการขอใช้รถ</li>
</ol>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">
                ข้อมูลการขอใช้รถ
            </a>
        </li>
    </ul>

    <!-- Form -->
    <div id="tabs-1">


        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'htmlOptions' => array(
                'class' => 'form-inline',
            ),
        ));
        ?>
        <div>
            <?php echo $form->errorSummary($model); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, "title"); ?>
            <?php if (Yii::app()->session["username"] == null) { ?>
                <?php echo $form->textField($model, "title", array("class" => "form-control", "style" => "width: 600px;", "readonly" => true)); ?>
            <?php } else { ?>
                <?php echo $form->textField($model, "title", array("class" => "form-control", "style" => "width: 600px;")); ?> 
            <?php } ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, "company_id"); ?>
            <?php
            $opts = CHtml::listData(Company::model()->findAll(), 'id', 'name');
            ?>
            <?php if (Yii::app()->session["username"] == null) { ?>
                <?php echo $form->dropDownList($model, 'company_id', $opts, array("class" => "form-control", "style" => "width: 280px;", "disabled" => "disabled", "empty" => "--เลือกหน่วยงานที่ต้องการใช้รถ--")); ?>
            <?php } else { ?>
                <?php echo $form->dropDownList($model, 'company_id', $opts, array("class" => "form-control", "style" => "width: 280px;", "empty" => "--เลือกหน่วยงานที่ต้องการใช้รถ--")); ?>
            <?php } ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, "person_name"); ?>
            <?php if (Yii::app()->session["username"] == null) { ?>
                <?php echo $form->textField($model, "person_name", array("class" => "form-control", "style" => "width: 280px;", "readonly" => true)); ?>
            <?php } else { ?>
                <?php echo $form->textField($model, "person_name", array("class" => "form-control", "style" => "width: 280px;")); ?>
            <?php } ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, "person_position"); ?>
            <?php if (Yii::app()->session["username"] == null) { ?>
                <?php echo $form->textField($model, "person_position", array("class" => "form-control", "style" => "width: 280px;", "readonly" => true)); ?>
            <?php } else { ?>
                <?php echo $form->textField($model, "person_position", array("class" => "form-control", "style" => "width: 280px;")); ?>
            <?php } ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, "person_level"); ?>
            <?php if (Yii::app()->session["username"] == null) { ?>
                <?php echo $form->textField($model, "person_level", array("class" => "form-control", "style" => "width: 280px;", "readonly" => true)); ?>
            <?php } else { ?>
                <?php echo $form->textField($model, "person_level", array("class" => "form-control", "style" => "width: 280px;")); ?>
            <?php } ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, "place"); ?>
            <?php if (Yii::app()->session["username"] == null) { ?>
                <?php echo $form->textField($model, "place", array("class" => "form-control", "style" => "width: 280px;", "readonly" => true)); ?>
            <?php } else { ?>
                <?php echo $form->textField($model, "place", array("class" => "form-control", "style" => "width: 280px;")); ?>
            <?php } ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, "person_number"); ?>
            <?php if (Yii::app()->session["username"] == null) { ?>
                <?php echo $form->textField($model, "person_number", array("class" => "form-control", "style" => "width:280px", "id" => "person_number", "readonly" => true)); ?>
            <?php } else { ?>
                <?php echo $form->textField($model, "person_number", array("class" => "form-control", "style" => "width:280px", "id" => "person_number")); ?>
            <?php } ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, "datetogo"); ?>
            <?php if (Yii::app()->session["username"] == null) { ?>
                <?php echo $form->textField($model, "datetogo", array("class" => "form-control", "style" => "width:280px", "id" => "datetogo", "disabled" => "disabled")); ?>
            <?php } else { ?>
                <?php echo $form->textField($model, "datetogo", array("class" => "form-control", "style" => "width:280px", "id" => "datetogo")); ?>
            <?php } ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, "datetosuccess"); ?>
            <?php if (Yii::app()->session["username"] == null) { ?>
                <?php echo $form->textField($model, "datetosuccess", array("class" => "form-control", "style" => "width:280px", "id" => "datetosuccess", "disabled" => "disabled")); ?>
            <?php } else { ?>
                <?php echo $form->textField($model, "datetosuccess", array("class" => "form-control", "style" => "width:280px", "id" => "datetosuccess")); ?>  
            <?php } ?>
        </div>


        <?php if ((Yii::app()->session["user_type"] == "แอดมิน") OR ( Yii::app()->session["user_type"] == "ผู้อนุมัติ")): ?>
            <div class="form-group">
                <?php echo $form->labelEx($model, "activities_id"); ?>
                <?php
                $opts = CHtml::listData(Activities::model()->findAll(), 'id', 'name');
                echo $form->dropDownList($model, 'activities_id', $opts, array("class" => "form-control", "style" => "width: 280px;", "empty" => "--เลือกกิจกรรมที่ต้องการใช้รถ--"));
                ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, "driver_id"); ?>
                <?php
                $opts = CHtml::listData(Driver::model()->findAll(), 'id', 'name');
                echo $form->dropDownList($model, 'driver_id', $opts, array("class" => "form-control", "style" => "width: 280px;", "empty" => "--เลือกพนักงานขับรถ--"));
                ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, "car_id"); ?>
                <?php
                $opts = CHtml::listData(Car::model()->findAll(), 'id', 'concatname');
                echo $form->dropDownList($model, 'car_id', $opts, array("class" => "form-control", "style" => "width: 280px;", "empty" => "--เลือกรถคันหมายเลข--"));
                ?>
            </div>


            <div class="form-group">
                <?php echo $form->labelEx($model, "milestogo"); ?>
                <?php echo $form->textField($model, "milestogo", array("class" => "form-control", "style" => "width: 150px;")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, "milestosuccess"); ?>
                <?php echo $form->textField($model, "milestosuccess", array("class" => "form-control", "style" => "width: 150px;")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, "oil"); ?>
                <?php echo $form->textField($model, "oil", array("class" => "form-control", "style" => "width: 280px;")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, "price"); ?>
                <?php echo $form->textField($model, "price", array("class" => "form-control", "style" => "width: 150px;")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, "repair"); ?>
                <?php echo $form->textField($model, "repair", array("class" => "form-control", "style" => "width: 150px;")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, "details"); ?>
                <?php echo $form->textField($model, "details", array("class" => "form-control", "style" => "width: 280px;")); ?>
            </div>


            <div class="form-group">
                <?php echo $form->labelEx($model, "status"); ?>
                <?php echo ZHtml::enumDropDownList($model, "status", array("class" => "form-control", "style" => "width:250px")); ?>
            </div>


        <?php endif ?> <!-- end check permission for admin-->


        <?php if (Yii::app()->session["user_type"] == null): ?>
            <div class="form-group">
                <?php echo $form->labelEx($model, "status"); ?>
                <?php echo ZHtml::enumDropDownList($model, "status", array("class" => "form-control", "style" => "width:250px", "disabled" => "disabled")); ?>
            </div>
        <?php endif ?>


        <div class="form-group">
            <?php echo $form->labelEx($model, "comment"); ?>
            <?php if (Yii::app()->session["username"] == null) { ?>
                <?php echo $form->textField($model, "comment", array("class" => "form-control", "style" => "width: 700px;", "readonly" => true)); ?>
            <?php } else { ?>
                <?php echo $form->textField($model, "comment", array("class" => "form-control", "style" => "width: 700px;")); ?>
            <?php } ?>
        </div>

        <div class="form-group">
            <?php if (Yii::app()->session["username"] == null) { ?>     
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/frmlogin" class="btn btn-danger" role="button" style="margin-left: 140px;margin-top: 5px">หากท่านต้องการแก้ไขข้อมูลนี้!!! กรุณากดที่ปุ่มนี้เพื่อล็อกอินเข้าสู่ระบบ</a>
            <?php } else { ?>
                <input class="btn btn-lg btn-success btn-block" type="submit" value="บันทึกข้อมูลการใช้รถยนต์" style="margin-left: 140px;margin-top: 5px"  >
            <?php } ?>
        </div>

        <br/>








        <?php $this->endWidget(); ?>
    </div>


</div>


<script language="javascript">

    $(function () {
        $("#tabs").tabs();

        $("#datetogo").datetimepicker({
            lang: 'th',
            i18n: {
                th: {
                    months: [
                        'มกราคม', 'กุมภาพันธ์', 'มีนาคม',
                        'เมษายน', 'พฤษภาคม', 'มิถุนายน',
                        'กรกฎาคม', 'สิงหาคม', 'กันยายน',
                        'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม',
                    ],
                    dayOfWeek: [
                        "อา.", "จ.", "อ",
                        "พ.", "พฤ.", "ศ.", "ส.",
                    ]
                }
            },
        });

        $("#datetosuccess").datetimepicker({
            lang: 'th',
            i18n: {
                th: {
                    months: [
                        'มกราคม', 'กุมภาพันธ์', 'มีนาคม',
                        'เมษายน', 'พฤษภาคม', 'มิถุนายน',
                        'กรกฎาคม', 'สิงหาคม', 'กันยายน',
                        'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม',
                    ],
                    dayOfWeek: [
                        "อา.", "จ.", "อ.",
                        "พ.", "พฤ.", "ศ.", "ส.",
                    ]
                }
            },
        });
    });

</script>