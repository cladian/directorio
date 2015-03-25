<?php
/**
 * Render para integrar pestañas en los formularios de ingreso
 */
?>
<div class="row">
   <p> El proceso de registro involucrá la creación de una cuenta de acceso, la misma que servirá para acceder a los diferentes recursos asignados para cada perfil de usuario</p>
</div>
<div class="row">
    <?php echo $form->labelEx($modelUsuario,'username'); ?>
    <?php echo $form->textField($modelUsuario,'username',array('size'=>45,'maxlength'=>45)); ?>
    <?php echo $form->error($modelUsuario,'username'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($modelUsuario,'password'); ?>
    <?php echo $form->passwordField($modelUsuario,'password',array('size'=>60,'maxlength'=>100)); ?>
    <?php echo $form->error($modelUsuario,'password'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($modelUsuario,'email'); ?>
    <?php echo $form->textField($modelUsuario,'email',array('size'=>60,'maxlength'=>150)); ?>
    <?php echo $form->error($modelUsuario,'email'); ?>
</div>



