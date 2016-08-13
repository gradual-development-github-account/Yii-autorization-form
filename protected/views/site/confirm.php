<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>

<h1>Подтверждение изменения пароля</h1>

<?php if( Yii::app()->user->hasFlash('confirm-change-success') ): ?>

    <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('confirm-change-success'); ?>
    </div>

<?php else: ?>

    <div class="flash-notice">
            <?php echo Yii::app()->user->getFlash('confirm-change-notice'); ?>
    </div>

<?php endif; ?>
