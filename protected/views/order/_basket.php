<div class="ord">
    <h3>Ваш заказ:</h3>
    <? if(!empty($basket)):?>
        <? foreach($basket as $product):?>
            <p class=" product">
                <span><b><?= $product['Name'];?></b><br><?= $product['CountIn'].' '.$product['Size'];?></span>
                <b class="ord-price"><span><?= round($product['Count']*$product['Price']);?> </span> руб</b>
            </p>
        <? endforeach;?>
    <? endif;?>

    <p class="delivery-block">
            <span><b>Доставка </b><b class='title'></b></span>
            <b class="ord-price"><span>0</span> руб</b>
    </p>

    <? if(isset($order['Discount']['Discount'])&&$order['Discount']['Discount'] > 0):?>
        <p class="discount">
            <span><b>Скидка </b><?= $order['Discount']['Discount'];?></span>
            <b class="ord-price"><span><?= round($order['discountSum']);?></span> руб</b>
        </p>
    <? endif;?>
    <? if(Order::checkDiscountProduct($order)):?>
        <p class="promo">
            <span><b>Промо-товар </b><?= $order['Discount']['NameProduct'];?></span>
            <b class="ord-price"><span><?= round($order['Discount']['PromoPrice']);?></span> руб</b>
        </p>
    <? endif;?>
    <? if(!empty($bonus)):?>
        <p>
            <span><b>Бонусный товар </b><?= isset($bonus['Bonus'])?$bonus['Bonus']:'';?></span>
            <b class="ord-price"><span>0</span> руб</b>
        </p>
    <? endif;?>
</div>