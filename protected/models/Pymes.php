<?php

/**
 * This is the model class for table "pymes".
 *
 * The followings are the available columns in table 'pymes':
 * @property integer $id
 * @property string $rdate
 * @property string $udate
 * @property integer $status
 * @property integer $registros_id
 * @property integer $consorcios_id
 *
 * The followings are the available model relations:
 * @property Registros $registros
 * @property Consorcios $consorcios
 */
class Pymes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pymes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' consorcios_id', 'required'),
			array('status, registros_id, consorcios_id', 'numerical', 'integerOnly'=>true),
			array('rdate, udate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rdate, udate, status, registros_id, consorcios_id', 'safe', 'on'=>'search'),
            // Valores por defecto
            array(  'rdate','default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false,'on'=>'insert'),
            array(  'udate','default', 'value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert, update'),
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
			'registros' => array(self::BELONGS_TO, 'Registros', 'registros_id'),
			'consorcios' => array(self::BELONGS_TO, 'Consorcios', 'consorcios_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'rdate' => 'Fecha de Registro',
            'udate' => 'Fecha de Actualización',
			'status' => 'Estado',
			'registros_id' => 'Registros',
			'consorcios_id' => 'Consorcios',
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
        $criteria->with=array('registros');
        $criteria->compare('registros.name', $this->registros_id, true);


		$criteria->compare('id',$this->id);
		$criteria->compare('rdate',$this->rdate,true);
		$criteria->compare('udate',$this->udate,true);
		$criteria->compare('status',$this->status);
		//$criteria->compare('registros_id',$this->registros_id);
		$criteria->compare('consorcios_id',$this->consorcios_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


    public function searchPyme()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('rdate',$this->rdate,true);
        $criteria->compare('udate',$this->udate,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('registros_id',$this->registros_id);
        $criteria->compare('consorcios_id',$this->consorcios_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    /*
      Adapatacion de busqueda para filtrar un consorcio en espescifico como administrador
      http://localhost/directorio/app/index.php?r=consorcios/view&id=1
     */
    public function searchByIdConsorcio($id)
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('rdate',$this->rdate,true);
        $criteria->compare('udate',$this->udate,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('registros_id',$this->registros_id);
        $criteria->compare('consorcios_id',$id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    //se utiliza para most
    public function searchConsPyme()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('rdate',$this->rdate,true);
        $criteria->compare('udate',$this->udate,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('registros_id',$this->registros_id);
        $criteria->compare('consorcios_id',$this->consorcios_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pymes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
