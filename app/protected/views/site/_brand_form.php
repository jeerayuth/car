<?php
    Yii::app()->clientScript->registerScriptFile("../jquery.js");
?>
<ol class="breadcrumb">
  <li><a href="#">ตั้งค่าโปรแกรม</a></li>
  <li class="active">หน่วยงาน</li>
</ol>

<div class="alert alert-info">
    <i class="glyphicon glyphicon-pencil"></i> ลงทะเบียนหน่วยงาน
</div>



<div id="tabs">
	<ul>
		<li><a href="#tabs-1">ตั้งค่าหน่วยงาน</a></li>

	</ul>

	<!-- Form -->
	<div id="tabs-1">
			<?php $form = $this->beginWidget('CActiveForm'); ?>
			<div>
				<?php echo $form->errorSummary($model); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, "name"); ?>
				<?php echo $form->textField($model, "name",array("class"=>"form-control")); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, "address"); ?>
				<?php echo $form->textField($model, "address",array("class"=>"form-control")); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, "tel"); ?>
				<?php echo $form->textField($model, "tel",array("class"=>"form-control")); ?>
			</div>
			<div class="form-group">
				<input class="btn btn-lg btn-success btn-block" type="submit" value="บันทึกข้อมูลหน่วยงาน">
			</div>
			<?php $this->endWidget(); ?>
	</div>

</div>


<script language="javascript">

	$(function(){
		$("#tabs").tabs();
	});

</script>