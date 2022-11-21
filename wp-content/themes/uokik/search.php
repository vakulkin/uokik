<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package uokik
 */

get_header();

?>

	<main id="primary" class="site-main">

		<div class="container">
			<div class="flex flex-wrap">
				<div class="flex-12">
					
					<header class="searchPage__header">

						<?php the_breadcrumb(); ?>

						<div class="flex flex-wrap flex-alings-center">

							<div class="flex-12 flex-lg-6">
								<h1 class="titleSection--title">
									<?php echo __( 'Search Results', 'uokik' ); ?>
								</h1>
								<?php get_search_form(); ?>
								
								<?php search_result_count(); ?>

							</div>

							<div class="flex-12 flex-lg-6">
								<?php echo search_page_image(); ?>
							</div>

							<div class="flex-12">
								<?php echo toggle_search_results(); ?>
							</div>

						</div>

					</header><!-- .page-header -->
					
					<div class="searchPage__body">
						<div class="flex flex-wrap">

							<div class="flex-12 flex-lg-8">

								<div class="searchPage__body__content">
									<?php
									/* Start the Loop */
									if ( have_posts() ) { 
										while ( have_posts() ) { the_post();

											/**
											 * Run the loop for the search to output the results.
											 * If you want to overload this in a child theme then include a file
											 * called content-search.php and that will be used instead.
											 */
											get_template_part( 'template-parts/content', 'search' );

										}

										Pagination_theme::theme_pagination();

									}else{

										get_template_part( 'template-parts/content', 'none' );

									};

									?>	
								</div>
							</div>

							<div class="flex-12 flex-lg-4">
								<?php dynamic_sidebar('sidebar-search'); ?>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
