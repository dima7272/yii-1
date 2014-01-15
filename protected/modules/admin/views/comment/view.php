<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->menu=array(
	array('label'=>'Журнал комментариев', 'url'=>array('index')),
	array('label'=>'Удаление комментария', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить эту запись?')),
);
?>

<h1>Просмортр комментария #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'page_id',
		'created',
		'user_id',
		'guest',
	),
)); ?>
