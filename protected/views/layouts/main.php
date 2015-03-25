<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print"/>
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection"/>
    <![endif]-->
    <?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/bootstrap/css/bootstrap.min.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/bootstrap/js/bootstrap.min.js');
    ?>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

    <div id="header">
        <img class="logo-directorio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/directorio-logo.png" alt=""/>
        <img id="logo-directorio1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/TIC_PYMES.png" alt=""/>

    </div>
    <!-- header -->

    <div id="mainmenu">
        <!-- menu desapegable  -->
        <?php $this->widget('application.extensions.mbmenu.MbMenu', array(
            'items' => array(

// MENÚ ADMINISTRADOR
                array('label' => 'Inicio',      'url' => array('/site/index')),
                array('label' => 'Registros',   'url' => array('registros/admin'),  'visible' => Yii::app()->user->checkAccess('adm')),
                array('label' => 'Consorcios',  'url' => array('consorcios/admin'), 'visible' => Yii::app()->user->checkAccess('adm')),
                array('label' => 'Pymes',       'url' => array('/pymes/admin'),     'visible' => Yii::app()->user->checkAccess('adm')),
                array('label' => 'Proveedores',    'url' => array('/proveedores/admin'),  'visible' => Yii::app()->user->checkAccess('adm')),
                array('label' => 'Clientes',    'url' => array('/clientes/admin'),  'visible' => Yii::app()->user->checkAccess('adm')),


                array('label' => 'Administración',    'url' => array('/usuarios/admin'),                                 'visible' => Yii::app()->user->checkAccess('adm'),
                    'items' => array(
                        array('label' => 'Anuncios',    'url' => array('/anuncios/admin'),  'visible' => Yii::app()->user->checkAccess('adm')),

                        array('label' => 'Usuarios',    'url' => array('/usuarios/admin'),                                 'visible' => Yii::app()->user->checkAccess('adm'),
                           'items' => array(
                               array('label' => 'Perfiles',    'url' => array('/authItem/admin'),      'visible' => Yii::app()->user->checkAccess('adm')),
                               array('label' => 'Roles',       'url' => array('/authAssignment/admin'),'visible' => Yii::app()->user->checkAccess('adm')),
                            ),
                        ),
                        array('label' => 'Catálogos',   'visible' => Yii::app()->user->checkAccess('adm'),
                            'items' => array(
                                array('label' => 'Tipos de Anuncio',    'url' => array('/tiposanuncio/admin'),  'visible' => Yii::app()->user->checkAccess('adm')),
                                array('label' => 'Tipos de Producto',   'url' => array('/tiposproducto/admin'), 'visible' => Yii::app()->user->checkAccess('adm')),
                                array('label' => 'Tipos de Registro',   'url' => array('/tiposregistro/admin'), 'visible' => Yii::app()->user->checkAccess('adm')),
                                array('label' => 'Catálogo Dias',       'url' => array('/dias/admin'),          'visible' => Yii::app()->user->checkAccess('adm')),
                                array('label' => 'Catálogo Provincias', 'url' => array('/provincias/admin'),    'visible' => Yii::app()->user->checkAccess('adm')),
                                array('label' => 'Tipos de Proveedor',  'url' => array('/tiposproveedor/admin'),'visible' => Yii::app()->user->checkAccess('adm')),
                                array('label' => 'Tipos de Contacto',   'url' => array('/tiposcontacto/admin'), 'visible' => Yii::app()->user->checkAccess('adm')),
                                array('label' => 'Tipos de Operación',  'url' => array('/tiposoperacion/admin'),'visible' => Yii::app()->user->checkAccess('adm')),
                            ),
                        ),
                    ),

                ),


// MENÚ UNILACTEOS
                //array('label' => 'Unilacteos', 'url' => array('/registros/adminUnil'), 'visible' => Yii::app()->user->checkAccess('unil'),),

// MENÚ CONSORCIOS

                array('label' => 'Consorcios',  'url' => array('consorcios/viewcons'), 'visible' => Yii::app()->user->checkAccess('cons')),
                array('label' => 'Pymes',       'url' => array('/pymes/admin'),     'visible' => Yii::app()->user->checkAccess('cons')),
//                array('label' => 'Proveedores',    'url' => array('/proveedores/admin'),  'visible' => Yii::app()->user->checkAccess('cons')),
//                array('label' => 'Clientes',    'url' => array('/clientes/admin'),  'visible' => Yii::app()->user->checkAccess('cons')),
// MENÚ Pymes
                array('label' => 'Pymes',       'url' => array('/pymes/viewpyme'),     'visible' => Yii::app()->user->checkAccess('pyme')),
               // array('label' => 'Acerca de', 'url' => array('/site/page','view' => 'about')),
                array('label' => 'Actualizar Perfil',    'url' => array('/usuarios/updateData'),  'visible' => Yii::app()->user->checkAccess('adm')),
                array('label' => 'Actualizar Perfil',    'url' => array('/usuarios/updateData'),  'visible' => Yii::app()->user->checkAccess('pyme')),
                array('label' => 'Actualizar Perfil',    'url' => array('/usuarios/updateData'),  'visible' => Yii::app()->user->checkAccess('cons')),
                array('label' => 'Anuncios',    'url' => array('/anuncios/admin'),  'visible' => Yii::app()->user->checkAccess('cons')),

//                array('label' => 'Actualización de Perfil',       'url' => array('/usuarios/updateData'),     'visible' => Yii::app()->user->checkAccess('pyme')),
                array('label' => 'Ingresar', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
            ),
        )); ?>

    </div>
    <!-- mainmenu -->
    <?php if (isset($this->breadcrumbs)): ?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
    <?php endif ?>

    <div class="info" style="text-align: left">


        <?php
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {
            echo '<ul class="flashes">';
            foreach ($flashMessages as $key => $message) {
                echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
            }
            echo '</ul>';
        }
        ?>
    </div>
    <?php
    Yii::app()->clientScript->registerScript(
        'myHideEffect',
        '$(".info").animate({opacity:1.0},5000).slideUp("slow");',
        CClientScript::POS_READY

    );

    ?>

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">

        <i> Desarrollado por CLADIAN & Proyecto tic-Pymes </i> <br>
        Copyright &copy; <?php echo date('Y'); ?>
    </div>
    <!-- footer -->

</div>
<!-- page -->

</body>
</html>
