<?php
	class Orders extends CActiveRecord {
		static function model($className = __CLASS__){
			return parent::model($className);
		}
		function tableName(){
			return 'orders';
		}
		function attributeLabels(){
			return array(
                                "title" => "เรื่อง",
                                "person_name" => "ชื่อผู้ขอใช้รถ",
                                "person_position" => "ตำแหน่ง",
                                "person_level" => "ระดับ",
                                "person_number" => "จำนวนคน",
				"place" => "สถานที่ไป",
				"datetogo" => "วันที่และเวลาออก",
				"datetosuccess" => "วันที่และเวลากลับ",
				"milestogo" => "เลขไมล์ไป",
				"milestosuccess" => "เลขไมล์กลับ",
				"oil" => "เติมน้ำมัน(ลิตร)",
				"price" => "ค่าน้ำมัน(บาท)",
				"repair" => "ค่าซ่อม(บาท)",
				"details" => "รายละเอียดการซ่อม",
				"comment" => "หมายเหตุ",
				"dateupdate" => "วันที่ปรับปรุงล่าสุด",
				"activities_id" => "ผลงาน",
				"company_id" => "หน่วยงาน",
				"driver_id" => "พนักงานขับรถ",
				"car_id" => "รถคันหมายเลข",
				"status" => "สถานะการขอใช้รถ"
			);
		}
		function rules(){
			return array(
				array('title,person_name,person_position,person_number,place,company_id,datetogo,datetosuccess','required')
			);
		}

		public function relations(){
			return array(
				 'activities' => array(self::BELONGS_TO,'Activities', 'activities_id'),
				 'car' => array(self::BELONGS_TO,'Car', 'car_id'),
				 'company' => array(self::BELONGS_TO,'Company', 'company_id'),
				 'driver' => array(self::BELONGS_TO,'Driver', 'driver_id'),
			);
		}
                
          

	}

?>