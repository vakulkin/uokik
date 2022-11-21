<?php
/**
 * @package uokik
 */

class Pagination_theme{
            

    public static function theme_pagination($args = array()){

		if ( ! isset( $args['total'] ) && $GLOBALS['wp_query']->max_num_pages <= 1 ) {
			return;
		}

        $args = wp_parse_args(
			$args,
			array(
				'mid_size'           => 3,
				'prev_next'          => true,
				'prev_text'          => 'prev',
				'next_text'          => 'next',
				'type'               => 'array',
				'current'            => max( 1, get_query_var( 'paged' ) ),
				'screen_reader_text' => __( 'Posts navigation', 'uokik' ),
			)
		);

        $links = paginate_links( $args );

        if ( ! $links )
            return;

        ?>
    
        <nav class="paginationArchive flex flex-alings-center" aria-labelledby="posts-nav-label">

            <h2 id="posts-nav-label" class="screen-reader-text">
                <?php echo esc_html( $args['screen_reader_text'] ); ?>
            </h2>


            <div class="paginationArchive--arrow flex-lg-3 previousArrow">
                <?php 
                    if(strpos( $links[0], 'prev' ))
                        echo str_replace( 'prev', __('Previous', 'uokik'), $links[0] ); 
                ?>
            </div>


            <ul class="paginationArchive__list flex-lg-6 flex">

                <?php
                foreach ( $links as $key => $link ) {
                    if(!strpos( $link, 'prev' ) && !strpos( $link, 'next')){
                        ?>
                            <li class="page-item<?php echo strpos( $link, 'current' ) ? ' active' : ''; ?>">
                                <?php echo str_replace( 'page-numbers', 'page-link', $link ); ?>
                            </li>
                        <?php
                    } 
                }
                ?>

            </ul>

            <div class="paginationArchive--arrow flex-lg-3 nextArrow">
                <?php 
                    if(strpos( end($links), 'next' ))
                        echo str_replace( 'next', __('Next', 'uokik'), end($links) ); 
                ?>
            </div>

        </nav>

        <?php

    }

}

new Pagination_theme;