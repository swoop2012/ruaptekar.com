<div class="banner">
    <img alt="" src="/images/demo/img3.jpg">
    <p>У нас вы найдете только качественные препараты, проверенные и надежные!</p>
</div>

<div class="catalog">
    <? if(!empty($data)):?>
        <? foreach($data as $key=>$value):?>
            <div class="box">
                <a href="<?= $this->createUrl('/product/index',array('id'=>$value->id));?>"><span class="img"><?=CHtml::image(Image::Check($value->PictureMain));?></span>
                    <h4><?= $value->ShortName;?></h4>
                </a>
                <span><?= $value->ShortDescriptionMain;?></span>
                <? if(isset($value->one_subproduct[0])):?>
                <? $price = Calculate::getPrice($value->one_subproduct[0]->Price,$value->UpPrice);?>
                <p><span>от <?= Calculate::Devide($price,$value->one_subproduct[0]->Count);?> руб</span>
                <a class="button" href="<?= $this->createUrl('/product/index',array('id'=>$value->id));?>">Купить</a>
                </p>
                <? endif;?>

            </div>
        <? endforeach;?>
    <? endif;?>
</div>
<div class="about">
    <?= $article?$article->Text:'';?>
</div>
