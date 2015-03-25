<?php

class TiposproveedorController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('clasificacion'),
                'roles'=>array('adm','cons','pyme'),
                //'users'=>array('*'),
            ),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
                'roles'=>array('adm'),
                //'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
                'roles'=>array('adm'),
                //'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
                'roles'=>array('adm'),
                //'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('index','*','delete'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
    public function actionView($id)
    {

        $modelClasificaciontiposproveedor=new Clasificaciontiposproveedor();
        // es importante colocar los atributos caso contrario no se podrán hacer búsquedas en el Grid de contactos
        $modelClasificaciontiposproveedor->unsetAttributes();  // clear any default values
        if(isset($_GET['Clasificaciontiposproveedor']))
            $modelClasificaciontiposproveedor->attributes=$_GET['Clasificaciontiposproveedor'];

        $this->render('view',[
            'model'=>$this->loadModel($id),
            'modelClasificaciontiposproveedor'=>$modelClasificaciontiposproveedor,
        ]);

    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tiposproveedor;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tiposproveedor']))
		{
			$model->attributes=$_POST['Tiposproveedor'];
			if($model->save())

            {
                Yii::app()->user->setFlash('success',Yii::app()->params['saveSuccess']);

				//CRUDMODIFICATION 
                                $this->redirect(array('admin'));
        }
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tiposproveedor']))
		{
			$model->attributes=$_POST['Tiposproveedor'];
			if($model->save())
                                 //CRUDMODIFICATION 
				 $this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Tiposproveedor');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tiposproveedor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tiposproveedor']))
			$model->attributes=$_GET['Tiposproveedor'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
               //CRUDMODIFICATION 
                
		$model=Tiposproveedor::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tiposproveedor-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    // Funciones Personalizadas
    public function actionClasificacion()
    {
        $padre=$_POST['padre'];
       // $padre=1;
        $data = Clasificaciontiposproveedor::model()->findAll('tiposproveedor_id=? and status=1',array($padre));
        $data = CHtml::listData($data,'id','name');
        echo CHtml::tag('option',array('value'=>''),'Seleccione Clasificación',true);
        foreach($data as $id=>$value){
            echo CHtml::tag('option',array('value'=>$id),CHtml::encode($value),true);
        }

    }
}
