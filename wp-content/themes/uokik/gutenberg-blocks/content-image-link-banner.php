<?php
/**
 * Block Name: Image link banner
 */

$id = 'imageLinkBanner-' . $block['id'];

$block_class = 'imageLinkBanner';

if( !empty($block['className']) ) {
    $block_class .= ' ' . $block['className'];
} 

// variable acf
$content = get_field('content');
if(!$content) return;

$settings = get_field('settings');
$style = $settings['color_style'] ?: 'primary';
$columns = $settings['columns'] ?: 'flex-lg-6';

?>


<div id="<?php echo $id; ?>" class="<?php echo $block_class . ' ' . $style; ?>">
    <div class="flex flex-wrap">
        <?php 
            foreach ($content as $key => $value) {
                $img = $value['image'];
                $link = $value['link'];
        
                if($img && $link){
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    
                    echo    '<div class="flex-12 ' . $columns . '">' .
                                '<div class="imageLinkBanner__item">' .
                                    '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . 
                                        '<div class="imageLinkBanner__item--img">' .
                                            wp_get_attachment_image($img, 'full') .
                                        '</div>' .
                                        '<p class="imageLinkBanner__item--title">' .
                                            esc_html( $link_title ) . 
                                        '</p>' .
                                    '</a>' .
                                '</div>' .
                            '</div>';
                }

            }
        ?>
    </div>
</div>
