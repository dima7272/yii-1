<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Категория: '.$model->category->title=>array('index','id'=>$model->category_id),
    $model->title,
);
 ?>
<h1>
<?php
    echo $model->title;
?>
</h1>
<?php
echo date('j.m.Y H:i',$model->created);
?>
<hr />
<?php
    echo $model->content;
?>