<?php

/**
 * This is the model class for table "{{link}}".
 *
 * The followings are the available columns in table '{{link}}':
 * @property integer $id
 * @property string $title
 * @property string $text
 */
class Link extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public function showList(){
        $params['access_token'] = $_GET['token'];
        $params['customer'] = 'my_customer';
        //$params['maxResults'] = 5;
        //if(file_get_contents('https://www.googleapis.com/admin/directory/v1/groups' . '?' . urldecode(http_build_query($params))) == false)
            //exit;
        $groupInfo = json_decode(file_get_contents('https://www.googleapis.com/admin/directory/v1/groups' . '?' . urldecode(http_build_query($params))), true);
        $arr1 = array();
        //$x = 'https://www.googleapis.com/admin/directory/v1/groups' . '?' . urldecode(http_build_query($params));
        $i=-1;
        foreach ($groupInfo as $value) {
            if( is_array($value)){
                foreach($value as $arr){
                    $i++;
                    $arr1[$i]['name'] = $arr['name'];
                    $arr1[$i]['email'] = $arr['email'];
                    $users = json_decode(file_get_contents('https://www.googleapis.com/admin/directory/v1/groups/' . $arr['email'] .'/members' .'?'. urldecode(http_build_query($params))),true);
                    $arr1[$i]['list'] = '';
                    foreach ($users as $value2) {
                        if(is_array($value2)){
                            foreach($value2 as $arr2){
                                if(isset($arr2['email']))
                                    $arr1[$i]['list'] = $arr1[$i]['list'] . $arr2['email'] . '<br />';
                            }
                        }
                    }
                    //if($col) echo '<td>&nbsp;</td>';
                }
            }
        }
        return $arr1;
    }
	public function tableName()
	{
		return '{{link}}';
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
	 * @return Link the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
