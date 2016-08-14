<?php
/* @var $this TblTestController */
/* @var $data TblTest */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sum_income')); ?>:</b>
	<?php echo CHtml::encode($data->sum_income); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_income')); ?>:</b>
	<?php echo CHtml::encode($data->date_income); ?>
	<br />


</div>