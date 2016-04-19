<?php defined('_JEXEC') or die('Restricted access');

require_once 'BuildTemplate.php';

//GO = Get Option
	$page = JFactory::getApplication();
	$GO   = new BuildTemplate(
		$this->params,
		$page->getMenu(),
		JURI::root()
	);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="<?php echo $this->language; ?>"
      lang="<?php echo $this->language; ?>"
      class="no-js">
<head>
    <jdoc:include type="head"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,cyrillic' rel='stylesheet'
          type='text/css'>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/modernizr.js"></script>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css"
          type="text/css"/>


</head>
<body class="page-id-<?= $page->input->get( 'id' ); ?> <?= $page->getMenu()->getActive() === $page->getMenu()->getDefault()?'front':'other' ?>-page">
<a class="nav-btn" id="nav-open-btn" href="#hidden">Меню</a>

<div id="outer-wrap">
    <div id="inner-wrap">
        <div id="hidden-overlay"></div>
        <header id="top">
            <div class="block">
                <div class="logo">
                    <?php
                    $GO->logo();
                    ?>
                </div>
                <div class="contacts">
                    <?php
                    $GO->contacts();
                    ?>
                </div>
                <div class="descr">
                    <?php
                    $GO->description();
                    ?>
                </div>
                <div class="search-form">
                    <jdoc:include type="modules" name="search"/>
                </div>
                <nav id="main-menu">
                    <jdoc:include type="modules" name="menu-main"/>
                </nav>
                <!--                <a class="nav-btn" id="nav-open-btn" href="#hidden">Меню</a>-->
            </div>
        </header>

        <div id="hidden" class="hidden" role="navigation">
            <div class="block">
                <a class="close-btn" id="nav-close-btn" href="#top">Закрыть</a>

                <div class="search-form">
                    <jdoc:include type="modules" name="search"/>
                </div>
                <nav>
                    <jdoc:include type="modules" name="menu-main"/>
                </nav>
                <div class="contacts">
                    <?php
                    $GO->contacts();
                    ?>
                </div>
            </div>
        </div>


        <div id="slideshow">
            <?php
            $GO->slides();
            ?>
        </div>
        <div id="blocks">
            <?php
            $GO->blocks();
            ?>
          <a href="/voprosy-i-otvety.html" class="more" id="voprosy">&laquo; Вопросы и ответы</a>
        </div>
        <div id="content">
            <article>
                <jdoc:include type="component"/>
				<jdoc:include type="modules" name="contact-form" />
				<jdoc:include type="modules" name="news" />
            </article>
        </div>

        <footer>
            <div class="block">
                <div>
                    <div class="logo">
                        <?php
                        $GO->logo();
                        ?>
                    </div>
                    <div class="descr">
                        <?php
                        $GO->description();
                        ?>
                    </div>
                  <div class="copyright">Сайт <a href="http://www.inostrannoe-grazhdanstvo.ru">www.inostrannoe-grazhdanstvo.ru</a> посвящен
бизнес иммиграции и второму гражданству и принадлежит Международному
правовому центру «Эсперанто».
                        <?php //$GO->copyright();?>
                    </div>
                </div>
                <div>
                    <nav>
                        <jdoc:include type="modules" name="menu-main"/>
                    </nav>
                </div>
                <div>
                    <div class="search-form">
                        <jdoc:include type="modules" name="search"/>
                    </div>
                    <div class="contacts">
                        <?php
                        $GO->contacts();
                        ?>
                      <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/dotmap.png" style="float: right; height: 22px; margin: 5px -26px 0px 0px;">
                      <a id="noimg" href="https://maps.yandex.ru/-/CVGhq41O" target="_blanck"><span style="font-size:0.9em">г. Москва, ул. Верхняя Красносельская, д. 2/1, стр. 1, бизнес-центр, офис 302</span></a>
                      
                    </div>
                </div>
            </div>
            <div class="createBy">
              Все права защищены © 1999 – 2015
            </div>
        </footer>
    </div>
</div>
<script
	src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/flexslider/jquery.flexslider-min.js"></script>
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/main.js"></script>
</body>
</html>
