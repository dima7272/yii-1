<?php
/* @var $this ApisController */

$this->breadcrumbs=array(
	'Apis',
);
?>
<h1><?php //echo $this->id . '/' . $this->action->id;
        echo 'Получение состава групп Google';
    ?></h1>

<?php
if($newLink != '0')
    echo "<p>
        <a href=" . $newLink . ">Список групп</a>
          </p>";
else
    echo "<p>
    <a href=" . $authUrl . ">Аутентификация</a>
          </p>";
?>