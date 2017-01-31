<?php if (Yii::app()->session["username"] != null): ?>
	<?php $this->renderPartial("//site/_orders_history",array(
		"model" => $model,
                "text" => $text,
	)); ?>
<?php  else : ?>
	<?php $this->renderPartial("//site/_formlogin"); ?>
<?php endif ?>