<?php if (Yii::app()->session["username"] != null): ?>
	<?php $this->renderPartial("//site/_activities_form",array(
		"model" => $model,
		"provider" => $provider,
	)); ?>
<?php  else : ?>
	<?php $this->renderPartial("//site/_formlogin"); ?>
<?php endif ?>