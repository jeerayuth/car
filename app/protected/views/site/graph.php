<?php if (Yii::app()->session["username"] != null): ?>
	<?php $this->renderPartial("//site/_graph",array(
		//"provider" => $provider,
	)); ?>
<?php  else : ?>
	<?php $this->renderPartial("//site/_formlogin"); ?>
<?php endif ?>