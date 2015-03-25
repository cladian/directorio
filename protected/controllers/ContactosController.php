<?php

class ContactosController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('view'),
                'roles' => array('adm'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'roles' => array('adm', 'pyme'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('createDialog'),
                'roles' => array('adm', 'cons', 'pyme'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin'),
                'roles' => array('adm'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'roles' => array('pyme', 'adm', 'cons'),
                //'users'=>array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('index', '*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Contactos;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Contactos'])) {
            $model->attributes = $_POST['Contactos'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', Yii::app()->params['saveSuccess']);
                //CRUDMODIFICATION
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Función para almacenar
     */
    public function actionCreateDialog($id)
    {
        $model = new Contactos;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Contactos'])) {
            $model->attributes = $_POST['Contactos'];
            if ($model->save()) {
                if (Yii::app()->request->isAjaxRequest) {
                    echo CJSON::encode(array(
                        'status' => 'success',
                        'div' => "Registro agregado éxitosamente"
                    ));
                    exit;
                } else
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }

        if (Yii::app()->request->isAjaxRequest) {
            echo CJSON::encode(array(
                'status' => 'failure',
                'div' => $this->renderPartial('_formDialog', array('model' => $model, 'id' => $id), true)));
            exit;
        } else
            $this->render('create', array('model' => $model,));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Contactos'])) {
            $model->attributes = $_POST['Contactos'];
            if ($model->save()) {

                if ($model->registros->tiposregistro_id == Yii::app()->params['idCons']) {
                    $modelConsorcio = Consorcios::model()->find('registros_id=?', array($model->registros->id));
                    $this->redirect(array('consorcios/view', 'id' => $modelConsorcio->id));

                }

                if ($model->registros->tiposregistro_id == Yii::app()->params['idPyme']) {
                    $modelPyme = Pymes::model()->find('registros_id=?', array($model->registros->id));
                    if (Yii::app()->user->getState('TIPOREGISTROID') == Yii::app()->params['idPyme'])
                        $this->redirect(array('pymes/viewpyme', 'id' => $modelPyme->id));
                    else
                        $this->redirect(array('pymes/view', 'id' => $modelPyme->id));

                }

                if ($model->registros->tiposregistro_id == Yii::app()->params['idPro']) {
                    $modelProveedor = Proveedores::model()->find('registros_id=?', array($model->registros->id));
                    $this->redirect(array('proveedores/view', 'id' => $modelProveedor->id));

                }

                if ($model->registros->tiposregistro_id == Yii::app()->params['idCli']) {
                    $modelCliente = Clientes::model()->find('registros_id=?', array($model->registros->id));
                    $this->redirect(array('clientes/view', 'id' => $modelCliente->id));

                }
            }
            //CRUDMODIFICATION
            //	 $this->redirect(array('pymes/view','id'=>$model->id));
        }

        $this->render('update', array(
            'model' => $model,
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
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Contactos');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Contactos('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Contactos']))
            $model->attributes = $_GET['Contactos'];

        $this->render('admin', array(
            'model' => $model,
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

        $model = Contactos::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'contactos-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
