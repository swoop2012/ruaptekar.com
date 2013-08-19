<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title><?= $this->pageTitle;?></title>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <? Yii::app()->clientScript->registerCoreScript('jquery');?>
    <!--[if IE]><script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script type="text/javascript" src="/js/script.js"></script>
</head>
<body>

<div class="page">
    <div class="container">

        <header id="header">

            <div class="logo"><a title="Аптекаръ Твоя интернет-аптека" href="/"><img alt="" src="/images/logo.png"></a></div>

            <div id="basketContainer">
                <?php $this->drawBasket();?>

            </div>

            <div class="phone">
                <h5><?= GetArray::getRandomPhone('idWebmaster');?></h5>
                <? $wmid = GetArray::getWmid();
                if (!empty($wmid)):?>
                    <span>Добавочный номер <?= $wmid;?><br> — обязателен!</span>
                <? endif;?>
            </div>

        </header>

        <nav id="nav">
            <a href="/">Каталог продукции</a>
            <a href="<?= $this->createUrl('/info/dostavka.html');?>">Доставка и оплата</a>
            <a href="<?= $this->createUrl('/info/voprosi-i-otveti.html');?>">Вопросы-ответы</a>
            <a href="<?= $this->createUrl('/site/contact');?>">Написать нам</a>
        </nav>

        <div class="top">

            <div class="advantage delivery">
                <p><b>Удобная доставка</b><br><br><span>Только у нас удобные  условия доставки</span></p>
            </div>

            <div class="advantage best">
                <p><b>Лучшие препараты</b><br><br><span>Качественная продукция надежные поставщики</span></p>
            </div>

            <div class="advantage bonus">
                <p><b>Скидки и бонусы</b><br><br><span>Приятные бонусы для  постоянных клиентов!</span></p>
            </div>

            <div class="advantage price">
                <p><b>Отличные цены</b><br><br><span>Только у нас наилучшее  сочетание цена/качество!</span></p>
            </div>

        </div>

        <div class="content">

            <div class="middle">
                <?= $content;?>
            </div>

            <div class="left">

                <div class="category">
                    <h3 class="title">Популярные препараты</h3>
                    <ul>
                        <li><a href="<?php echo $this->createUrl('tabletki/kupit_viagru_dzhenerik.html');?>">Дженерик Виагра</a></li>
                        <li><a href="<?php echo $this->createUrl('tabletki/kupit_cialis_dzhenerik.html');?>">Дженерик Сиалис</a></li>
                        <li><a href="<?php echo $this->createUrl('tabletki/dapoxetine.html');?>">Дапоксетин</a></li>
                        <li><a href="<?php echo $this->createUrl('tabletki/super-p-force.html');?>">Super P-Force</a></li>
                        <li><a href="<?php echo $this->createUrl('tabletki/nabor-classic.html');?>">Набор «Классический»</a></li>
                    </ul>
                </div>
<?php /*
                <div class="article">
                    <h3 class="title">СтАТЬИ</h3>
                    <ul>
                        <li><a href="#">Что делать, чтобы девушка вас захотела?</a></li>
                        <li><a href="#">Старинные способы повышения потенции</a></li>
                        <li><a href="#">Виагра лечит болезни легких и печени</a></li>
                    </ul>
                </div>

                <div class="instruction">
                    <h3 class="title">ИНСТРУКЦИИ</h3>
                    <ul>
                        <li><a href="#">Инструкция к Виагре</a></li>
                        <li><a href="#">Инструкция к Сиалису</a></li>
                        <li><a href="#">Инструкция к Дапоксетин</a></li>
                        <li><a href="#">Инструкция к Левитре</a></li>
                    </ul>
                </div>

			*/	?>
            </div>

        </div>

    </div>

    <div class="bottom">

        <footer id="footer">
            <p>
                <span>© «Аптекаръ», 2013.</span><br><br>
                <a href="/">Каталог продукции</a>
                <a href="<?= $this->createUrl('/info/dostavka.html');?>">Доставка и оплата</a>
                <a href="<?= $this->createUrl('/info/voprosi-i-otveti.html');?>">Вопросы-ответы</a>
                <a href="<?= $this->createUrl('/site/contact');?>">Написать нам</a>
            </p>
            <div class="counter"><a href="#"><img alt="" src="/images/demo/img2.jpg"></a></div>
        </footer>

    </div>

</div>

</body>
</html>