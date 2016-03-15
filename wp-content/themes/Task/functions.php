<?php

$sidebar_front = array(
	'name'          => "Sidebar",
	'id'            => "sidebar",
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => "</li>\n",
	'before_title'  => '',
	'after_title'   => "\n",
);
  register_sidebar($sidebar_front);
$sidebar_post = ['name' => 'Sidebar_post',
                 'id' => 'sidebar_post'];
             register_sidebar($sidebar_post);
$sidebar_map = ['name' => 'Sidebar_map',
    'id' => 'sidebar_map'];
register_sidebar($sidebar_map);
$sidebar_form = ['name' => 'Sidebar_form',
    'id' => 'sidebar_form'];
register_sidebar($sidebar_form);
function theme_style(){ // cos nie dziala
    wp_enqueue_style('screen', get_template_directory_uri, false);
}
add_theme_support( 'post-thumbnails' ); 
//add_action('wp_enqueue_scripts','theme_style');
set_post_thumbnail_size( 150, 150 );
//add_action('wp_enqueue_scripts', 'get_resources');
function wpdocs_custom_excerpt_length( $length ) {
    return 30;
}
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


//Navi
// Register custom navigation walker
    require_once('wp_bootstrap_navwalker.php');

register_nav_menus([
    'primary'=>__('Top Menu'),
    'footer' => __('Bottom Menu')
    ]);


?>