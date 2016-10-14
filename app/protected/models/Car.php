<?php
class Car extends CActiveRecord {
	static function model($className = __CLASS__){
		return parent::model($className);
	}
	function tableName(){
		return 'car';
	}
	public function attributeLabels(){
		return array(
			"name" => "ประเภทรถยนต์",
			"serial" => "ทะเบียนรถยนต์",
			"color" => "สีแสดงผล",
		);
	}
	public function rules(){
		return array(
			array('name,serial,color','required')
		);
	}

	// function concat 2 field
	public function getConcatname()
    {
       	return $this->serial.' '.$this->name;
    }
    // function merge 2 column in listview
    public function getManagers()
        {
            $models = Car::model()->findAll();
            $list = CHtml::listData($models, 'id', 'concatname');
                return $list;
        }
}