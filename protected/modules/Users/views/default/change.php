<h1>Изменение пароля</h1>

<?php if( Yii::app()->user->hasFlash('change-success') ): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('change-success'); ?>
    </div>

<?php endif; ?>


<?php //else: ?>

    <?php if( Yii::app()->user->hasFlash('change-error') ): ?>
        <div class="flash-error">
            <?php echo Yii::app()->user->getFlash('change-error'); ?>
        </div>
    <?php endif; ?>

    <div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'change-form',
        'enableAjaxValidation'=>false,
    )); ?>

        <p class="note">Введите новый пароль:</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'confirmpassword'); ?>
            <?php echo $form->passwordField($model,'confirmpassword',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'confirmpassword'); ?>
        </div>        

        <div class="row buttons">
            <?php echo CHtml::submitButton('Изменить пароль'); ?>
        </div>

    <?php $this->endWidget(); ?>
        
    </div><!-- form -->


