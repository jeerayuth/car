<ol class="breadcrumb">
  <li><a href="#">ตั้งค่าโปรแกรม</a></li>
  <li class="active">รถยนต์</li>
</ol>

<div class="alert alert-info">
    <i class="glyphicon glyphicon-road"></i> ลงทะเบียนรถยนต์
</div>



<div id="tabs">
	<ul>
		<li><a href="#tabs-1">เพิ่มรถยนต์</a></li>
		<li><a href="#tabs-2">รายชื่อรถยนต์</a></li>
	</ul>

	<!-- Form -->
	<div id="tabs-1">
			<?php $form = $this->beginWidget('CActiveForm'); ?>
			<div>
				<?php echo $form->errorSummary($model); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, "color"); ?>
				<?php echo $form->textField($model, "color", array("class"=>"pick-a-color form-control","value"=>"e5e600")); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model, "name"); ?>
				<?php echo ZHtml::enumDropDownList($model, "name", array("class"=>"form-control", "empty"=>"--เลือกประเภทรถยนต์--")); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, "serial"); ?>
				<?php echo $form->textField($model, "serial",array("class"=>"form-control")); ?>
			</div>

			<div class="form-group">
				<input class="btn btn-lg btn-success btn-block" type="submit" value="บันทึกข้อมูลรถยนต์">
			</div>
			<?php $this->endWidget(); ?>
	</div>


	<!-- Grid View -->
	<div id="tabs-2">
		<?php
			$this->widget('zii.widgets.grid.CGridView', array(
				'id' => 'car-grid',
				'dataProvider' => $provider,
				'columns' => array(
					'name',
					'serial',
					'color',
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
	$(function(){
		$("#tabs").tabs();

		$(".pick-a-color").pickAColor({
			inlineDropdown: true,
			showBasicColors : true,
			showAdvanced: false,
			showSavedColors: false,
		});

	});
</script>

