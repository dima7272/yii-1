<?php
/* @var $this UserController */
/* @var $model User */

$this->menu=array(
	array('label'=>'Журнал пользователей', 'url'=>array('index')),
	array('label'=>'Обновление данных пользователей', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление пользователей', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Точно решили удалить записи о пользователе?')),
);
?>

<h1>Просмотр данных пользователя #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'created',
		'ban',
		'role',
		'email',
	),
)); ?>
