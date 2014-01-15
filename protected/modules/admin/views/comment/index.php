<?php
/* @var $this CommentController */
/* @var $model Comment */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал комментариев</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
            'name' => 'id',
            'headerHtmlOptions' => array('width' => 30),
        ),
        'status' => array(
            'name' => 'status',
            'value' => '$data->status==1?"Подтверждено":"Не проверено"',
            'filter' => array(1=>"Подтверждено",0=>"Не проверено")
        ),
		'content',
		'page_id' => array(
            'name' => 'page_id',
            'value' => '$data->page->title',
            'filter' => Page::all(),
        ),
		'created' => array(
            'name' => 'created',
            'value' => 'date("j.m.Y H:i", $data->created)',
            'filter' => false,
        ),
        'user_id' => array(
            'name' => 'user_id',
            'value' => '$data->user->username',
            'filter' => User::all(),
        ),
		'guest',
		array(
			'class'=>'CButtonColumn',
            'updateButtonOptions' => array('style'=>'display:none'),
		),
	),
)); ?>
