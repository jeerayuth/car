<?php

include_once '../MPDF57/mpdf.php';

$mpdf = new mPDF('UTF-8');
$mpdf->SetAutoFont();

$mpdf->SetHTMLHeader('
	<div style="text-align: center">
		<b>รายงานครั้งการทำงานของพนักงานขับรถระหว่างวันที่"'. $datestart .'" ถึงวันที่ "'. $dateend .'"</b>
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
				<td class="cell-header" width="500px">ชื่อพนักงานขับรถ</td>
				<td class="cell-header" width="100px" >จำนวนครั้ง</td>
				<td class="cell-header" width="100px" >จำนวนระยะทาง</td>
			</tr>
		</thead>
		<tbody>
';

	foreach($model as $item){
		$html .= "
			<tr>
				<td class='cell-body'>".$item['driver_name']."</td>
				<td class='cell-body' align='center'>".$item['count_driver']."</td>
				<td class='cell-body' align='center'>".$item['count_miles']."</td>
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