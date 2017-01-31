<?php

class SiteController extends Controller {

    public function actionIndex() {
        // ใช้กับปฏิทิน
        $id ="อนุมัติ";
        $model = Orders::model()->findAll(      
             array(
                      'condition' => 'status = :status',
                      'params'    => array(':status' => $id)
                  )       
        );
              
        $this->render("//site/index", array(
            "model" => $model,
        ));
    }
    
    
    public function actionFrmLogin() {
       $this->render("//site/_formlogin");
    }

    public function actionLogin() {
        // step1. Prepare Where
        $attributes = array();
        $attributes["username"] = $_POST["username"];
        $attributes["password"] = (MD5($_POST["password"]));
        $attributes["status"] = "เปิดใช้งาน";

        // step2. Find User in Database
        $user = User::model()->findByAttributes($attributes);

        // step3. Login
        if (!empty($user)) {
            Yii::app()->session["id"] = $user->id;
            Yii::app()->session["username"] = $user->username;
            Yii::app()->session["user_type"] = $user->user_type;
            Yii::app()->session["company_id"] = $_POST["company_id"];
            $this->redirect("index.php?r=site/ordershistory");
        } else {
            $this->redirect("index.php?r=site");
        }
    }

    public function actionLogout() {
        // clear session
        unset(Yii::app()->session["id"]);
        unset(Yii::app()->session["username"]);
        unset(Yii::app()->session["user_type"]);
        $this->redirect("index.php?r=site");
    }

    public function actionOrders($id = null) {
        //insert, update orders
        $model = new Orders();

        if (!empty($_POST["Orders"])) {
            // 1.step new orders
            $model = new Orders();
            // 2.step edit orders
            if (!empty($id)) {
                $model = Orders::model()->findByPk($id);  
            }
            
            // 3. step merge data
            $model->_attributes = $_POST["Orders"];
            $model->dateupdate = date("Y-m-d h:i:s");

            // 4. step save/update
            if ($model->save()) {
                $this->redirect("index.php?r=site/ordershistory");
            }
        }

        if (!empty($id)) {
            $model = Orders::model()->findByPk($id);
        }

        $this->render("//site/orders", array(
            "model" => $model,
        ));
    }

 
     
    //
    public function actionOrdersHistory() {
        
         $limit = 0;
         $text = "";
        
        if(!empty(Yii::app()->session["company_id"]) &&  Yii::app()->session["user_type"]=="ผู้ใช้") {
            $limit = 50;
            $text = "50 อันดับการขอใช้รถล่าสุดภายในหน่วยงาน: ";
        } else if(!empty(Yii::app()->session["company_id"]) &&  (Yii::app()->session["user_type"]=="ผู้อนุมัติ" or Yii::app()->session["user_type"]=="แอดมิน")) {
            $limit = 120;
            $text = "120 อันดับการขอใช้รถล่าสุด";
        } else {
            $limit = 0;
        }
         
        $model= new Orders('search');
        $model->unsetAttributes(); // clear any default values
        if(isset($_GET['Orders']))
            $model->setAttributes($_GET['Orders']);
        
        
         // ใช้กับประวัติการขอรถ
      /*  if (!empty(Yii::app()->session["company_id"]) &&  Yii::app()->session["user_type"]=="ผู้ใช้"){
            $provider = new CActiveDataProvider('Orders', array(
                'criteria' => array(
                    'condition' => 'company_id=' . Yii::app()->session["company_id"],
                    'limit' => $limit,
                    'order' => 'datetogo DESC',
                    ),
                   'pagination' => false
            ));
                    
        } else if (!empty(Yii::app()->session["company_id"]) &&  (Yii::app()->session["user_type"]=="ผู้อนุมัติ" or Yii::app()->session["user_type"]=="แอดมิน")) {
            $provider = new CActiveDataProvider('Orders', array(
                'criteria' => array(
                    'limit' => $limit,
                    'order' => 'dateadd DESC',
                ),
                    'pagination' => false
            ));
        }*/

        
        $this->render("//site/_orders_history", array(
            "model" => $model,
            "text" => $text,
        ));
         
         
 
    }
    
    
    public function actionGraph() {
                  
        $this->render("//site/graph");
    }
    

