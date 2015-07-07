<?php

$this->pageTitle=Yii::app()->name . ' - Crud App';
$this->breadcrumbs=array(
	'Update By ID',
);
?>

<h1>Update Page</h1>
<?php 
    if(Yii::app()->user->hasFlash('contact')){
       echo' <div class="flash-success">';
        echo Yii::app()->user->getFlash('contact');
       echo' </div>';
    }else{
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'update-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
        
	
	<?php 
        //echo $form->errorSummary($model);
         foreach ($value as $data){ 
        ?>
        <div class="row">
                <?php echo $form->hiddenField($model,'id',array('value'=>$data['id'])); ?>
        </div>
	<div class="row">
		<?php echo $form->labelEx($model,'UserName'); ?>
		<?php echo $form->textField($model,'username',array('value'=>$data['username'])) ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Role'); ?>
		<?php echo $form->textField($model,'role',array('value'=>$data['role'])); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->textField($model,'password',array('value'=>$data['password'])); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'status',array('value'=>$data['status'])); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
		
	<div class="row buttons">
		<?php echo CHtml::submitButton('Update'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php 
        }
     }
?>
