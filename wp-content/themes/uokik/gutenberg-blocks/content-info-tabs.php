<?php

/**
 * Block Name: Info Tabs
 */


$id = 'tabsContent-' . $block['id'];

$block_class = 'tabsContent';

if (!empty($block['className'])) {
  $block_class .= ' ' . $block['className'];
}

$title = get_field('title');
$tabs = get_field('tabs');

if ($title) {
  echo "<h3>$title</h3>";
}


if ($tabs) { ?>
  <div id="<?php echo $id; ?>" class="<?php echo $block_class; ?>">
    <section class="splide splideTabsSlider" aria-label="tabs slider">
      <div class="splide__track">
        <ul class="splide__list changeReusltSearch">
          <?php $active = ' active';
          foreach ($tabs as $tab) { ?>
            <li class="splide__slide changeReusltSearch__item<?php echo $active; ?>" data-tab="<?php echo $tab->post_name; ?>">
              <button type="button" class="changeReusltSearch__link">
                <?php echo $tab->post_title; ?>
              </button>
            </li>
          <?php $active = '';
          } ?>
        </ul>
      </div>
    </section>

    <?php $active = ' active';
    foreach ($tabs as $tab) { ?>
      <div class="tabsContent__tab<?php echo $active; ?>" data-tab="<?php echo $tab->post_name; ?>">
        <button type="button" class="tabsContent__tab_button"><?php echo $tab->post_title; ?></button>
        <div class="tabsContent__tab_text">
          <?php echo do_shortcode("[post id=\"$tab->ID\"]"); ?>
        </div>
      </div>
    <?php $active = '';
    } ?>
  </div>
<?php } ?>