    public function actionCard($id = null) {
        $this->render("card", array(
            "id" => $id
        ));
    }

    public function actionBrand($id = 1) {
        $model = Brand::model()->findByPk($id);

        if (!empty($_POST["Brand"])) {
            $model = Brand::model()->findByPk($id);
            $model->_attributes = $_POST["Brand"];
            if ($model->save()) {
                $this->redirect("index.php?r=site/brand");
            }
        }

        $this->render("//site/brand", array(
            "model" => $model
        ));
    }

    public function actionActivities($id = null) {
        //insert, update activities
        $model = new Activities();
        $provider = new CActiveDataProvider('Activities');

        if (!empty($_POST["Activities"])) {
            // 1.step new activities
            $model = new Activities();

            // 2.step edit activities
            if (!empty($id)) {
                $model = Activities::model()->findByPk($id);
            }

            // 3. step merge data
            $model->_attributes = $_POST["Activities"];

            // 4. step save/update
            if ($model->save()) {
                $this->redirect("index.php?r=site/activities");
            }
        }

        if (!empty($id)) {
            $model = Activities::model()->findByPk($id);
        }

        $this->render("//site/activities", array(
            "model" => $model,
            "provider" => $provider,
        ));
    }

    public function actionDriver($id = null) {
        //insert, update driver
        $model = new Driver();
        $provider = new CActiveDataProvider('Driver');

        if (!empty($_POST["Driver"])) {
            // 1.step new driver
            $model = new Driver();

            // 2.step edit driver
            if (!empty($id)) {
                $model = Driver::model()->findByPk($id);
            }

            // 3. step merge data
            $model->_attributes = $_POST["Driver"];

            // 4. step save/update
            if ($model->save()) {
                $this->redirect("index.php?r=site/driver");
            }
        }

        if (!empty($id)) {
            $model = Driver::model()->findByPk($id);
        }

        $this->render("//site/driver", array(
            "model" => $model,
            "provider" => $provider,
        ));
    }

    public function actionCompany($id = null) {
        //insert, update company
        $model = new Company();
        $provider = new CActiveDataProvider('Company');

        if (!empty($_POST["Company"])) {
            // 1.step new company
            $model = new Company();

            // 2.step edit company
            if (!empty($id)) {
                $model = Company::model()->findByPk($id);
            }

            // 3. step merge data
            $model->_attributes = $_POST["Company"];

            // 4. step save/update
            if ($model->save()) {
                $this->redirect("index.php?r=site/company");
            }
        }

        if (!empty($id)) {
            $model = Company::model()->findByPk($id);
        }

        $this->render("//site/company", array(
            "model" => $model,
            "provider" => $provider,
        ));
    }

    public function actionCar($id = null) {
        //insert, update car
        $model = new Car();
        $provider = new CActiveDataProvider('Car');

        if (!empty($_POST["Car"])) {
            // 1.step new car
            $model = new Car();

            // 2.step edit car
            if (!empty($id)) {
                $model = Car::model()->findByPk($id);
            }

            // 3. step merge data
            $model->_attributes = $_POST["Car"];

            // 4. step save/update
            if ($model->save()) {
                $this->redirect("index.php?r=site/car");
            }
        }

        if (!empty($id)) {
            $model = Car::model()->findByPk($id);
        }

        $this->render("//site/car", array(
            "model" => $model,
            "provider" => $provider,
        ));
    }

    public function actionUser($id = null) {
        //insert, update user
        $model = new User();
        $provider = new CActiveDataProvider('User');

        if (!empty($_POST["User"])) {
            // 1.step new user
            $model = new User();

            // 2.step edit user
            if (!empty($id)) {
                $model = User::model()->findByPk($id);
            }

            // 3. step merge data
            $model->_attributes = $_POST["User"];
            $model->password = MD5($_POST["password"]);
            $model->last_update = date("Y-m-d h:i:s");


            // 4. step save/update
            if ($model->save()) {
                $this->redirect("index.php?r=site/user");
            }
        }


        if (!empty($id)) {
            $model = User::model()->findByPk($id);
        }


        $this->render("//site/user", array(
            "model" => $model,
            "provider" => $provider,
        ));
    }

}
