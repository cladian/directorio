<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

if (Yii::app()->user->checkAccess('adm'))
{
    $this->redirect(Yii::app()->createUrl("site/adm"));
    Yii::app()->end();
}
if (Yii::app()->user->checkAccess('cons'))
{
    $this->redirect(Yii::app()->createUrl("site/cons"));
    Yii::app()->end();
}
if (Yii::app()->user->checkAccess('pyme'))
{
    $this->redirect(Yii::app()->createUrl("site/pyme"));
    Yii::app()->end();
}
/*$to="team@cladian.com";
$from="team@cladian.com";
$subject="INDO";
$message="mensaje";
Mail::mailsend("team@cladian.com",$from,"Directorio Online","<h1>Bienvenido al Directorio Online</h1>");
Mail::mailsend("edison.panchi@gmail.com",$from,"Directorio Online","<h1>Bienvenido al Directorio Online</h1>");
Mail::mailsend("edison_panchi@hotmail.com",$from,"Directorio Online","<h1>Bienvenido al Directorio Online</h1>");*/

//echo Yii::app()->user->getState('PYMEID');
?>

<h2>EL PROYECTO <i class="directorio"><?php echo CHtml::encode(Yii::app()->name); ?></i></h2>

<p>Las tecnologías de la información y comunicación se han convertido en parte del día a día de cada una de las actividades que realizamos y ello ha incluido que el negocio de las Pymes en el sector rural sea parte de este desarrollo.
    Sensibilizar a las Pymes en el uso de tecnología, crear condiciones favorables en el desarrollo de capacidades para aumentar la seguridad y confianza en su uso, y demostrar el uso de soluciones, herramientas y servicios TIC ha sido parte del trabajo del Proyecto TIC Pymes para contribuir al desarrollo económico de los actores de la cadena productiva de lácteos de las provincias Chimborazo y Bolívar. </p>

<h4>Qué es el Directorio On Line TIC Pymes?</h4>
<p>El Directorio en Línea es una herramienta que sirve como guía que lista los contactos (nombre, teléfonos, mails, etc.) de las Pymes miembros del Consorcio Nacional de Lácteos en las provincias de Bolívar y Chimborazo, así como las de sus propios proveedores y clientes con el fin de agilizar la búsqueda de información específica y mostrar los productos ofertados por los consorcios, por las Pymes y por terceros.</p>

<img src="/directorio/img/directorio.jpg" alt=""/>


