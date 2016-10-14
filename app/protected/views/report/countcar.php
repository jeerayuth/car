<?php

include_once '../MPDF57/mpdf.php';

$mpdf = new mPDF('UTF-8');
$mpdf->SetAutoFont();


$data= Car::model()->findByPk($id);

$mpdf->SetHTMLHeader("
	<div style='text-align: center'>
		 รายงานรถยนต์ตามหมายเลขทะเบียน '". $data->serial ."'
	</div>
");

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
				<td class="cell-header">วันที่เดินทาง</td>
				<td class="cell-header">วันที่กลับ</td>
				<td class="cell-header">สถานที่ไป</td>
				<td class="cell-header">เวลาไป</td>
				<td class="cell-header">เวลากลับ</td>
				<td class="cell-header">ไมล์ไป</td>
				<td class="cell-header">ไมล์กลับ</td>
				<td class="cell-header">รวมระยะทาง</td>
				<td class="cell-header">เติมน้ำมัน</td>
				<td class="cell-header">พขร</td>
			</tr>
		</thead>
		<tbody>
';

	foreach($model as $item){
		$html .= "
			<tr>
				<td class='cell-body'>".$item['datetogo']."</td>
				<td class='cell-body'>".$item['datetosuccess']."</td>
				<td class='cell-body'>".$item['place']."</td>
				<td class='cell-body'>".$item['timetogo']."</td>
				<td class='cell-body'>".$item['timetosuccess']."</td>
				<td class='cell-body'>".$item['milestogo']."</td>
				<td class='cell-body'>".$item['milestosuccess']."</td>
				<td class='cell-body'>".$item['total_miles']."</td>
				<td class='cell-body'>".$item['oil']."</td>
				<td class='cell-body'>".$item['driver_name']."</td>
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