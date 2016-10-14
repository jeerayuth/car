<?php

include_once '../MPDF57/mpdf.php';

$mpdf = new mPDF('UTF-8');
$mpdf->SetAutoFont();

$mpdf->SetHTMLHeader('
	<div style="text-align: center">
		<b>รายงานการซ่อมรถยนต์รระหว่างวันที่ "'. $datestart .'" ถึงวันที่ "'. $dateend .'"</b>
	</div>
');

$html.="
	<style>
		.cell-header{
			border-bottom: #808080 3px solid;
			background-color: #f9f8f7;
			padding: 5px;
		}
		.cell-body {
			border-bottom: #808080 1px solid;
			padding: 5px;
		}
	</style>
";


$html.='<table width="700px">
		<thead>
			<tr>
				<td class="cell-header" width="200px">ทะเบียนรถ</td>
				<td class="cell-header" width="50px">สถานที่ไป</td>
				<td class="cell-header" width="60px">วันที่ไป</td>
				<td class="cell-header" width="50px">จำนวนเงินค่าซ่อม</td>
			</tr>
		</thead>
		<tbody>
';

	foreach($model as $item){
		$html .= "
			<tr>
				<td class='cell-body'>".$item['car_serial']."</td>
				<td class='cell-body'>".$item['place']."</td>
				<td class='cell-body'>".$item['datetogo']."</td>
				<td class='cell-body'>".$item['repair']."</td>
			</tr>
		";
	}

$html.='
		</tbody>
	</table>
';


//output
$mpdf->WriteHTML($html);
$mpdf->Output();

?>