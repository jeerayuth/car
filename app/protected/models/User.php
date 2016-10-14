<?php

class User extends CActiveRecord {
	static function model($className = __CLASS__) {
			return parent::model($className);
	}

	function tableName(){
		return 'user';
	}

	public function attributeLabels(){
		return array(
			"user_type"=> "ประเภทผู้ใช้งาน",
			"fullname" => "ชื่อ-สกุล",
			"username" => "ชื่อผู้ใช้",
			"password" => "รหัสผ่าน",
			"last_update" => "วันที่ปรับปรุงข้อมูลล่าสุด",
			"status" => "สถานะผู้ใช้"
		);
	}

	public function rules(){
		return array(
			array('fullname,username,password,user_type', 'required'),
		);
	}

}