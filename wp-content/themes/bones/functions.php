<?php

$args = array(
	'name'          => "Sidebar",
	'id'            => "sidebar",
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => "</li>\n",
	'before_title'  => '',
	'after_title'   => "\n",
);
  register_sidebar($args);
function get_resources(){
    wp_enqueue_style('screen', get_stylesheet());
}
set_post_thumbnail_size( 150, 150 );
add_action('wp_enqueue_scripts', 'get_resources');


//Navi
register_nav_menus(['primary'=>__('Top Menu')]);


?>