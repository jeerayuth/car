<ol class="breadcrumb">
  <li><a href="#">รายงาน</a></li>
  <li class="active">รายงานการใช้รถยนต์</li>
</ol>

<div class="alert alert-info">
    <i class="glyphicon glyphicon-list-alt"></i> รายงานการใช้รถยนต์
</div>

<?php
	//Prepare Dropdown list data car
	 $model = Car::model()->findAll();
	 $list = CHtml::listData($model,'id', 'serial');
?>
<div class="panel panel-default">
	<div class="panel-heading">เลือกช่วงวันที่ทำรายงาน</div>
  	<div class="panel-body">
  		<form method="post" action="index.php?r=report/<?=$point?>" target="_blank" >
  		<div><?php echo CHtml::dropDownList('car_id',$id,$list,  array("empty" => "--กรุณาเลือกหมายเลขรถ--","class"=>"form-control","style"=>"width:200px")); ?></div>
    	<div>วันที่เริ่มต้น: <input type="text" name="datestart" id="datestart" class="form-control" style="width:200px" /></div>
    	<div style="padding-top:10px">วันที่สิ้นสุด: <input type="text" name="dateend" id="dateend" class="form-control" style="width:200px" /></div>
    	<div style="padding-top:10px"><input type="submit" class="btn btn-success" value="แสดงข้อมูล"/></div>
    	</form>
  	</div>
</div>


<script language="javascript">
	$(function(){
		$("#datestart").datetimepicker({
			lang: 'th',
			timepicker: false,
			 format:'Y-m-d',
		});
	});

	$(function(){
		$("#dateend").datetimepicker({
			lang: 'th',
			timepicker: false,
			 format:'Y-m-d',
		});
	});
</script>