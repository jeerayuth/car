<?php if (Yii::app()->session["username"] != null): ?>
	<?php $this->renderPartial("//site/_orders_history",array(
		"provider" => $provider,
	)); ?>
<?php  else : ?>
	<?php $this->renderPartial("//site/_formlogin"); ?>
<?php endif ?>