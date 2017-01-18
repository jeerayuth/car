<ol class="breadcrumb">
    <li><a href="#">ส่วนผู้ใช้</a></li>
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