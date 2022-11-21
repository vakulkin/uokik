<?php
/**
 * Block Name: Text banner button
 */

$id = 'textBannerButton-' . $block['id'];

$block_class = 'textBannerButton';

if( !empty($block['className']) ) {
    $block_class .= ' ' . $block['className'];
} 

// variable acf
$banners_list = get_field('banners');
if(!$banners_list) return;

$settings = get_field('settings');
$column_gird = $settings['columns'] ?: 'flex-lg-6'
?>

<div id="<?php echo $id; ?>" class="<?php echo $block_class; ?>">
	<div class="flex flex-wrap">
		<?php 
			foreach ($banners_list as $key => $value) {
				
				$bg_color = $value['background_color'] ? 'background-color: ' . $value['background_color'] . ';' : '';
				$bg_image = $value['background_image'] ? 'background-image: linear-gradient(180deg, rgba(0, 65, 131, 0.7), rgba(0, 65, 131, 0.5)), url(' . wp_get_attachment_image_url($value['background_image'], 'full') . ');' : '';
				$title = $value['title'];
				$text = $value['content'];
				$button = $value['button'];

				echo 	'<div class="textBannerButton__column flex-12 ' . $column_gird . '">' .
							'<div class="textBannerButton__item' . ($bg_image ? ' textLight' : '') . '" style="' . $bg_color . $bg_image . '">' .
								($title ? '<h4 class="textBannerButton__item--title">' . $title . '</h4>' : '') .
								($text ? '<p class="textBannerButton__item--text">' . $text . '</p>' : '') .
								($button ? '<div class="textBannerButton__item--button text-end">' . link_acf($button, 'btn btn-primary') . '</div>' : '') .
							'</div>' .
						'</div>';
			}

		?>
	</div>
</div>
