<ol class="breadcrumb">
    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/ordershistory">หน้าหลัก</a></li>
    <li>ประวัติการขอใช้รถ</li>
</ol>

<div id="tabs">
    <ul>  
        <?php if (!empty($provider)) { ?>
            <li><a href="#tabs-1">ประวัติการขอใช้รถ</a></li> 
        <?php } ?>
    </ul>
    
    <div id ="tabs-1">
        <?php
             $company_name = Company::model()->findByPk(Yii::app()->session["company_id"]); 
        ?>
        
        <b><?php echo $text; ?> 
            <?php if(Yii::app()->session["user_type"] == "ผู้ใช้"){ ?>
                <font color="blue"><?php echo $company_name->name;?></font>
            <?php } ?>
        </b>
        <br/>
        
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/orders" class="btn btn-info" role="button"><i class="glyphicon glyphicon-plus-sign"></i> เพิ่มกิจกรรมการขอใช้รถ</a>
        <?php
        if (!empty($provider)) {
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'car-grid',
                'dataProvider' => $provider,
                'columns' => array(
                    'title',
                    'company.name',
                    'person_name',
                    'datetogo',
                    'datetosuccess',
                    'person_number',
                    'status',
                    array(
                        'header' => 'แก้ไข',
                        'class' => 'CLinkColumn',
                        'imageUrl' => 'images/edit.png',
                        'labelExpression' => 'แก้ไขข้อมูล',
                        'urlExpression' => 'Yii::app()->createUrl("site/orders",array("id"=>$data->id))',
                        'linkHtmlOptions' => array('target' => '_blank'),
                        'htmlOptions' => array(
                            'style' => 'text-align:center',
                            'id' => 'opener'
                        )
                    ),
                )
            ));
        }
        ?>
    </div>

 

</div>


<script language="javascript">

    $(function () {
        // Tab
        $("#tabs").tabs();
    });

</script>