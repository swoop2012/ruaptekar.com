<div class="order">
<?php if(Yii::app()->user->hasFlash('contact')): ?>
<div class="flash-success">
    <h1><?php echo Yii::app()->user->getFlash('contact'); ?></h1>
</div>
<?php else: ?>

    <h1>Обратная связь</h1>
    <h2>Не забывайте указывать E-mail, на него будет отправлен ответ на ваше обращение!</h2>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'contact-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
	<?php $this->pageTitle='Написать нам'; ?>
        <?php echo $form->errorSummary($model); ?>
        <p><label>Имя:</label>
            <?= $form->textField($model,'name'); ?>
        </p>
        <?= $form->error($model,'name'); ?>
        <p>
            <label>E-mail :*</label><?= $form->textField($model,'email'); ?>
        </p>
        <?= $form->error($model,'email'); ?>
        <p class="area"><label>Вопрос:</label>
            <?= $form->textArea($model,'body'); ?>
        </p>
        <?php echo $form->error($model,'body'); ?>

        <p><b>*</b> Звездочкой помечны поля, обязательные для заполнения</p>
        <button style='float:left'>Отправить письмо</button>


    <?php $this->endWidget(); ?>


<?php endif; ?>
</div>