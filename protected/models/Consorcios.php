<?php

/**
 * This is the model class for table "consorcios".
 *
 * The followings are the available columns in table 'consorcios':
 * @property integer $id
 * @property string $description
 * @property string $rdate
 * @property string $udate
 * @property integer $status
 * @property integer $provincias_id
 * @property integer $tiposoperacion_id
 * @property integer $registros_id
 *
 * The followings are the available model relations:
 * @property Provincias $provincias
 * @property Tiposoperacion $tiposoperacion
 * @property Registros $registros
 * @property Pymes[] $pymes
 * @property Tiposproducto[] $tiposproductos
 */
class Consorcios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'consorcios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('provincias_id, tiposoperacion_id', 'required'),
			array('status, provincias_id, tiposoperacion_id, registros_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>45),
			array('rdate, udate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, description, rdate, udate, status, provincias_id, tiposoperacion_id, registros_id', 'safe', 'on'=>'search'),
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
			'provincias' => array(self::BELONGS_TO, 'Provincias', 'provincias_id'),
			'tiposoperacion' => array(self::BELONGS_TO, 'Tiposoperacion', 'tiposoperacion_id'),
			'registros' => array(self::BELONGS_TO, 'Registros', 'registros_id'),
			'pymes' => array(self::HAS_MANY, 'Pymes', 'consorcios_id'),
			'tiposproductos' => array(self::HAS_MANY, 'Tiposproducto', 'consorcios_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Descripción',
            'rdate' => 'Fecha de Registro',
            'udate' => 'Fecha de Actualización',
			'status' => 'Estado',
			'provincias_id' => 'Provincias',
			'tiposoperacion_id' => 'Tipo de Operacion',
			'registros_id' => 'Registros',
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
        // Búsqueda con tabla relacionada
//        $criteria->with = 'provincias';
//        $criteria->with = 'registros';

        $criteria->with=array('provincias','registros');
        $criteria->compare('provincias.name', $this->provincias_id, true);
        $criteria->compare('registros.name', $this->registros_id, true);

		$criteria->compare('id',$this->id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('rdate',$this->rdate,true);
		$criteria->compare('udate',$this->udate,true);
		$criteria->compare('status',$this->status);
        $criteria->compare('tiposoperacion_id',$this->tiposoperacion_id);
        //$criteria->compare('provincias_id',$this->provincias_id);
        //$criteria->compare('registros_id',$this->registros_id);



        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function searchCons()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('description',$this->description,true);
        $criteria->compare('rdate',$this->rdate,true);
        $criteria->compare('udate',$this->udate,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('provincias_id',$this->provincias_id);
        $criteria->compare('tiposoperacion_id',$this->tiposoperacion_id);
        $criteria->compare('registros_id',$this->registros_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Consorcios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
