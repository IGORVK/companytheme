<?php
/**
 * company functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package company
 */

if ( ! function_exists( 'company_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function company_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on company, use a find and replace
	 * to change 'company' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'company', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
    add_image_size('large-thumbnail', 300, 200, true);

	// This theme uses wp_nav_menu() in one location.
/*	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'company' ),
	) );


	//Default registration of Header menu
    add_action('after_setup_theme', function(){
       
    });*/

 register_nav_menu( 'menu', 'Header menu' );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'company_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'company_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function company_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'company_content_width', 640 );
}
add_action( 'after_setup_theme', 'company_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function company_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'company' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'company' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'company_widgets_init' );







//*************************************************************

//*************************Widget - Links Category Service

//*************************************************************

//Custom Sidebars
function true_register_wp_sidebars()
{
    register_sidebar(
        array(
            'id' => 'true_side',
            'name' => 'Links for the Page Services',
            'description' => '',
            'before_widget' => '<div id="%1$s" class="side widget %2$s">', // default <li>-list
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
}
add_action( 'widgets_init', 'true_register_wp_sidebars' );
//End Custom Sidebar



/**
 * Add default widgets
 */
add_action('after_switch_theme', 'company_register_default_links_widgets');

function company_register_default_links_widgets() {

    $company_sidebars = array ( 'true_side' => 'true_side' );

    $active_widgets = get_option( 'sidebars_widgets' );

    /**
     * Default Our testimonials widgets
     */
    if ( empty ( $active_widgets[ $company_sidebars['true_side'] ] ) ):

        $company_counter = 1;

        /* our testimonials widget #1 */
        $active_widgets[ 'true_side' ][0] = 'true_top_widget-' . $company_counter;
        $true_top_posts_content[ $company_counter ] = array ( 'posts_per_page' => '5' );
        update_option( 'widget_true_top_widget', $true_top_posts_content );
        $company_counter++;



        update_option( 'sidebars_widgets', $active_widgets );

    endif;

} ?>
<?php

class trueTopPostsWidget extends WP_Widget {

    /*
     * Create widget
     */
    function __construct() {
        parent::__construct(
            'true_top_widget',
            'Links of The Category Services', // title of widget
            array( 'description' => 'Display links to the posts of the category services' ) // description
        );
    }

    /*
     * Frontend of widget
     */
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] ); // optinal
        $posts_per_page = $instance['posts_per_page'];

        echo $args['before_widget'];

        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

        		$c = new WP_Query(  array(
            'category_name'       => 'Services',
            'posts_per_page'      => $posts_per_page,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true
        ) );?>



        <div class="services-top-links-wrapper ">
            <ol class="services-menu ">
                <?php $count=0; if ( $c->have_posts() ) : while ($c->have_posts() ) :  $c->the_post();?>

                    <li  class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                    <?php $count++; endwhile; ?>
                    <!--post navigation-->
                <?php else: ?>
                    <!--no posts found-->
                <?php  endif; ?>
            </ol>

            <select class="select-service " onchange="location.href=this.value">
                <option value="">Choose Our Service</option>
        <?php $count=0; if ( $c->have_posts() ) : while ($c->have_posts() ) :  $c->the_post();?>
                <option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
            <?php $count++; endwhile; ?>
            <!--post navigation-->
        <?php else: ?>
            <!--no posts found-->
        <?php  endif; ?>
            </select>


        </div>
   <?php      wp_reset_postdata();

        echo $args['after_widget'];
    }

    /*
     * Backend of widget
     */
    public function form( $instance ) {
/*        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }*/
        if ( isset( $instance[ 'posts_per_page' ] ) ) {
            $posts_per_page = $instance[ 'posts_per_page' ];
        }
        ?>
       <!-- <p>
            <label for="<?php /*echo $this->get_field_id( 'title' ); */?>">Title</label>
            <input class="widefat" id="<?php /*echo $this->get_field_id( 'title' ); */?>" name="<?php /*echo $this->get_field_name( 'title' ); */?>" type="text" value="<?php /*echo esc_attr( $title ); */?>" />
        </p>-->
        <p>
            <label for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>">Number of posts:</label>
            <input id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="text" value="<?php echo ($posts_per_page) ? esc_attr( $posts_per_page ) : '5'; ?>" size="3" />
        </p>
        <?php
    }

    /*
     * Save options
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        //$instance = array();
       // $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['posts_per_page'] = ( is_numeric( $new_instance['posts_per_page'] ) ) ? $new_instance['posts_per_page'] : '5'; // defaul number of the post links
        return $instance;
    }
}

/*
 * Register widget
 */
function trueTopPostsWidget() {
    register_widget( 'trueTopPostsWidget' );
}
add_action( 'widgets_init', 'trueTopPostsWidget' );




//*************************************************************

//*********************End Custom Widget Links Category Service

//*************************************************************




/**
 * Enqueue scripts and styles.
 */
function company_scripts() {


    wp_enqueue_style( 'company-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'company-jasny-bootstrap-css', get_template_directory_uri() . '/css/jasny-bootstrap.min.css' );


    wp_enqueue_style( 'company-owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.css' );
    wp_enqueue_style( 'company-owl-theme-css', get_template_directory_uri() . '/css/owl.theme.css' );
    wp_enqueue_style('company-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');

	wp_enqueue_style( 'company-style-css', get_stylesheet_uri() );


	wp_enqueue_script( 'company-navigation-js', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'company-skip-link-focus-fix-js', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/1.12.4-jquery.min.js');
    wp_enqueue_script( 'jquery' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    if(in_category('renovation')) {
        wp_enqueue_script('company-jssorslider-js', get_template_directory_uri() . '/js/jssor.slider-21.1.6.min.js', array('jquery'));
        wp_enqueue_script( 'company-sliders-js', get_template_directory_uri() . '/js/sliders.js');
    }

    wp_enqueue_script( 'company-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script( 'company-jasny-bootstrap-js', get_template_directory_uri() . '/js/jasny-bootstrap.min.js');
    wp_enqueue_script( 'company-owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js');

    wp_enqueue_script( 'company-main-js', get_template_directory_uri() . '/js/main.js',array('jquery'));

}
add_action( 'wp_enqueue_scripts', 'company_scripts' );


/*add shortcode gallery*/

add_shortcode('gallery', 'my_gallery');
add_image_size('gallery-thumbnail', 40, 40, true);
add_image_size('gallery-large', 800, 456, true);
add_image_size('gallery-home', 1200, 675, true);


function my_gallery($atts, $text=''){
 $img_src = explode(',',$atts['ids']);
    $theme = isset($atts['theme']) ? $atts['theme'] : 'default';

    //jssor slider gallery category renovation
    if(in_category('renovation')) {
        $html = '<div id="jssor_1" style="box-shadow: 0 0 13px #515151; position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 556px; overflow: hidden; visibility: hidden; background-color: #24262e;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url(" . <?php bloginfo(template_url); ?>. "/images/loading.gif) no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style=" cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 456px; overflow: hidden;">';

        foreach ($img_src as $img) {
            $html .= '<div data-p="150.00" style="display: none;">';
            /**
             * Add data-u.
             */
            add_filter('wp_get_attachment_image_attributes', function ($attr) {
                $attr['data-u'] = 'image';
                return $attr;
            });
            $html .= wp_get_attachment_image($img, 'gallery-large');
            add_filter('wp_get_attachment_image_attributes', function ($attr) {
                $attr['data-u'] = 'thumb';
                return $attr;
            });

            $html .= wp_get_attachment_image($img, 'gallery-thumbnail');
            $html .= '</div>';
        }

        $html .= ' </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p">
                    <div class="w">
                        <div data-u="thumbnailtemplate" class="t"></div>
                    </div>
                    <div class="c"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora05l" style="top:250px;left:8px;width:40px;height:40px;"></span>
        <span data-u="arrowright" class="jssora05r" style="top:250px;right:8px;width:40px;height:40px;"></span>
    </div>
    <!-- #endregion Jssor Slider End -->';
    }


//Boostrap slider page Home
    if(is_page('home')) {?>
        <!--Carousel-->
       <?php  $html = '<div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
        <div class="indicators-gallery-link">             
        <ol class="carousel-indicators">';

        $numLi =0;
        foreach ($img_src as $img) {
            if($numLi==0){
                $html .= '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
            }else{
                $html .= '<li data-target="#myCarousel" data-slide-to=' .  $numLi . ' class=""></li>';
            }
            $numLi ++;
          }

           $html .= '</ol><a class="project-gallery-link" href="/gallery/" role="button">View Project Gallery</a>
                     </div><div class="carousel-inner" role="listbox">';



        $num =0;
        foreach ($img_src as $img) {
            if($num==0){
                $html .= '<div class="item active">';
            }else{
                $html .= '<div class="item">';
            }?>

                           <?php add_filter('wp_get_attachment_image_attributes', function ($attr) {
                                              $attr['class'] = 'img-responsive';

                                              return $attr;
                                              });
                $html .= wp_get_attachment_image($img, 'gallery-home');
                $html .= '</div>';
            $num ++;
          }

        $html .= ' </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>';?>
<!-- /.carousel -->
   <?php  }
    return $html;
}


/*
 *
 *Add function excerpt for pages*/
function add_excerpt_page(){
    add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'add_excerpt_page');

//визуальный редактор для цитат start
function wph_create_excerpt_box() {
    global $post;
    $id = 'excerpt';
    $excerpt = wph_get_excerpt($post->ID);
    wp_editor($excerpt, $id);
}

function wph_get_excerpt($id) {
    global $wpdb;
    $row = $wpdb->get_row("SELECT post_excerpt FROM $wpdb->posts WHERE id = $id");
    return $row->post_excerpt;
}

function wph_replace_excerpt() {
    foreach (array("post", "page") as $type) {
        remove_meta_box('postexcerpt', $type, 'normal');
        add_meta_box('postexcerpt', __('Excerpt'), 'wph_create_excerpt_box', $type, 'normal');
    }
}
add_action('admin_init', 'wph_replace_excerpt');
//визуальный редактор для цитат end


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';




include('functions/control-panel.php');

include('functions/settings.php');

?>
