<?php
/* @var $this TblTestController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	//array('label'=>'Create TblTest', 'url'=>array('create')),
	array('label'=>'Показать в виде таблицы', 'url'=>array('admin')),
);
?>

<h1>Tbl Tests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
