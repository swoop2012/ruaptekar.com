<div class="product">

    <h1><?= $model->ShortName;?></h1>

    <span><?= $model->Name;?></span>

    <div class="text">
        <span>
            <?= CHtml::image(Image::Check($model->PictureProduct1),'',array('width'=>102));?>
            <?= CHtml::image(Image::Check($model->PictureProduct2));?>
            <?= CHtml::image(Image::Check($model->PictureProduct3));?>
        </span>
        <?= $model->ShortDescription;?>
    </div>
    <? if(!empty($model->subproduct)):?>
    <div class="presence">Есть в наличии</div>
    <? endif;?>
    <div class="info">
        <?= $model->MiddleDescription;?>
    </div>

    <div class="bon">
        <? if(!empty($bonuses)):?>
            <p><span>Бонусы</span></p>
                <? foreach($bonuses as $bonus):?>
                    <p><b><?= $bonus->Bonus;?></b><br>
                        при заказе от <?= round($bonus->ConditionSum);?> рублей
                    </p>
                <? endforeach;?>
        <? endif;?>
    </div>

    <div class="buy">
        <h3>Купить <?=$model->ShortName;?></h3>
        <ul>
            <? if(!empty($model->subproduct)):?>
                <? $oldPrice = Calculate::Devide(Calculate::getPrice($model->subproduct[0]->Price,$model->UpPrice), $model->subproduct[0]->Count);?>
                <? foreach($model->subproduct as $value):?>
                    <? $price = Calculate::getPrice($value->Price,$model->UpPrice);?>
                    <? $priceOne = Calculate::Devide($price, $value->Count)?>
                    <li data-id='<?= $value->id;?>'>
                        <span><?= $value->Count;?> <?= $value->Measure;?></span>
                        <b><?=$price;?> руб</b>
                        <b class="<?=($oldPrice-$priceOne)>0?'econom':'';?>"><?=$priceOne;?> руб. / табл.
                            <? if(($oldPrice-$priceOne)>0):?>
                            <br><span>Экономия: <?=round($oldPrice-$priceOne)?> р.</span>
                            <? endif;?>
                        </b>
                        <?= CHtml::link('Положить в корзину',$this->createUrl('addProduct'),array('class'=>'basket-link','onclick'=>'scrollWindow()'));?>
                        <p><?= CHtml::link('Купить',$this->createUrl('/order/index'),array('class'=>'order-link','onclick'=>'scrollWindow()'));?></p>
                    </li>
                <? endforeach;?>
            <? endif;?>
        </ul>
    </div>

    <div class="info">

        <div class="deliv">
            <h4>Доставка</h4>
            <p class="service1">Курьером по Москве и Санкт-Петербургу<br>в течение суток.</p>
            <p class="service2">По всей России — почтой в течение 7-14<br>рабочих дней.</p>
            <a href="<?= $this->createUrl('/info/dostavka.html');?>">Подробнее о доставке</a>
        </div>

        <div class="pay">
            <h4>Оплата</h4>
            <p class="service3">Наличными курьеру, при получении.<br>Наличными на почтовом отделении при получении.</p>
            <p class="service4">Электронными деньгами (КИВИ, Webmoney)</p>
            <a href="<?= $this->createUrl('/info/dostavka.html');?>">Подробнее об оплате</a>
        </div>

    </div>

    <div class="des">
        <?= $model->Article;?>
    </div>

</div>