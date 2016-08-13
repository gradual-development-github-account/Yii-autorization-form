<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>

<h1>Вход на сайт</h1>

<?php if(Yii::app()->user->hasFlash('login-notice')): ?>
<div class="flash-notice">
	<?php echo Yii::app()->user->getFlash('login-notice'); ?>
</div>
<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('login-error')): ?>
<div class="flash-error">
	<?php echo Yii::app()->user->getFlash('login-error'); ?>
</div>
<?php endif; ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Поля со знаком <span class="required">*</span> обязательны для заполнения.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'Логин'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Пароль'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
		</p>
	</div>

<?php echo CHtml::link('Вспомнить пароль', array( 'site/reset' ) ); ?>        
        
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

        <div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>
        
<?php $this->endWidget(); ?>
</div><!-- form -->
