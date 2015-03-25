<?php

class RegistrosController extends Controller
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
            //Creates, personalizados para la creación de registros por tipo
            // Verificadas 15dic

            array('allow',
                'actions' => array('admin', 'createCons'),
                'roles' => array('adm'),
            ),
            array('allow',
                'actions' => array('createPyme'),
                'roles' => array('adm','cons'),
            ),


            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array( 'createDialogProveedor', 'createDialogCliente'),
                'roles' => array('adm','cons','pyme'),
            ),

            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('createCliDialog','createCli'),
                'roles' => array('adm'),
            ),

            array('deny',  // deny all users
                'users' => array('index', '*', 'delete', 'create', 'view', 'update'),
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
        $model = new Registros;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Registros'])) {
            $model->attributes = $_POST['Registros'];
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
     * PERFIL: Administrador
     * Acción: crear un registro de consorcio con todos los datos relacionados
     */
    public function actionCreateCons()
    {
        $model = new Registros;
        $modelUsuario = new Usuarios();
        $modelUsuarioRegistro = new Usuarioregistro();
        $modelConsorcio = new Consorcios();
        $modelAuth = new AuthAssignment();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Registros']) && isset($_POST['Usuarios']) && isset($_POST['Consorcios'])) {
            $model->attributes = $_POST['Registros'];
            $modelUsuario->attributes = $_POST['Usuarios'];
            $modelConsorcio->attributes = $_POST['Consorcios'];

            // Esfecificar el scenario para la validación
            $model->scenario = 'admin';
            if ($model->validate('admin') && $model->validate() && $modelUsuario->validate() && $modelConsorcio->validate()) {
                $model->save();

                $modelUsuario->password = md5($modelUsuario->password);
                $modelUsuario->save();

                // Luego de almacenar los modelos creamos la relación Usuario Registro
                $modelUsuarioRegistro->registros_id = $model->id;
                $modelUsuarioRegistro->usuarios_id = $modelUsuario->id;
                $modelUsuarioRegistro->save();

                $modelConsorcio->registros_id = $model->id;
                $modelConsorcio->description = $model->name;
                $modelConsorcio->save();

                $modelAuth->itemname = 'cons';
                $modelAuth->userid = $modelUsuario->username;
                $modelAuth->save();

                Yii::app()->user->setFlash('success', Yii::app()->params['saveSuccess']);

                //CRUDMODIFICATION
                $this->redirect(array('consorcios/admin'));
            }

        }
        $this->render('createCons', array(
            'model' => $model,
            'modelUsuario' => $modelUsuario,
            'modelConsorcio' => $modelConsorcio,
            'tipoRegistro' => Yii::app()->params['idCons'],
        ));
    }

    /**
     * PERFIL: Administrador
     * Acción: crear un registro de Pyme con todos los datos relacionados
     */
    public function actionCreatePyme()
    {
        $model = new Registros;
        $modelUsuario = new Usuarios();
        $modelUsuarioRegistro = new Usuarioregistro();
        $modelPyme = new Pymes();
        $modelAuth = new AuthAssignment();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Pymes']) && isset($_POST['Registros']) && isset($_POST['Usuarios'])) {
            $model->attributes = $_POST['Registros'];
            $modelUsuario->attributes = $_POST['Usuarios'];
            $modelPyme->attributes = $_POST['Pymes'];

            // Esfecificar el scenario para la validación
            $model->scenario = 'admin';
            if ($model->validate('admin') && $model->validate() && $modelUsuario->validate() && $modelPyme->validate())

                $password = $modelUsuario->password;

            // Verificar datos enviados
            if ($model->validate() && $modelUsuario->validate() && $modelPyme->validate()) {
                $modelUsuario->password = md5($modelUsuario->password);
                $model->save();
                $modelUsuario->save();

                // Luego de almacenar los modelos creamos la relación Usuario Registro
                $modelUsuarioRegistro->registros_id = $model->id;
                $modelUsuarioRegistro->usuarios_id = $modelUsuario->id;
                $modelUsuarioRegistro->save();

                $modelPyme->registros_id = $model->id;
                $modelPyme->save();

                $modelAuth->itemname = 'pyme';
                $modelAuth->userid = $modelUsuario->username;
                $modelAuth->save();

                Yii::app()->user->setFlash('success', Yii::app()->params['saveSuccess']);
                //CRUDMODIFICATION
                $this->redirect(array('pymes/admin'));

            }

            // Si el modelo lo fue almacenadado se recupera el password sin encriptar
            // $modelUsuario->password=$password;
        }


        $this->render('createPyme', array(
            'model' => $model,
            'modelUsuario' => $modelUsuario,
            'modelPyme' => $modelPyme,
            'tipoRegistro' => Yii::app()->params['idPyme'],
        ));
    }

    /** pendiente
     * PERFIL: Administrador
     * Acción: crear un registro de Cliente
     */
    public function actionCreateCli()
    {
        $model = new Registros;
        $modelCliente = new Clientes();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Registros']) && isset($_POST['Clientes'])) {
            $model->attributes = $_POST['Registros'];
            $modelCliente->attributes = $_POST['Clientes'];

            if ($model->validate() && $modelCliente->validate()) {
                $model->save();
                $modelCliente->registros_id = $model->id;
                $modelCliente->save();

                Yii::app()->user->setFlash('success', Yii::app()->params['saveSuccess']);
                //CRUDMODIFICATION
                $this->redirect(array('view', 'id' => $model->id));

            }
        }

        $this->render('createCli', array(
            'model' => $model,
            'modelCliente' => $modelCliente,
            'tipoRegistro' => Yii::app()->params['idCli'],
        ));
    }

    /**
     * PERFIL: Administrador
     * Acción: crear un registro de Proveedor
     */
    public function actionCreatePro()
    {
        $model = new Registros();
        $modelProveedor = new Proveedores();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Proveedores']) && isset($_POST['Registros'])) {
            $model->attributes = $_POST['Registros'];
            $modelProveedor->attributes = $_POST['Proveedores'];

            // Verificar datos enviados
            if ($model->validate() & $modelProveedor->validate()) {
                // Luego de almacenar los modelos creamos la relación Usuario Registro
                $model->save();
                $modelProveedor->registros_id = $model->id;
                $modelProveedor->registros_idp = $id;
                $modelProveedor->save();

                Yii::app()->user->setFlash('success', Yii::app()->params['saveSuccess']);
                //CRUDMODIFICATION
                $this->redirect(array('admin'));
            }
        }
        $this->render('createPro', array(
            'model' => $model,
            'modelProveedor' => $modelProveedor,
            'tipoRegistro' => Yii::app()->params['idPro'],

        ));
    }

    /**
     * @param $id  Corresponde al ID de la Pyme
     * @throws CException
     */
    public function actionCreateDialogProveedor($id)
    {
        $model = new Registros();
        $modelProveedor = new Proveedores();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Proveedores']) && isset($_POST['Registros'])) {
            $model->attributes = $_POST['Registros'];
            $modelProveedor->attributes = $_POST['Proveedores'];

            // Verificar datos enviados
            if ($model->validate() & $modelProveedor->validate()) {
                // Luego de almacenar los modelos creamos la relación Usuario Registro
                $model->save();
                $modelProveedor->registros_id = $model->id;
                $modelProveedor->save();

                if (Yii::app()->request->isAjaxRequest) {
                    echo CJSON::encode(array(
                        'status' => 'success',
                        'div' => "Registro agregado éxitosamente"
                    ));
                    exit;
                } else
                    //CRUDMODIFICATION
                    $this->redirect(array('admin'));
            }
        }
        if (Yii::app()->request->isAjaxRequest) {

            Yii::app()->clientscript->scriptMap['jquery.js'] = false;
            Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
            Yii::app()->clientscript->scriptMap['jquery.yiigridview.js'] = false;

            echo CJSON::encode(array(
                'status' => 'failure',
                'div' => $this->renderPartial('_formPro', array(
                    'model' => $model,
                    'modelProveedor' => $modelProveedor,
                    'tipoRegistro' => Yii::app()->params['idPro'],
                    'id' => $id
                ), true)));
            exit;
        } else {
            $this->render('createPro', array(
                'model' => $model,
                'modelProveedor' => $modelProveedor,
                'tipoRegistro' => Yii::app()->params['idPro'],

            ));
        }
    }

    /**
     * @param $id  Corresponde al ID de la Pyme
     * @throws CException
     */
    public function actionCreateDialogCliente($id)
    {
        $model = new Registros();
        $modelCliente = new Clientes();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Clientes']) && isset($_POST['Registros'])) {
            $model->attributes = $_POST['Registros'];
            $modelCliente->attributes = $_POST['Clientes'];

            // Verificar datos enviados
            if ($model->validate() & $modelCliente->validate()) {
                // Luego de almacenar los modelos creamos la relación Usuario Registro
                $model->save();
                $modelCliente->registros_id = $model->id;
                $modelCliente->save();

                if (Yii::app()->request->isAjaxRequest) {
                    echo CJSON::encode(array(
                        'status' => 'success',
                        'div' => "Registro agregado éxitosamente"
                    ));
                    exit;
                } else
                    //CRUDMODIFICATION
                    $this->redirect(array('admin'));
            }
        }
        if (Yii::app()->request->isAjaxRequest) {

            Yii::app()->clientscript->scriptMap['jquery.js'] = false;
            Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
            Yii::app()->clientscript->scriptMap['jquery.yiigridview.js'] = false;

            echo CJSON::encode(array(
                'status' => 'failure',
                'div' => $this->renderPartial('_formCli', array(
                    'model' => $model,
                    'modelCliente' => $modelCliente,
                    'tipoRegistro' => Yii::app()->params['idCli'],
                    'id' => $id
                ), true)));
            exit;
        } else {
            $this->render('createCli', array(
                'model' => $model,
                'modelCliente' => $modelCliente,
                'tipoRegistro' => Yii::app()->params['idCli'],

            ));
        }
    }



    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Registros'])) {
            $model->attributes = $_POST['Registros'];
            if ($model->save())
                //CRUDMODIFICATION
                $this->redirect(array('view', 'id' => $model->id));
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
        $dataProvider = new CActiveDataProvider('Registros');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Registros('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Registros']))
            $model->attributes = $_GET['Registros'];

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

        $model = Registros::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'registros-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
