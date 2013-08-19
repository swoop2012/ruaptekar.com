<div class="order">
    <h1>Оформление заказа</h1>

    <div class="delivery-payment b-delivery">
        <h4>Выберите способ доставки:</h4>
        <? if(!empty($delivery)):?>
            <? $count = count($delivery);?>
            <? foreach($delivery as $key=>$value):?>
                <p data-id="<?= $value->id;?>" data-type="<?= $value->Type;?>" data-price='<?= Calculate::DiscountDelivery($order['totalSum'],$value->Price,$value->FreeIf);?>' data-name='<?= $value->Name;?>'>
                    <input type="radio"><label><?= $value->Name;?></label><br>
                    <span><?= $value->Instruction;?></span>
                    <br>
                    <b><?= round($value->Price);?> руб</b>
                </p>
            <? endforeach;?>
        <? endif;?>

    </div>

    <div class="delivery-payment b-payment">
        <? if(!empty($delivery)):?>
            <? foreach($delivery as $value):?>
                <? if(!empty($value->payment_api)):?>
                    <div class="payment-select">
                        <h4>Выберите способ оплаты:</h4>
                            <? $count = count($value->payment_api);?>
                            <? foreach($value->payment_api as $key=>$deliverypayment):?>
                                <p data-id="<?= $deliverypayment->id;?>" data-name='<?= $deliverypayment->Name;?>'>
                                    <input type="radio"><label><?= $deliverypayment->Name;?></label><br>
                                    <span><?= $deliverypayment->ShortDescription;?></span>
                                </p>
                            <? endforeach;?>
                    </div>
                <? endif;?>
            <? endforeach;?>
        <? endif;?>
    </div>
    <? $this->renderPartial('_basket',compact('order','basket','bonus'))?>
    <? $this->renderPartial('_form',compact('model'))?>
</div>