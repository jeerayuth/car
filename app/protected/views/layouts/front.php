<?php
@ob_start();
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ระบบบริหารจัดการยานพาหนะ พัฒนาโดย จีระยุทธ ปิ่นสุวรรณ</title>

	<!-- import css bootstrap -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css" />

	<body>

	<?php echo $content; ?>

	<?php
		// import js standard jquery
		Yii::app()->clientScript->registerScriptFile("../jquery.js");

		// import js bootstrap3
		Yii::app()->clientScript->registerScriptFile("../bootstrap/js/bootstrap.min.js");
	?>

	</body>

</html>