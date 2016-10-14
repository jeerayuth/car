<div class="alert alert-success">
    <h4>ยินดีต้อนรับท่านเข้าสู่โปรแกรมบริหารจัดการยานพาหนะ V.1.0</h4>
</div>

<div class="jumbotron">
    <h1><?php echo $model->name; ?></h1>
    <h2><font color="red"><?php echo $model->address; ?> โทร.<?php echo $model->tel; ?></font></h2>
    <p>
        โปรแกรมบริหารจัดการยานพาหนะ พัฒนาโดย นายจีระยุทธ ปิ่นสุวรรณ เป็นโปรแกรมใช้งานสำหรับ
        การบันทึกกิจกรรมการใช้ยานพาหนะภายในหน่วยงานและสามารถออกรายงานการใช้งานรถได้
        หลากหลาย
    </p>

    <p>
        <?php echo CHtml::image('images/logoyii.png'); ?>
        <?php echo CHtml::image('images/logomysql.png'); ?>
        <?php echo CHtml::image('images/logophp.png'); ?>
    </p>
</div>