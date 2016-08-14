<?php
/* @var $this TblTestController */
/* @var $model TblTest */

$this->breadcrumbs=array(
	'Tbl Tests'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblTest', 'url'=>array('index')),
	array('label'=>'Create TblTest', 'url'=>array('create')),
	array('label'=>'View TblTest', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblTest', 'url'=>array('admin')),
);
?>

<h1>Update TblTest <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>