<?php

class Activities extends CActiveRecord{
	static function model($className = __CLASS__) {
		return parent::model($className);
	}
	function tableName(){
		return 'activities';
	}
	function attributeLabels(){
		return array(
			"name" => "ชื่อกิจกรรม",
			"unit" => "หน่วยนับ",
		);
	}
	function rules(){
		return array(
			array('name,unit','required')
		);
	}
}