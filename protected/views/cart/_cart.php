<div class="bask <?= $count?'active':'norm';?>">
<h5>КОРЗИНА</h5>
<? if($count):?>
    <p>В корзине <a href="<?=$this->createUrl('/cart/index')?>"><?=$count.' товар'.Ending::Order($count)?></a>
    на сумму <b><?= $sum;?> р</b></p>
<? else:?>
    <p>У вас в корзине пока  нет выбранных товаров</p>
<? endif;?>
</div>


