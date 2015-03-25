<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="span-13">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span-9 ">
        <div id="sidebar">
           <h4>Estadísticas Generales</h4>
            <?php
            $stdReg=Stdregistos::model()->findAll();
            $data=array();
            $data[]=array('Tipo', 'registros');

            foreach ($stdReg as $item)
            {
                $data[]=array($item->name, (int)$item->total);
            }

            //very useful google chart
            $this->widget('ext.Hzl.google.HzlVisualizationChart', array('visualization' => 'PieChart',
                'data' => $data,
                'options' => array(
                    'title' => 'Total Registros',
                    'width' => '380',
                    'height' => '300'
                )));

            ?>
           <!-- <?php
/*            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => 'Consorcio',
                'type' => 'primary',
                'url'=>Yii::app()->controller->createUrl("registros/createadmcons"),

            ));
            */?>
            &nbsp;
            --><?php
/*            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => 'Pyme',
                'type' => 'primary',
                'url'=>Yii::app()->controller->createUrl("registros/createadmcons"),

            ));
            */?>
            <!--&nbsp;
            <?php
/*            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => 'Usuario',
                'type' => 'warning',
                'url'=>Yii::app()->controller->createUrl("registros/createadmcons"),

            ));
            */?>
            &nbsp;
            <?php
/*            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => 'Usuario',
                'type' => 'info',
                'url'=>Yii::app()->controller->createUrl("registros/createadmcons"),

            ));
            */?>
            &nbsp;
            <?php
/*            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => 'Usuario',
                'type' => 'danger',
                'url'=>Yii::app()->controller->createUrl("registros/createadmcons"),

            ));
            */?>
            &nbsp;
            --><?php
/*            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => 'Usuario',
                'type' => 'inverse',
                'url'=>Yii::app()->controller->createUrl("registros/createadmcons"),

            ));
            */?>
        </div><!-- sidebar -->
    </div>
<?php $this->endContent(); ?>