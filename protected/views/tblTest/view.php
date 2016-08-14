<?php
/* @var $this TblTestController */
/* @var $model TblTest */

$this->breadcrumbs=array(
	'Tbl Tests'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TblTest', 'url'=>array('index')),
	array('label'=>'Create TblTest', 'url'=>array('create')),
	array('label'=>'Update TblTest', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblTest', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblTest', 'url'=>array('admin')),
);
?>

<h1>View TblTest #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'sum_income',
		'date_income',
	),
)); ?>
