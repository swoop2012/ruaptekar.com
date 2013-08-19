<div class="order">
    <h1>Заказ №<?=$order['orderNumber'];?></h1>
    <div class="pp-confirm">
	<div class="product">
	<div class="des">
        <p>Ваш заказ принят. Спасибо.</p>
		<p>Мы доставим ваш заказ: <?=$delivery->Name;?></p>
        <? if(!empty($order['newPromo'])):?>
        <h3>Ваш персональный промо-код: <?=$order['newPromo'];?></h3>
		<p>У нас действуют накопительные промо-коды. Уже при следующем заказе указав ваш промо-код вы получите скидку — 5%. После 2-го заказа скидка будет увеличена до — 10%.</p>
        <? endif;?>
        <h3>Как оплатить <b><?=$payment->Name;?></b></h3>
        <?=$payment->Description;?>
        <h3>Ваш заказ</h3>
		<p>Полное ФИО: <?=$order['form']['fullName'];?><br>
            Номер телефона: <?=$order['form']['phone'];?><br>
            E-mail: <?=$order['form']['email'];?><br>
            <? if($order['form']['typeDelivery']==1):?>
            Город, область: <?=$order['form']['cityRegion'];?><br>
            Индекс: <?=$order['form']['index'];?><br>
            <? endif;?>
            Адрес: <?=$order['form']['address'];?><br>
            Комментарий к заказу: <?=$order['form']['comment'];?><br>
        </p>
</div></div>
        <div class="ord">
            <h3>Ваш заказ:</h3>
            <? if(!empty($order['subproducts'])):?>
                <? foreach($order['subproducts'] as $product):?>
                    <p class=" product">
                        <span><b><?= $product['Name'];?></b><br><?= $product['CountIn'].' '.$product['Size'];?></span>
                        <b class="ord-price"><span><?= round($product['Count']*$product['Price']);?> </span> руб</b>
                    </p>
                <? endforeach;?>
            <? endif;?>

            <p class="delivery-block">
                <span><b>Доставка </b><b class='title'><?=$delivery->Name;?></b></span>
                <b class="ord-price"><span><?= Calculate::DiscountDelivery($order['totalSum'],$delivery->Price,$delivery->FreeIf);?></span> руб</b>
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


        <h4 class='basket-total'>Итого:  <b><span><?=($order['totalSum']+Calculate::DiscountDelivery($order['totalSum'],$delivery->Price,$delivery->FreeIf));?></span> руб</b></h4>

    </div>
</div>