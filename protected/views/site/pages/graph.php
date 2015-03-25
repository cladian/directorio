
<h1>Estadisticas</h1>
<code>

    http://www.yiiframework.com/extension/googlechart/
</code>

<div class="row">
    <div class="span6" >
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
                 'width' => '600',
                 'height' => '400'
            )));



        $this->widget('ext.Hzl.google.HzlVisualizationChart', array('visualization' => 'Bar',
            'data' => array(
                array('Consorcio', 'Pymes'),
                array('Bolivar', 11),
                array('Chimborazo', 2)
            ),
            'options' => array(
                'title' => 'Pymes por Consorcio',
               // 'width' => '100%',
               // 'height' => 600
            )));

        $this->widget('ext.Hzl.google.HzlVisualizationChart', array('visualization' => 'CoreChart',
            'data' => array(
                array('Consorcio', 'Pymes'),
                array('Bolivar', 11),
                array('Chimborazo', 2)
            ),
            'options' => array(
                'title' => 'Pymes por Consorcio',
               // 'width' => '100%',
               // 'height' => 600
            )));

        $this->widget('ext.Hzl.google.HzlVisualizationChart', array('visualization' => 'LineChart',
            'data' => array(
                array('Task', 'Hours per Day'),
                array('Work', 11),
                array('Eat', 2),
                array('Commute', 2),
                array('Watch TV', 2),
                array('Sleep', 7)
            ),
            'options' => array('title' => 'My Daily Activity')));
        ?>

    </div>
</div>

<div>
    <?php
    $this->widget('ext.Hzl.google.HzlVisualizationChart', array('visualization' => 'OrgChart', 'packages'=>'orgchart',
        'data' => array(
            array('Name', 'Manager','ToolTip'),
            array(array('v'=>'Mike','f'=>'Mike<div style="color:red; font-style:italic">President</div>'), '', 'The President'),
            array(array('v'=>'Jim','f'=>'Jim<div style="color:red; font-style:italic">Vice President</div>'), 'Mike', 'VP'),
            array('Alice', 'Mike', ''),
            array('Bob', 'Jim', 'Bob Sponge'),
            array('Carol', 'Bob', '')
        ),
        'options' => array('allowHtml' => true)));
    ?>
</div>