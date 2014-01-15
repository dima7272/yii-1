<?php
/* @var $this GapiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gapis',
);

$this->menu=array(
	array('label'=>'Create Gapi', 'url'=>array('create')),
	array('label'=>'Manage Gapi', 'url'=>array('admin')),
);
?>

<h1>Аутентификация через Google</h1>

<?php
$client_id = '393366204033.apps.googleusercontent.com'; // Client ID
$client_secret = '0qAnUQAlU_VZH4ZeZrT1uq4z'; // Client secret
$redirect_uri = 'http://localhost/index.php'; // Redirect URIs

$url = 'https://accounts.google.com/o/oauth2/auth';
$params = array(
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code',
    'client_id'     => $client_id,
    'scope'         => 'https://www.googleapis.com/auth/admin.directory.group.readonly '
);
echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация</a></p>';
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
