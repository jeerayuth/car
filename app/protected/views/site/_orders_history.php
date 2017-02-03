<ol class="breadcrumb">
    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/ordershistory">หน้าหลัก</a></li>
    <li>ประวัติการขอใช้รถ</li>
</ol>

<div id="tabs">
    <ul>  
        <?php if (!empty($model)) { ?>
            <li><a href="#tabs-1">ประวัติการขอใช้รถ</a></li> 
        <?php } ?>
    </ul>

    <div id ="tabs-1">
        <?php
            $company_name = Company::model()->findByPk(Yii::app()->session["company_id"]);
        ?>

        <b><?php echo $text; ?> 
            <?php if (Yii::app()->session["user_type"] == "ผู้ใช้") { ?>
                <font color="blue"><?php echo $company_name->name; ?></font>
            <?php } ?>
        </b>
    
        <div class="pull-right">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/orders" class="btn btn-info" role="button"><i class="glyphicon glyphicon-plus-sign"></i> เพิ่มกิจกรรมการขอใช้รถ</a>
        </div>
           
            <?php
        
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'users-grid',
                'dataProvider' => $model->search($limit,$company_id),
                'filter' => $model,       
                'columns' => array(
                    array( 'name'=>'company_search', 'value'=>'$data->company->name' ),
                    'title',
                    'place',
                    'datetogo',
                    'datetosuccess',
                    'person_name',
                    'status',           
                   
                ),
            ));
            
        ?>
        
       
            
    </div>



</div>


<script language="javascript">

    $(function () {
        // Tab
        $("#tabs").tabs();
    });

</script>