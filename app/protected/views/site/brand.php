<?php if (Yii::app()->session["username"] != null): ?>
	<?php $this->renderPartial("//site/_brand_form",array(
		"model" => $model,
	)); ?>
<?php  else : ?>
	<?php $this->renderPartial("//site/_formlogin"); ?>
<?php endif ?>