<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>

<h1>Активация аккуанта</h1>

<?php if( Yii::app()->user->hasFlash('activation-success') ): ?>

    <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('activation-success'); ?>
    </div>

<?php else: ?>

    <div class="flash-notice">
            <?php echo Yii::app()->user->getFlash('activation-notice'); ?>
    </div>

<?php endif; ?>
