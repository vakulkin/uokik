<?php
/**
 * Block Name: Slider
 */

$id = 'blockSlider-' . $block['id'];

$block_class = 'blockSlider';

if( !empty($block['className']) ) {
    $block_class .= ' ' . $block['className'];
} 

// variable acf
$slider = get_field('slider');

?>

<div id="<?php echo $id; ?>" class="<?php echo $block_class; ?>">

	<?php 
		if($slider){
			?>
				<div class="splide blockSlider--slider">
					
					<div class="splide__slider">
						<div class="splide__track">
							<ul class="splide__list">
								<?php 
									foreach ($slider as $key => $value) {

										$bg_img = $value['background_image'] ? 'background-image: linear-gradient(90deg, rgba(0, 65, 131, 0.8), rgba(0, 65, 131, 0)), url(' . wp_get_attachment_image_url($value['background_image'], 'full') . ')' :  '';
										$title = $value['title'];
										$button = $value['button'];

										if($key == 0){
											$h_style = 'h1';
										}else{
											$h_style = 'h2';
										}

										?>
											<li class="splide__slide">
												<div class="blockSlider__item" style="<?php echo $bg_img; ?>">
													<div class="blockSlider__content">
														<?php 
															if($title) echo '<' . $h_style .' class="blockSlider__content--title">' . $title . '</' . $h_style . '>';
															if($button) echo '<div class="blockSlider__content--button">'  . link_acf($button, 'btn btn-primary') . '</div>';
														?>
													</div>
												</div>
											</li>
										<?php
									}
								?>
							</ul>
						</div>

					</div>

					<?php if(count($slider) > 1){ ?>

						<div class="splide__progress">
							<div class="splide__progress__bar"></div>
						</div>
	
						<div class="blockSlider__navigation">
							<button class="splide__toggle" type="button" aria-label="<?php esc_attr_e( 'Toggle slider navigation', 'uokik' ); ?>"></button>
						</div>

					<?php } ?>


				</div>
			<?php
		}
	?>


</div>
