<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uokik
 */

$sidebar = get_field('sidebar_area');
get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="flex flex-wrap">
				<div class="flex-12">
					<?php
						if(!is_front_page()){
							?>
								<header class="searchPage__header">

									<?php the_breadcrumb(); ?>

								</header><!-- .page-header -->
							<?php
						}

						while ( have_posts() ) { the_post();
							if($sidebar){
								get_template_part( 'template-parts/content', 'page-sidebar' );
							}else{
								get_template_part( 'template-parts/content', 'page' );
							}

						} // End of the loop.
					?>
				</div>
			</div>
		</div>


	</main><!-- #main -->

<?php
get_footer();
