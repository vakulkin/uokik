<?php

function showTitle()
{
  $the_title = get_the_title();
  $title_with_bg = get_field('title_with_bg');

  if ($title_with_bg === 'yes') {
    $title_desc = get_field('title_desc');

    echo <<<HTML
			<div class="titleSectionBg" style="background-image: url(http://uokik/wp-content/uploads/2022/11/image-323.png);">
				<div class="titleSectionBg__inner">
					<h1 class="titleSectionBg__inner-title">$the_title</h1>
					<div class="titleSectionBg__inner-desc">$title_desc</div>
				</div>
			</div>
			HTML;
  } else if (!is_front_page()) { ?>
    <h1 class="titleSection--title pageTitle"><?php echo $the_title; ?></h1>
<?php }
}


function post__shortcode($atts)
{
  $a = shortcode_atts(
    array(
      'id'   => false,
    ),
    $atts
  );

  $id   = $a['id'];
  $post = get_post($id);
  return apply_filters('the_content', $post->post_content);
}

add_shortcode('post', 'post__shortcode');
