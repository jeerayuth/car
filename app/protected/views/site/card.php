<?php

include_once '../MPDF57/mpdf.php';

//create object and SetAutoFont
$mpdf = new mPDF('UTF-8');
$mpdf->SetAutoFont();

$model = Orders::model()->findByPk($id);


$mpdf->SetHTMLHeader('
	<div style="text-align: center">
		พิมพ์บัตรจองรถ
	</div>
');

$html .= '
	<div>กิจกรรม: '.$model->activities->name.'</div>
	<div>สถานที่: '.$model->place.'</div>
	<div>ผู้ขอ: '.$model->company->name.'</div>
	<div>พนักงานขับรถ: '.$model->driver->name.'</div>
	<div>หมายเลขรถ: '.$model->car->getConcatname().'</div>
	<div>เวลาออก: '.$model->datetogo.'</div>
	<div>เวลากลับ: '.$model->datetosuccess.'</div>
';

$mpdf->WriteHTML($html);
$mpdf->Output();
?>


