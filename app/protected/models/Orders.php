<?php

class Orders extends CActiveRecord {

    public $company_search;

    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    function tableName() {
        return 'orders';
    }

    function attributeLabels() {
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
            "status" => "สถานะการขอใช้รถ",
            "company_search" => "หน่วยงาน",
        );
    }

    function rules() {
        return array(
            array('title,person_name,person_position,person_number,place,company_id,datetogo,datetosuccess', 'required'),
            array('title,datetogo,status,company_search', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {

        return array(
            'activities' => array(self::BELONGS_TO, 'Activities', 'activities_id'),
            'car' => array(self::BELONGS_TO, 'Car', 'car_id'),
            'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
            'driver' => array(self::BELONGS_TO, 'Driver', 'driver_id'),
        );
    }

    public function search($limit = 30,$company_id = 1) {
        // @todo Please modify the following code to remove attributes that should not be searched.
        
        $criteria = new CDbCriteria;
        $criteria->with = array('company');
        $criteria->compare('company.name', $this->company_search, true);
        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('place', $this->place, true);
        $criteria->compare('person_name', $this->person_name, true);
        $criteria->compare('datetogo', $this->datetogo, true);
        $criteria->compare('status', $this->status, true);
        
        $criteria->limit = $limit;
        $criteria->offset = 0;
        
        //รอแก้ไขตรงส่วนนี้        
        if($company_id !=''){
             $criteria->addCondition('company_id='.$company_id,'AND');
        } else {
            //$criteria->condition = '';
        } 

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'Pagination' => FALSE,
            'sort' => array(
                'defaultOrder' => 'datetogo DESC',
                'attributes' => array(
                    'company_search' => array(
                        'asc' => 'company.name',
                        'desc' => 'company.name DESC',
                    ),
                    '*',
                )
        )));
    }

}

?>