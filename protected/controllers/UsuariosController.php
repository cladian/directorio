<?php

class UsuariosController extends Controller
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
                //'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'roles' => array('adm'),
                //'users'=>array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('updateData'),
                'roles' => array('pyme','adm','cons'),
                //'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin'),
                'roles' => array('adm'),
                //'users'=>array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('index', '*', 'delete'),
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
        $model = new Usuarios;
        $modelAuthAssignment = new AuthAssignment;


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuarios']) && isset($_POST['AuthAssignment'])) {
            $model->attributes = $_POST['Usuarios'];
            $modelAuthAssignment->attributes = $_POST['AuthAssignment'];


            if ($model->validate() ) {
                //exit();
                $model->save();

                $modelAuthAssignment->userid = $model->username;
                $modelAuthAssignment->itemname = 'adm';

                $modelAuthAssignment->save();

                Yii::app()->user->setFlash('success', Yii::app()->params['saveSuccess']);

                //CRUDMODIFICATION
                $this->redirect(array('admin'));
            }

        }

        $this->render('create', array(
            'model' => $model,
            'modelAuthAssignment' => $modelAuthAssignment,
        ));
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

        if (isset($_POST['Usuarios'])) {
            $model->attributes = $_POST['Usuarios'];
            if ($model->save())
                //CRUDMODIFICATION
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

/*    public function actionUpdateData()
    {

        $id= Yii::app()->user->getState('IDUSER');
        $model = $this->loadModel($id);
        $modelAuthAssignment = new AuthAssignment;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Usuarios'])) {
            $model->attributes = $_POST['Usuarios'];
            if ($model->save())
                //CRUDMODIFICATION
                $this->redirect(array('site/index'));
        }

        $this->render('updateData', array(
            'model' => $model,
            'modelAuthAssignment' => $modelAuthAssignment,
        ));
    }*/


    public function actionUpdateData()
    {
        $id= Yii::app()->user->getState('IDUSER');
        $model = $this->loadModel($id);
        $modelAuthAssignment = new AuthAssignment;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $password = $model->password;


        if (isset($_POST['Usuarios'])) {
            $model->attributes = $_POST['Usuarios'];
            $modelUsuario = $this->loadModel($id);

            if ($modelUsuario->password != $model->password)
                $model->password = md5($model->password);
            if ($model->save())
                if (!Yii::app()->user->isGuest) {
                    $error = "Actualización de contraseña CORRECTA   . ";
                    //Validar la dirección y mostrar mensaje FLASH
                    Yii::app()->user->setFlash('success', $error);
                    $this->redirect(array('site/index'));
                    Yii::app()->end();
                }
                //CRUDMODIFICATION
                else //Restaruación del password si no se alaceno el registro
                    $model->password = $password;
        }
        $this->render('updateData', array(
            'model' => $model,
            'modelAuthAssignment' => $modelAuthAssignment,
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
        $dataProvider = new CActiveDataProvider('Usuarios');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Usuarios('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Usuarios']))
            $model->attributes = $_GET['Usuarios'];

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

        $model = Usuarios::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuarios-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function sendMail($id){
        $html="<h1>Bienvenido</h1>";
        return $html;
    }
}
