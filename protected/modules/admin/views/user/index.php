<?php
/* @var $this UserController */
/* @var $model User */


$this->menu=array(
	array('label'=>'Создание пользователя', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал пользователей</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
    echo CHtml::form();
    echo CHtml::submitButton('Разбанить',array('name'=>'noban'));
    echo CHtml::submitButton('Забанить',array('name'=>'ban'));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
    'selectableRows'=>2,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'class'=>'CCheckBoxColumn',
            'id'=>'User_id',
        ),
		'username',
		'password',
        'email',
		'created' => array(
            'name' => 'created',
            'value' => 'date("j.m.Y H:i",$data->created)',
            'filter' => false,
        ),
        'ban' => array(
            'name' => 'ban',
            'value' => '($data->ban==1)?"Бан":""',
            'filter' => array(0=>"Нет",1=>"Да"),
        ),
		'role' => array(
            'name' => 'role',
            'value' => '($data->role==2)?"Админ":"Пользователь"',
            'filter' => array(2=>"Админ",1=>"Пользователь"),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php
    echo CHtml::endForm();
?>