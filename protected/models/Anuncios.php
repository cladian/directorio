<?php

/**
 * This is the model class for table "anuncios".
 *
 * The followings are the available columns in table 'anuncios':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $file
 * @property string $startdate
 * @property string $enddate
 * @property string $rdate
 * @property string $udate
 * @property integer $status
 * @property integer $tiposanuncio_id
 * @property integer $registros_id
 *
 * The followings are the available model relations:
 * @property Tiposanuncio $tiposanuncio
 * @property Registros $registros
 */
class Anuncios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'anuncios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, tiposanuncio_id, registros_id', 'required'),
			array('status, tiposanuncio_id, registros_id', 'numerical', 'integerOnly'=>true),
			array('title, file', 'length', 'max'=>45),
			array('description', 'length', 'max'=>100),
			array('startdate, enddate, rdate, udate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, file, startdate, enddate, rdate, udate, status, tiposanuncio_id, registros_id', 'safe', 'on'=>'search'),
            // Valores por defecto
            array(  'rdate','default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false,'on'=>'insert'),
            array(  'udate','default', 'value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert, update'),

            array(  'status','default', 'value'=>'1', 'setOnEmpty'=>false,'on'=>'insert'),

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
			'tiposanuncio' => array(self::BELONGS_TO, 'Tiposanuncio', 'tiposanuncio_id'),
			'registros' => array(self::BELONGS_TO, 'Registros', 'registros_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Título',
			'description' => 'Descripción',
			'file' => 'Archivo',
			'startdate' => 'Fecha de Inicio',
			'enddate' => 'Fecha de Finalización',
			'rdate' => 'Fecha de Registro',
			'udate' => 'Fecha de Actualización',
			'status' => 'Estado',
			'tiposanuncio_id' => 'Tipo de Anuncio',
			'registros_id' => 'Publicar para',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('startdate',$this->startdate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('rdate',$this->rdate,true);
		$criteria->compare('udate',$this->udate,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('tiposanuncio_id',$this->tiposanuncio_id);
		$criteria->compare('registros_id',$this->registros_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function searchByIdConsorcio($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('startdate',$this->startdate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('rdate',$this->rdate,true);
		$criteria->compare('udate',$this->udate,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('tiposanuncio_id',$this->tiposanuncio_id);
		$criteria->compare('registros_id',$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @return CActiveDataProvider
     * Utilizado para cargar únicamente los anuncios Activos
     */
    public function searchByStatus()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('title',$this->title,true);
        $criteria->compare('description',$this->description,true);
        $criteria->compare('file',$this->file,true);
        $criteria->compare('startdate',$this->startdate,true);
        $criteria->compare('enddate',$this->enddate,true);
        $criteria->compare('rdate',$this->rdate,true);
        $criteria->compare('udate',$this->udate,true);
        $criteria->compare('status',1);
        $criteria->compare('tiposanuncio_id',$this->tiposanuncio_id);
        $criteria->compare('registros_id',$this->registros_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function searchCons()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('startdate',$this->startdate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('rdate',$this->rdate,true);
		$criteria->compare('udate',$this->udate,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('tiposanuncio_id',$this->tiposanuncio_id);
		$criteria->compare('registros_id',$this->registros_id); // Variable sesion CONSORCIO ID

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Anuncios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
