<?php

/**
 * This is the model class for table "{{apis}}".
 *
 * The followings are the available columns in table '{{apis}}':
 * @property integer $id
 * @property string $title
 * @property string $text
 */
class Apis extends CActiveRecord
{
    const SCOPE = 'https://www.googleapis.com/auth/admin.directory.group.readonly ';
    public $client_id = '393366204033.apps.googleusercontent.com'; // Client ID
    public $client_secret = '0qAnUQAlU_VZH4ZeZrT1uq4z'; // Client secret
    public $redirect_uri = 'http://localhost/index.php?r=apis'; // Redirect URIs

    public $url = 'https://accounts.google.com/o/oauth2/auth';

    public function getAuthUrl(){
        $params = array(
            'redirect_uri' => $this->redirect_uri,
            'response_type' => 'code',
            'client_id' => $this->client_id,
            'scope' => self::SCOPE);
        return $this->url . '?' . urldecode(http_build_query($params));
    }

    public function getLinks(){
        if (isset($_GET['code'])) {
            $params = array(
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret,
                'redirect_uri' => $this->redirect_uri,
                'grant_type' => 'authorization_code',
                'code' => $_GET['code']
            );
            $this->url = 'https://accounts.google.com/o/oauth2/token';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $this->url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($curl);
            curl_close($curl);
            $tokenInfo = json_decode($result, true);

            if (isset($tokenInfo['access_token'])) {
                //echo '<a href="groups.php?token=' . $tokenInfo['access_token'] . '">Состав групп</a></br>';
                return 'index.php?r=link&token=' . $tokenInfo['access_token'];
                //echo '<a href="rgroups.php?token=' . $tokenInfo['access_token'] . '">Состав групп c названиями (redmine формат)</a></br>';
            }
            else
                return 10;
        }
        else
            return '0';
    }

	/**
	 * @return string the associated database table name
	 */
    public function tableName()
	{
		return '{{apis}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'length', 'max'=>255),
			array('text', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, text', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'text' => 'Text',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Apis the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
