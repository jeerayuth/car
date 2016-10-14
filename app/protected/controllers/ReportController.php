<?php

class ReportController extends Controller
{

	public function actionGetform($form=null, $point = null){

		switch($form){
			case "form_default" :
				$view = $form;
				$pointer = $point;
				break;

			case "form_car" :
				$view = $form;
				$pointer = $point;
				break;

			default:
				$view = $form;
				$pointer = $point;
		}

		$this->render($view, array(
			"point" => $pointer,
		));
	}

	/* รายงานการซ่อมรถยนต์ */
	public function actionCountRepair(){
		$datestart = $_POST['datestart'];
		$dateend = $_POST['dateend'];

		$sql = "
			SELECT
				c.serial as car_serial,
				o.place,
				DATE_FORMAT(o.datetogo, '%d-%m-%Y ') As datetogo,
				o.datetosuccess,
				o.repair,
				o.details
			FROM orders o
				LEFT OUTER JOIN car c ON c.id = o.car_id
			WHERE
				o.datetogo between '". $datestart ."' AND '". $dateend ."'
				AND o.repair != 0 AND o.status='อนุมัติ'
			ORDER BY
				o.car_id,o.datetogo ASC
		";

		$model = Yii::app()->db->createCommand($sql)->queryAll();

		$this->render("countrepair", array(
			"model" => $model,
			"datestart" => $datestart,
			"dateend" => $dateend
		));
	}

	/* รายงานครั้งการทำงานของพนักงานขับรถ*/
	public function actionCountDriver(){
		$datestart= $_POST['datestart'];
		$dateend = $_POST['dateend'];

		$sql= "
			SELECT
				d.name AS driver_name,
				(
					SELECT
						count(*)
					FROM orders o
					WHERE
						o.datetogo BETWEEN '". $datestart ."' AND '". $dateend ."' AND
						o.driver_id = d.id AND o.status='อนุมัติ'
				) As count_driver,
				(
					SELECT
						sum(milestosuccess-milestogo)
					FROM orders o
					WHERE
						o.datetogo BETWEEN '". $datestart ."' AND '". $dateend ."' AND
						o.driver_id = d.id AND o.status='อนุมัติ'
					) As count_miles
			FROM driver d ";

			$model = Yii::app()->db->createCommand($sql)->queryAll();

			$this->render("countdriver" ,array(
					"model" => $model,
					"datestart" => $datestart,
					"dateend" => $dateend,
			));

	}

	/* รายงานการใช้รถยนต์แต่ละคัน */
	public function actionCountCar(){

		$car_id = $_POST['car_id'];
		$datestart = $_POST['datestart'];
		$dateend = $_POST['dateend'];

		$sql = "
			SELECT
				DATE_FORMAT(o.datetogo, '%d-%m-%Y ') As datetogo,
				DATE_FORMAT(o.datetosuccess, '%d-%m-%Y') AS datetosuccess,
				o.place AS place,
				DATE_FORMAT(o.datetogo, '%h:%i') AS timetogo,
				DATE_FORMAT(o.datetosuccess, '%h:%i') AS timetosuccess,
				o.milestogo AS milestogo,
				o.milestosuccess AS milestosuccess,
				(o.milestosuccess-o.milestogo) as total_miles,
				o.price AS oil,
				d.name AS driver_name
			FROM orders o
				LEFT OUTER JOIN driver d ON d.id = o.driver_id
			WHERE
				car_id = '". $car_id ."'
				AND datetogo BETWEEN '". $datestart ."' AND '". $dateend ."'
				AND status='อนุมัติ'
			ORDER BY o.datetogo ASC ";

			$model= Yii::app()->db->createCommand($sql)->queryAll();

			$this->render("countcar", array(
				"model" => $model,
				"id" => $car_id,
				"datestart" => $datestart,
				"dateend" => $dateend
			));

	}

	/* รายงานสรุปผู้ขอใช้รถยนต์ */
	public function actionCountUser(){

		$datestart = $_POST['datestart'];
		$dateend = $_POST['dateend'];

		$sql = "
			SELECT
				c.name as name ,count(o.id) as count_use
			FROM orders o
				LEFT OUTER JOIN company c ON c.id = o.company_id
			WHERE
			 	o.datetogo between '". $datestart ."' AND '" .$dateend ."' AND o.status='อนุมัติ'
			GROUP BY o.company_id ";

			$model = Yii::app()->db->createCommand($sql)->queryAll();

			$this->render("countuser", array(
				"model" => $model,
				"datestart" => $datestart,
				"dateend" => $dateend,
			));
	}


}