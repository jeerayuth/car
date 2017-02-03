<?php if (Yii::app()->session["username"] != null): ?>
	<?php $this->renderPartial("//site/_orders_history",array(
		"model" => $model,
                "company_id" => $company_id,
                "text" => $text,
                "limit" => $limit,
	)); ?>
<?php  else : ?>
	<?php $this->renderPartial("//site/_formlogin"); ?>
<?php endif ?>