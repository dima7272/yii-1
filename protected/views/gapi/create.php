<?php
/* @var $this GapiController */
/* @var $model Gapi */

$this->breadcrumbs=array(
	'Gapis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gapi', 'url'=>array('index')),
	array('label'=>'Manage Gapi', 'url'=>array('admin')),
);
?>

<h1>Create Gapi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>