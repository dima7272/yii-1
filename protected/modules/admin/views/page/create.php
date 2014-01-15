<?php
/* @var $this PageController */
/* @var $model Page */

$this->menu=array(
	array('label'=>'Журнал страниц', 'url'=>array('index')),
	array('label'=>'Manage Page', 'url'=>array('admin')),
);
?>

<h1>Создание страницы</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>