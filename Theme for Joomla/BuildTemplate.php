<?php

class BuildTemplate
{

    private $params, $menu, $root_url;

    private $slides_count = 10;
    private $slide_prefix = 'slide';
    private $blocks_count = 9;
    private $block_prefix = 'block';

    public function __construct($params, $menu, $root_url)
    {
        $this->params = $params;
        $this->menu = $menu;
        $this->root_url = $root_url;
    }

    private function get($what)
    {
        $get_option = trim($this->params->get($what));
        return $get_option;

    }

    private function is_home_page()
    {
        if ($this->menu->getActive() == $this->menu->getDefault()) {
            return true;
        } else {
            return false;
        }
    }

    private function url($id)
    {
        if ($this->menu->getItem($id)->home == 1) {
            echo $this->root_url;
            return;
        } else {
            echo $this->root_url . $this->menu->getItem($id)->route;
            return;
        }
    }

    public function logo()
    {
        ?>
        <a href="<?php echo $this->root_url ?>" title="<?php echo $this->get('site-description') ?>">
            <img src="<?php echo $this->root_url . $this->get('site-logo') ?>"
                 alt="<?php echo $this->get('site-description') ?>"/>
        </a>
    <?php
    }

    public function description()
    {
        ?>
        <a href="<?php echo $this->root_url ?>" title="<?php echo $this->get('site-description') ?>">
            <span><?php
                echo $this->get('site-description');
                ?></span>
        </a>
    <?php
    }

    public function contacts()
    {
        ?>
        <a href="tel:<?php echo $this->get('site-phone') ?>"><?php echo $this->get('site-phone'); ?></a>
        <a href="skype:<?php echo $this->get('site-skype'); ?>?chat"><?php echo $this->get('site-skype'); ?></a>
        <a href="mailto:<?php echo $this->get('site-email'); ?>"><?php echo $this->get('site-email'); ?></a>
    <?php
    }

    public function copyright()
    {
        echo $this->get('site-copyright');
    }

    public function slides()
    {
        ?>
        <ul class="slides">
            <?php

            for ($i = 1; $i <= $this->slides_count; $i++) {

                $slide_image = $this->get($this->slide_prefix . $i . '-img');
                $slide_title = $this->get($this->slide_prefix . $i . '-title');
                $slide_text = $this->get($this->slide_prefix . $i . '-text');
                $slide_page = $this->get($this->slide_prefix . $i . '-page');

                if (!empty($slide_image)) {
                    ?>
                    <li>
                        <a href="<?php $this->url($slide_page) ?>">
                            <img
                                src="<?php echo $this->root_url . $slide_image; ?>"
                                alt="<?php echo $slide_title ?>">

                            <div class="descr">
                                <p class="title"><?php echo $slide_title ?></p>

                                <p class="text"><?php echo $slide_text ?></p>

                                <p class="next"><?php echo $this->get('slide-next') ?></p>
                            </div>
                        </a>
                    </li>
                <?php
                }
            }
            ?>
        </ul>
    <?php
    }

    public function blocks()
    {
        #if (!$this->is_home_page()) {
        #	return;
        #}

        $blocks_page = $this->get('blocks-page');
        $blocks_next = $this->get('blocks-next');

        ?>
        <table>
            <?php
            for ($i = 1; $i <= $this->blocks_count; $i++) {

                $block_title = $this->get($this->block_prefix . $i . '-title');
                $block_page = $this->get($this->block_prefix . $i . '-page');
                $block_flag = $this->get($this->block_prefix . $i . '-flag');
                $block_background = $this->get($this->block_prefix . $i . '-background');

                if ($i === 1 || $i === 4 || $i === 7) {
                    ?>
                    <tr>
                <?php
                }
                ?>
                <td>
                    <a href="<?php $this->url($block_page) ?>.html"
                       style="background-image: url(<?php echo $this->root_url . $block_background; ?>)">
                        <img src="<?php echo $this->root_url . $block_flag; ?>" alt="<?php echo $block_title; ?>"/>
                        <span><?php echo $block_title; ?></span>
                    </a>
                </td>
                <?php
                if ($i === 3 || $i === 6 || $i === 9) {
                    ?>
                    </tr>
                <?php
                }
            }
            ?>
        </table>
<a href="<?php $this->url($blocks_page) ?>" class="more"><?php echo $blocks_next; ?></a>
    <?php
    }
}
