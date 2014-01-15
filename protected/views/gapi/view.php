<?php
/* @var $this GapiController */
/* @var $model Gapi */

$this->breadcrumbs=array(
	'Gapis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Gapi', 'url'=>array('index')),
	array('label'=>'Create Gapi', 'url'=>array('create')),
	array('label'=>'Update Gapi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Gapi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gapi', 'url'=>array('admin')),
);
?>

<h1>View Gapi #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'group',
		'user',
	),
)); ?>
