<?php 

function wpbootstrap_scripts_with_jquery()
{
	// Register the javascript for bootstrap
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

//add responsive image class for bootstrap
function img_responsive($content){
    return str_replace('<img class="','<img class="img-responsive ',$content);
}
add_filter('the_content','img_responsive');

// adding a sidebar
if ( function_exists('register_sidebar-1') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

// this is to add .svg to the upload options for images
add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes ( $existing_mimes=array() ) {
	// add the file extension to the array
	$existing_mimes['svg'] = 'mime/type';
        // call the modified list of extensions
	return $existing_mimes;
}

// this is to add a featured image for posts
if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
add_image_size( 'post-thumbnail', 275, 200, true ); // default Post Thumbnail dimensions (cropped) chane size if needed

}

//create custom post types: title 
add_action( 'init', 'create_posttype' );
function create_posttype() {
  register_post_type( 'title',
    array(
      'labels' => array(
        'name' => __( 'Titles' ),
        'singular_name' => __( 'Title' )
      ),
      'supports' => array(
      	'title',
		'editor',
		'author',
		'thumbnail',
		'excerpt',
		'trackbacks',
		'custom-fields',
		'comments',
		'revisions',
      ),
      'taxonomies' => array('category'),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'title'),
    )
  );
  
}

// pageination
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}
//pagination fix for category.php file
function my_post_queries( $query ) {
  // do not alter the query on wp-admin pages and only alter it if it's the main query
  if (!is_admin() && $query->is_main_query()){

    // alter the query for the home and category pages 

    if(is_category()){
      $query->set('posts_per_page', 1);
      $query->set('order', 'ASC');
    }

  }
}
add_action( 'pre_get_posts', 'my_post_queries' );



?>