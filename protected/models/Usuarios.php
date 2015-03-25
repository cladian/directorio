<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $rdate
 * @property string $udate
 *  @property string $email
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Usuarioregistro[] $usuarioregistros
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required'),
            array('username','unique','message'=>'El nombre de usuario ya existe'),
            array('status', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>45),
			array('password', 'length', 'max'=>100),
            array('email', 'length', 'max'=>150),
            array('email', 'email'),
			array('rdate, udate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, rdate, udate, status', 'safe', 'on'=>'search'),
			// Valores por defecto
            array(  'rdate','default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false,'on'=>'insert'),
            array(  'udate','default', 'value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert, update'),
            array('username', 'match','pattern'=> '/^[A-Za-z0-9_]+$/u','message'=> 'El nombre de USUARIO debe tener unicamente los siguientes caracteres [a-z,A-Z,0-9] sin espacios.'),
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
			'usuarioregistros' => array(self::HAS_MANY, 'Usuarioregistro', 'usuarios_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Usuario',
			'password' => 'Contraseña',
			'rdate' => 'Fecha de Registro',
			'udate' => 'Fecha de Actualización',
			'status' => 'Estado',
            'email' => 'Email',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('rdate',$this->rdate,true);
		$criteria->compare('udate',$this->udate,true);
		$criteria->compare('status',$this->status);
        $criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Retorna la verificación del password ingresado
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return $this->hashPassword($password)===$this->password;
    }
    public function hashPassword($password)
    {
        return md5($password);
    }

}
