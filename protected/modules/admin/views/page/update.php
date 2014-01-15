<?php
/* @var $this PageController */
/* @var $model Page */

$this->menu=array(
	array('label'=>'Журнал страниц Page', 'url'=>array('index')),
	array('label'=>'Создать страницу', 'url'=>array('create')),
	array('label'=>'Просмотр страницы', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Обновление страницы <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>