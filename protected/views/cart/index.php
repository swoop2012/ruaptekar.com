<div class="basket" id='basket-edit' data-link="/cart/change" data-del-link="/cart/delete">
    <h1>Ваша корзина</h1>
    <? if(!empty($data)):?>
        <? foreach ($data as $key=>$value):?>
            <div class="basket-box product" data-id="<?= $key;?>">
                <p class="basket-box-title"><?= $value['Name'];?><br><span><?= $value['CountIn'].' '.$value['Measure']?></span></p>
                <p class="basket-box-number"><a class="plus" href="#"></a><span><?= $value['Count'];?></span> упк <a class="minus" href="#"></a></p>
                <input type="hidden" class='price' value="<?= $value['Price'];?>"/>
                <p class="basket-box-price"><b><span><?= round($value['Price']*$value['Count']);?></span> руб.</b></p>
                <p class="basket-box-del"><a href="#">Убрать из корзины</a></p>

            </div>
        <? endforeach;?>
    <? endif;?>

    <?= CHtml::beginForm(CHtml::normalizeUrl($this->createUrl('/order')));?>
    <div class="basket-tools">
        <p>После первого заказа вы получите код, дающий<br>скидку 5% на все последующие заказы.</p>
        <button>Оформить заказ</button>
    </div>

    <div class="basket-coupon">
        <p>Код на скидку:</p>
        <input type="text" name='promo'>
    </div>
    <?= CHtml::endForm();?>

</div>