<?php
    Yii::app()->clientScript->registerScriptFile("../jquery.js");
?>
<br/>
<br/>
<br/>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="glyphicon glyphicon-lock"></i> เข้าสู่ระบบ</h3>
    </div>
    <div class="panel-body">

        <?php echo CHtml::form(array("site/login")); ?>

        <?php
        $type_list = CHtml::listData(Company::model()->findAll(), 'id', 'name');
        echo CHtml::dropDownList('company_id', '0', $type_list, array("class" => "form-control", "style" => "width: 280px;height:40px", "empty" => "กรุณาเลือกหน่วยงานของท่าน * "));
        ?>
        <p/>

        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">ชื่อผู้ใช้ *&nbsp;&nbsp;</span>
            <input type="text" id="username" name="username" class="form-control input-lg">
        </div>

        <div class="input-group">
            <span class="input-group-addon" id="basic-addon2">รหัสผ่าน *</span>
            <input type="password" id="password" name="password" class="form-control input-lg">
        </div>



        <div class="input-group">
            <input class="btn btn-lg btn-primary btn-block" type="submit" value="เข้าสู่ระบบ">
        </div>
        <?php echo CHtml::endform(); ?>
    </div>

    <div class="panel-footer">Panel footer</div>

</div>


<script type="text/javascript">

    $("form").submit(function () {
        if ($("#username").val().length <= 0)
        {
            alert("กรุณาระบุชื่อผู้ใช้ด้วยครับ");
            return false;
        }

        if ($("#password").val().length <= 0)
        {
            alert("กรุณาระบุรหัสผ่านด้วยครับ");
            return false;
        }

        if ($("#company_id").val() === "")
        {
            alert("กรุณาเลือกหน่วยงานของท่านด้วยครับ");
            return false;
        }

    });



</script>



