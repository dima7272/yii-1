<?php
/* @var $this UserController */
/* @var $model User */

$this->menu=array(
	array('label'=>'Журнал пользователей', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Просмотр данных пользователей', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Изменить пароль', 'url'=>array('password', 'id'=>$model->id)),
);
?>

<h1>Обновление данных о пользователе <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>