<?php
// [nn_recentposts number="num"]
function nn_recentposts_func( $atts ) {
    $a = shortcode_atts( array(
        'num' => '4',
        'category_names' => 'show_all_cats',
        'show_exerpt' => 'false',
        'image_width' => '450',
        'image_height' => '290',
    ), $atts );

    //
    /// JUST A SAMPLE TO SHOW HOW GETTING A PARAMETER
    //  return "number of posts = {$a['num']}";
    
    $return_text = "";
    
    //$featured_cat   =   get_theme_mod( 'recent_posts_cat' );
    
    if(strcmp($a['category_names'],'show_all_cats') != 0){
              $the_query     =   new WP_Query( array(
                'category_name' => $a['category_names'],
                'showposts'     => $a['num'],
                'post__not_in'  => get_option("sticky_posts"),
              ));
    }else{
        $the_query     =   new WP_Query( array(
                'showposts'     => $a['num'],
                'post__not_in'  => get_option("sticky_posts"),
              ));
    }
            
            $return_text  .= '<div id="nn_recent_posts" class="fadeInUp">';
            while ($the_query -> have_posts()) : $the_query -> the_post();

              
              $return_text  .= '<div class="col span_1_of_4">';
              $return_text  .= '<article class="recent">';
              $return_text  .= '<div class="view third-effect">';
                    
                      if ( has_post_thumbnail() ) {
                        $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),[$a['image_width'],$a['image_height']] );
                        $return_text  .= '<a class="nn_recent_img" href="'.get_the_permalink().'">';
                        $return_text  .= '<img alt="post" class="imagerct" src="' . $image_src[0] . '">';
                        $return_text  .= '</a>';
                      }
                    
                  $return_text  .= '</div>';
                  
                  $return_text  .= '<div class="nn_recent_title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></div>';
                  
                   if(!strcmp($a['show_exerpt'],'true')){
                    $return_text  .= '<p>'.nn_get_recentposts_excerpt().'</p>';
                  }
                  
                  $return_text  .= '<div class="thumbs-more-link">';
                  $return_text  .= '</div>';
                  $return_text  .= '</article></div>';
              
            endwhile;
            $return_text  .= '</div>';
            
            return $return_text;
    
}
function nn_get_recentposts_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 250);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	return $excerpt;
}
add_shortcode( 'nn_recentposts', 'nn_recentposts_func' );