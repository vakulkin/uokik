<?php
/**
 * Block Name: Icon navigation
 */

$id = 'iconNavigation-' . $block['id'];

$block_class = 'iconNavigation';

if( !empty($block['className']) ) {
    $block_class .= ' ' . $block['className'];
} 

// variable acf
$navigation = get_field('navigation');
if(!$navigation)
    return;

$settings = get_field('settings');
$grid = $settings['desktop_grid'] ?: 'flex-lg-4';

?>

<div id="<?php echo $id; ?>" class="<?php echo $block_class; ?>">
    <div class="flex flex-wrap">
        <?php 
            foreach ($navigation as $key => $item_nav) {
                $icon = $item_nav['icon'];
                $link = $item_nav['link'];

                if($link && $icon){

                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
            

                    echo    '<div class="flex-12 ' . $grid . '">' .
                                '<a class="iconNavigation__item" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' .
                                    '<span class="iconNavigation__item--icon">' . wp_get_attachment_image($icon, 'full') . '</span>' . 
                                    '<h4 class="iconNavigation__item--title">' . esc_html( $link_title ) . '</h4>' . 
                                '</a>' .
                            '</div>';
                }

                    
            }
        ?>
    </div>
</div>
