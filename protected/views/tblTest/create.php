<?php
/* @var $this TblTestController */
/* @var $model TblTest */

$this->breadcrumbs=array(
	'Tbl Tests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblTest', 'url'=>array('index')),
	array('label'=>'Manage TblTest', 'url'=>array('admin')),
);
?>

<h1>Create TblTest</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>