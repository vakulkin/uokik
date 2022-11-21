<?php
/**
 * Block Name: Title section
 */

$id = 'titleSection-' . $block['id'];

$block_class = 'titleSection';

if( !empty($block['className']) ) {
    $block_class .= ' ' . $block['className'];
} 

// variable acf
$settings = get_field('settings');
$title = $settings['title'];
$style = $settings['style'] ?: 'h2';

if(!$settings && !$title) return
?>

<div id="<?php echo $id; ?>" class="<?php echo $block_class; ?>">
	<?php echo '<' . $style . ' class="titleSection--title">' . $title . '</' . $style . '>'; ?>
</div>
