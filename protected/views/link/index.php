<?php
/* @var $this LinkController */

$this->breadcrumbs=array(
	'Link',
);
?>
<h1><?php //echo $this->id . '/' . $this->action->id; ?>Состав групп:</h1>
<!--
<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>-->
<p>
<table border="1" id="ggroups">
    <tr><td>Название</td><td>Email</td><td>Участники</td></tr>
<?php
    foreach ($list as $value) {
        echo'<tr>';
        echo'<td>' . $value['name'] . '</td>';
        echo'<td>' . $value['email'] . '</td>';
        echo'<td>' . $value['list'] . '</td>';
        echo'</tr>';
    }
?>
</table>
</p>