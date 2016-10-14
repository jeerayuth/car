<?php

class Brand extends CActiveRecord {
	static function model($className = __CLASS__) {
		return parent::model($className);
	}
	function tableName(){
		return 'brand';
	}
	function attributeLabels(){
		return array(
			"name" => "ชื่อหน่วยงาน",
			"address" => "ที่ตั้งหน่วยงาน",
			"tel" => "เบอร์โทรศัพท์",
		);
	}
	function rules(){
		return array(
			array('name,address','required')
		);
	}
}