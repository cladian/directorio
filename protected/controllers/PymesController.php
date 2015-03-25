<?php

class PymesController extends Controller
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
                'actions'=>array('view'),
                'roles'=>array('adm','cons'),
                //'users'=>array('*'),
            ),
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('viewPyme'),
                'roles'=>array('pyme'),
                //'users'=>array('*'),
            ),

            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('createDialog'),
                'roles'=>array('adm'),
                //'users'=>array('*'),
            ),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
                'roles'=>array( 'adm','cons'),
                //'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
                'roles'=>array('adm','cons'),
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
    public function actionView($id){
        $this->viewData($id);
    }

    public function actionViewPyme(){
        $id=Yii::app()->user->getState('PYMEID');
        $this->viewData($id);
    }

	public function viewData($id)
	{
       // VErificación previa de perfil, si el consorcio esta intentando acceder a un registro de pyme que no le pertenece
        // Automáticamente le emitirá un mensaje de error
        $model=$this->loadModel($id);
        if (Yii::app()->user->checkAccess('cons'))
            if (!($model->consorcios->id==Yii::app()->user->getState('CONSORCIOID'))){
                throw new CHttpException(403, 'Usted no se encuentra autorizado a realizar esta acción.');
            }

        $modelCoberturas=new Coberturas();
        // es importante colocar los atributos caso contrario no se podrán hacer búsquedas en el Grid de contactos
        $modelCoberturas->unsetAttributes();  // clear any default values
        if(isset($_GET['Coberturas']))
            $modelCoberturas->attributes=$_GET['Coberturas'];

        $modelContacto=new Contactos();
        // es importante colocar los atributos caso contrario no se podrán hacer búsquedas en el Grid de contactos
        $modelContacto->unsetAttributes();  // clear any default values
        if(isset($_GET['Contactos']))
            $modelContacto->attributes=$_GET['Contactos'];

        $modelProductos=new Productos();
        // es importante colocar los atributos caso contrario no se podrán hacer búsquedas en el Grid de contactos
        $modelProductos->unsetAttributes();  // clear any default values
        if(isset($_GET['Productos']))
            $modelProductos->attributes=$_GET['Productos'];

        $modelDiasentrega=new Diasentrega();
        // es importante colocar los atributos caso contrario no se podrán hacer búsquedas en el Grid de contactos
        $modelDiasentrega->unsetAttributes();  // clear any default values
        if(isset($_GET['Diasentrega']))
            $modelDiasentrega->attributes=$_GET['Diasentrega'];



        $modelProveedores=new Proveedores();
        // es importante colocar los atributos caso contrario no se podrán hacer búsquedas en el Grid de contactos
        $modelProveedores->unsetAttributes();  // clear any default values
        if(isset($_GET['Proveedores']))
            $modelProveedores->attributes=$_GET['Proveedores'];

        $modelClientes=new Clientes();
        // es importante colocar los atributos caso contrario no se podrán hacer búsquedas en el Grid de contactos
        $modelClientes->unsetAttributes();  // clear any default values
        if(isset($_GET['Clientes']))
            $modelClientes->attributes=$_GET['Clientes'];

        $this->render('view',[

            'model'=>$model,
            'modelCoberturas'=>$modelCoberturas,
            'modelContacto'=>$modelContacto,
            'modelProductos'=>$modelProductos,
            'modelDiasentrega'=>$modelDiasentrega,
            'modelProveedores'=>$modelProveedores,
            'modelClientes'=>$modelClientes,

        ]);

    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	public function actionCreate()
	{
		$model=new Pymes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pymes']))
		{
			$model->attributes=$_POST['Pymes'];
			if($model->save())
            {
                Yii::app()->user->setFlash('success',Yii::app()->params['saveSuccess']);

				//CRUDMODIFICATION 
                                $this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Pymes']))
		{
			$model->attributes=$_POST['Pymes'];
			if($model->save())
                                 //CRUDMODIFICATION 
				 $this->redirect(array('admin','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Pymes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $model=new Pymes('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Pymes']))
            $model->attributes=$_GET['Pymes'];

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
                
		$model=Pymes::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pymes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
