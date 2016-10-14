<ol class="breadcrumb">
  <li><a href="#">ตั้งค่าโปรแกรม</a></li>
  <li class="active">ผู้ใช้งานโปรแกรม</li>
</ol>

<div class="alert alert-info">
    <i class="glyphicon glyphicon-user"></i> ลงทะเบียนผู้ใช้งานโปรแกรม
</div>



<div id="tabs">
	<ul>
		<li><a href="#tabs-1">เพิ่มผู้ใช้</a></li>
		<li><a href="#tabs-2">รายชื่อผู้ใช้</a></li>
	</ul>

	<!-- Form -->
	<div id="tabs-1">
			<?php $form = $this->beginWidget('CActiveForm', array(
				'htmlOptions' => array(
					'class'=>'form-inline'
				),
			)); ?>
			<div>
				<?php echo $form->errorSummary($model); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model, "user_type"); ?>
				<?php echo ZHtml::enumDropDownList($model, "user_type", array("class"=>"form-control","style"=>"width:250px", "empty"=>"--เลือกประเภทผู้ใช้งาน--")); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, "fullname"); ?>
				<?php echo $form->textField($model, "fullname",array("class"=>"form-control","style"=>"width:250px")); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, "username"); ?>
				<?php echo $form->textField($model, "username",array("class"=>"form-control","style"=>"width:250px")); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, "password"); ?>
				<?php echo $form->passwordField($model, "password", array("class"=>"form-control","style"=>"width:250px")); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, "status"); ?>
				<?php echo ZHtml::enumDropDownList($model, "status", array("class"=>"form-control","style"=>"width:250px", "empty"=>"--เลือกสถานะผู้ใช้งาน--")); ?>
			</div>

			<div class="form-group">
				<input class="btn btn-lg btn-success btn-block" type="submit" value="บันทึกข้อมูลผู้ใช้">
			</div>
			<?php $this->endWidget(); ?>
	</div>


	<!-- Grid View -->
	<div id="tabs-2">
		<?php
			$this->widget('zii.widgets.grid.CGridView', array(
				'id' => 'user-grid',
				'dataProvider' => $provider,
				'columns' => array(
					'fullname',
					'username',
					'user_type',
					'last_update',
					'status',
					array(
						'header' => 'แก้ไข',
						'class' => 'CLinkColumn',
						'imageUrl' => 'images/edit.png',
						'labelExpression' => 'แก้ไขข้อมูล',
						 'urlExpression' => 'Yii::app()->createUrl("site/user",array("id"=>$data->id))',
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