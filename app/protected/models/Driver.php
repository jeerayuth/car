<?php

class Driver extends CActiveRecord{
	static function model($className = __CLASS__){
		return parent::model($className);
	}
	function tableName(){
		return 'driver';
	}
	function attributeLabels(){
		return array(
			"name" => "พนักงานขับรถ",
		);
	}
	function rules(){
		return array(
			array('name','required')
		);
	}
}