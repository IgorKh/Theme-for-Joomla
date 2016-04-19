<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$item_heading = $params->get('item_heading', 'h4');
$images = json_decode($item->images); 
?>

<p class="ndate"><?php echo ' '.JHTML::_('date', $item->created, ('d.m.Y')); ?></p>
<h4><a href="<?php echo $item->link;?>"><?php echo $item->title;?></a></h4>
<?php if ($images->image_intro): echo '<a href="'.$item->link.'"><img src="'.$images->image_intro.'" class="imgleft"/></a>' ; endif;?>


<?php 
$tttext = $item->introtext;
$ttx= preg_match('/((\S+[\s-]+){14})/s', $tttext, $m)? rtrim($m[1]): $tttext;
echo $ttx."..." ?>

<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) :
	echo '<p style="text-align: right"><a href="'.$item->link.'">Читать&nbsp;далее...</a><br /></p>';
endif; ?>
