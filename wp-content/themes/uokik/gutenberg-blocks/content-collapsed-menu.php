<?php
/**
 * Block Name: Collapsed menu
 */

$id = 'collapsedMenu-' . $block['id'];

$block_class = 'collapsedMenu';

if( !empty($block['className']) ) {
    $block_class .= ' ' . $block['className'];
} 

// variable acf
$menu_id = get_field('menu_id');
if(!$menu_id)
    return;
?>

<div id="<?php echo $id; ?>" class="<?php echo $block_class; ?>">
    <?php 
        wp_nav_menu(
            array(
                'menu' => $menu_id,
                'menu_class' => 'collapsedMenu__area',
                'depth' => 2
            )
        );
    ?>
</div>
