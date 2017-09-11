<h1>Восстановление пароля</h1>

<?php if( Yii::app()->user->hasFlash('reset-success') ): ?>

    <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('reset-success'); ?>
    </div>




<?php else: ?>

    <?php if( Yii::app()->user->hasFlash('reset-error') ): ?>

        <div class="flash-error">
                <?php echo Yii::app()->user->getFlash('reset-error'); ?>
        </div>

    <?php endif; ?>

    <div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'reset-form',
        'enableAjaxValidation'=>false,
    )); ?>

        <p class="note">Введите e-mail адрес указанный при регистрации</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Воссстановить пароль'); ?>
        </div>

    <?php $this->endWidget(); ?>
        
    </div><!-- form -->

<?php endif; ?>
