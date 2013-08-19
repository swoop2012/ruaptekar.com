<? $form=$this->beginWidget('CActiveForm', array(
    'id'=>'order-form1',
    'enableAjaxValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true,
        'validateOnType'=>false,
    ),
    'htmlOptions'=>array('class'=>'tab'),
)); ?>
    <h4 class='basket-total'>К оплате:  <b><span></span></b></h4>
    <h4>Заполните данные для доставки:</b></h4>
<?= $form->hiddenField($model,'typeDelivery',array('value'=>1));?>
        <p>
            <label>Имя </label>
            <?= $form->textField($model,'fullName'); ?>

        </p>
        <?= $form->error($model,'fullName');?>
        <p>
            <label>Номер телефона:</label>
            <span>Вам позвонят из службы доставки<br>для подтверждения заказа.
            </span>
            <?= $form->textField($model,'phone'); ?>
        </p>
        <?= $form->error($model,'phone'); ?>
        <p>
            <label>Email:</label>
            <span>Для информирования о статусе заказа<br>и получения кодов на скидку.</span>
            <?= $form->textField($model,'email'); ?>
        </p>
        <?= $form->error($model,'email'); ?>

        <p>
            <label>Город, область:</label>
            <?= $form->textField($model,'cityRegion'); ?>
        </p>
        <?= $form->error($model,'cityRegion'); ?>
        <p>
            <label>Индекс:</label>
            <?= $form->textField($model,'index'); ?>
        </p>
        <?= $form->error($model,'index'); ?>
        <p>
            <label>Адрес:</label>
            <span>Например: ул. Российская 1, кв. 1</span>
            <?= $form->textField($model,'address'); ?>
        </p>
        <?= $form->error($model,'address'); ?>
        <p class="area">
            <label>Комментарии к заказу:</label>
            <?= $form->textArea($model,'comment'); ?>
        </p>

        <button>Оформить заказ</button>
<? $this->endWidget();?>

<? $form=$this->beginWidget('CActiveForm', array(
    'id'=>'order-form2',
    'enableAjaxValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true,
        'validateOnType'=>false,
    ),
    'htmlOptions'=>array('class'=>'tab'),
)); ?>
    <h4 class='basket-total'>К оплате:  <b><span></span></b></h4>
    <h4>Заполните данные для доставки:</b></h4>

<?= $form->hiddenField($model,'typeDelivery',array('value'=>2));?>
    <p><label>Имя</label>
        <span>Вам позвонят из службы доставки для подтверждения заказа</span>
        <?= $form->textField($model,'fullName'); ?>

    </p>
    <?= $form->error($model,'fullName'); ?>
    <p>
        <label>Номер телефона:</label><?= $form->textField($model,'phone'); ?>

    </p>
    <?= $form->error($model,'phone'); ?>
    <p><label>Email:</label>
        <span>Для информирования о статусе заказа и получения кодов на скидку</span>
        <?= $form->textField($model,'email'); ?>

    </p>
    <?= $form->error($model,'email'); ?>
    <p><label>Адрес:</label><?= $form->textField($model,'address'); ?>
    </p>
    <?= $form->error($model,'address'); ?>
    <p class="area"><label>Комментарии к заказу:</label><?= $form->textArea($model,'comment'); ?></p>
    <button>Оформить заказ</button>

<? $this->endWidget();?>
