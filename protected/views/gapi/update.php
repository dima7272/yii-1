<?php
/* @var $this GapiController */
/* @var $model Gapi */

$this->breadcrumbs=array(
	'Gapis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gapi', 'url'=>array('index')),
	array('label'=>'Create Gapi', 'url'=>array('create')),
	array('label'=>'View Gapi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Gapi', 'url'=>array('admin')),
);
?>

<h1>Update Gapi <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>