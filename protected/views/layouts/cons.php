<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="span-13">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span-9 ">
        <div id="sidebar">
            <img  src="img/amarillo.jpg" />
           <!--<h4>Estadísticas Generales Consorcio</h4>
            --><?php
/*            $stdReg=Stdregistos::model()->findAll();
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

            */?>
         <!--   <h4>Estadisticas</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                PageMaker including versions of Lorem Ipsum.</p>-->


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
