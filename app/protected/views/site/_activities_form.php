<ol class="breadcrumb">
  <li><a href="#">ตั้งค่าโปรแกรม</a></li>
  <li class="active">กิจกรรมการใช้รถ</li>
</ol>

<div class="alert alert-info">
    <i class="glyphicon glyphicon-pencil"></i> ลงทะเบียนกิจกรรมการใช้รถ
</div>



<div id="tabs">
	<ul>
		<li><a href="#tabs-1">เพิ่มกิจกรรมการใช้รถ</a></li>
		<li><a href="#tabs-2">รายชื่อกิจกรรมการใช้รถ</a></li>
	</ul>

	<!-- Form -->
	<div id="tabs-1">
			<?php $form = $this->beginWidget('CActiveForm'); ?>
			<div>
				<?php echo $form->errorSummary($model); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, "name"); ?>
				<?php echo $form->textField($model, "name", array("class"=>"form-control")); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, "unit"); ?>
				<?php echo $form->textField($model, "unit", array("class"=>"form-control")); ?>
			</div>
			<div class="form-group">
				<input class="btn btn-lg btn-success btn-block" type="submit" value="บันทึกข้อมูลกิจกรรมการใช้รถ">
			</div>
			<?php $this->endWidget(); ?>
	</div>


	<!-- Grid View -->
	<div id="tabs-2">
		<?php
			$this->widget('zii.widgets.grid.CGridView', array(
				'id' => 'activities-grid',
				'dataProvider' => $provider,
				'columns' => array(
					'name',
					'unit',
					array(
						'header' => 'แก้ไข',
						'class' => 'CLinkColumn',
						'imageUrl' => 'images/edit.png',
						'labelExpression' => 'แก้ไขข้อมูล',
						 'urlExpression' => 'Yii::app()->createUrl("site/activities",array("id"=>$data->id))',
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

	$(function(){
		$("#tabs").tabs();
	});

</script>