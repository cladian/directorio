<?php

/**
 * This is the model class for table "registros".
 *
 * The followings are the available columns in table 'registros':
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $representative
 * @property string $address
 * @property string $type
 * @property integer $status
 * @property string $rdate
 * @property string $udate
 * @property integer $tiposregistro_id
 *
 * The followings are the available model relations:
 * @property Anuncios[] $anuncioses
 * @property Clientes[] $clientes
 * @property Clientes[] $clientes1
 * @property Coberturas[] $coberturases
 * @property Consorcios[] $consorcioses
 * @property Contactos[] $contactoses
 * @property Diasentrega[] $diasentregas
 * @property Observaciones[] $observaciones
 * @property Productos[] $productoses
 * @property Proveedores[] $proveedores
 * @property Proveedores[] $proveedores1
 * @property Pymes[] $pymes
 * @property Tiposregistro $tiposregistro
 * @property Usuarioregistro[] $usuarioregistros
 */
class Registros extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tiposregistro_id, name, address', 'required'),
			array('status, tiposregistro_id', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>45),
			array('name', 'length', 'max'=>200),
			array('representative', 'length', 'max'=>100),
			array('type', 'length', 'max'=>3),
			array('address, rdate, udate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, name, representative, address, type, status, rdate, udate, tiposregistro_id', 'safe', 'on'=>'search'),
			// Valores por defecto
            array(  'rdate','default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false,'on'=>'insert'),
            array(  'udate','default', 'value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert, update'),

            //validación por escenario, será neceario incluir escenarios para cada perfil
            array('code', 'unique', 'message'=>'El código ya esta registrado en el sistema','on' => 'admin'),
            array('code', 'required', 'on' => 'admin'),

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
			'anuncioses' => array(self::HAS_MANY, 'Anuncios', 'registros_id'),
			'clientes' => array(self::HAS_MANY, 'Clientes', 'registros_id'),
			'clientes1' => array(self::HAS_MANY, 'Clientes', 'registros_idc'),
			'coberturases' => array(self::HAS_MANY, 'Coberturas', 'registros_id'),
			'consorcioses' => array(self::HAS_MANY, 'Consorcios', 'registros_id'),
			'contactoses' => array(self::HAS_MANY, 'Contactos', 'registros_id'),
			'diasentregas' => array(self::HAS_MANY, 'Diasentrega', 'registros_id'),
			'observaciones' => array(self::HAS_MANY, 'Observaciones', 'registros_id'),
			'productoses' => array(self::HAS_MANY, 'Productos', 'registros_id'),
			'proveedores' => array(self::HAS_MANY, 'Proveedores', 'registros_id'),
			'proveedores1' => array(self::HAS_MANY, 'Proveedores', 'registros_idp'),
			'pymes' => array(self::HAS_MANY, 'Pymes', 'registros_id'),
			'tiposregistro' => array(self::BELONGS_TO, 'Tiposregistro', 'tiposregistro_id'),
			'usuarioregistros' => array(self::HAS_MANY, 'Usuarioregistro', 'registros_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'RUC / CI',
			'name' => 'Nombre / Razón Social',
			'representative' => 'Representante',
			'address' => 'Dirección',
			'type' => 'Tipo',
			'status' => 'Estado',
			'rdate' => 'Fecha de Registro',
			'udate' => 'Fecha de Actualización',
			'tiposregistro_id' => 'Tipos de Registro',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('representative',$this->representative,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('rdate',$this->rdate,true);
		$criteria->compare('udate',$this->udate,true);
		$criteria->compare('tiposregistro_id',$this->tiposregistro_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function searchPyme()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('code',$this->code,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('representative',$this->representative,true);
        $criteria->compare('address',$this->address,true);
        $criteria->compare('type',$this->type,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('rdate',$this->rdate,true);
        $criteria->compare('udate',$this->udate,true);
        $criteria->compare('tiposregistro_id',$this->tiposregistro_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function searchAdm($id_registro=NULL, $id_tipoRegistro=NULL)
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('code',$this->code,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('representative',$this->representative,true);
        $criteria->compare('address',$this->address,true);
        $criteria->compare('type',$this->type,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('rdate',$this->rdate,true);
        $criteria->compare('udate',$this->udate,true);
        $criteria->compare('tiposregistro_id',$this->tiposregistro_id);

        if (Yii::app()->params['idCons']==$id_tipoRegistro)
            $criteria->compare('tiposregistro_id',Yii::app()->params['idPyme']);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /*
     * Búsqueda de Registros del tipo Consorcio, se utiliza cuando se esta visualizando los consorcios
     * el detalle de la busqueda deberá retornar todas las pymes del consorcio
     */
    public function searchPymesDelConsorcio()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;
        $criteria->together = true;
        $criteria->with='consorcioses';
        $criteria->compare('consorcioses.registros_id',2);

        $criteria->compare('id',$this->id);
        $criteria->compare('code',$this->code,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('representative',$this->representative,true);
        $criteria->compare('address',$this->address,true);
        $criteria->compare('type',$this->type,true);
        $criteria->compare('t.status',$this->status);
        $criteria->compare('rdate',$this->rdate,true);
        $criteria->compare('udate',$this->udate,true);
        $criteria->compare('tiposregistro_id',Yii::app()->params['idPyme']);

     //   if (Yii::app()->params['idCons']==$id_tipoRegistro)
       //     $criteria->compare('tiposregistro_id',Yii::app()->params['idPyme']);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Registros the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
