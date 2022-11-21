<?php

/**
 * Block Name: Info Box
 */

$id = 'infoBlock-' . $block['id'];

$block_class = 'infoBlock';

if (!empty($block['className'])) {
  $block_class .= ' ' . $block['className'];
}

$background_image = get_field('background_image');
$container_styles = get_field('container_styles');
$title_tag = get_field('title_tag');
$html_block = get_field('html_block');
if ($html_block) {
  $title = $html_block->post_title;
  $desc = $html_block->post_content;
} else {
  $title = get_field('title');
  $desc = get_field('desc');
}

if ($background_image) {
  $background_image = "background-image: url($background_image);";
}

if ($title && $desc) {

  echo <<<HTML
  <div id="$id" class="$block_class" style="$background_image$container_styles">
    <$title_tag class="infoBlock__title">
      $title
    </$title_tag>
    <div class="infoBlock_desc">
      $desc
    </div>
  </div>
  HTML;
}
