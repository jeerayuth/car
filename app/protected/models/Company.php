<?php

class Company extends CActiveRecord {
		static function model($className = __CLASS__){
			return parent::model($className);
		} 
		function tableName(){
			return 'company';
		}
		function attributeLabels(){
			return array(
				"name" => "หน่วยงาน"
			);
		}
		function rules(){
			return array(
				array('name','required')
			);
		}
}