<?php
/*****************************************/
/******          WIDGET Testimonials     *************/
/*****************************************/
add_action('widgets_init', 'company_register_widgets');

function company_register_widgets() {

    register_widget('company_testimonials_widget');

    $company_sidebars = array (  'sidebar-ourtestimonials' => 'sidebar-ourtestimonials' );

    /* Register sidebars */
    foreach ( $company_sidebars as $company_sidebar ):

        if( $company_sidebar == 'sidebar-ourtestimonials' ):

            $company_name = __('Our testimonials section widgets', 'company');

        else:

            $company_name = $company_sidebar;

        endif;

        register_sidebar(
            array (
                'name'          => $company_name,
                'id'            => $company_sidebar,
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>'
            )
        );

    endforeach;

}

/**
 * Add default widgets
 */
add_action('after_switch_theme', 'company_register_default_widgets');

function company_register_default_widgets() {

    $company_sidebars = array ( 'sidebar-ourtestimonials' => 'sidebar-ourtestimonials' );

    $active_widgets = get_option( 'sidebars_widgets' );

    /**
     * Default Our testimonials widgets
     */
    if ( empty ( $active_widgets[ $company_sidebars['sidebar-ourtestimonials'] ] ) ):

        $company_counter = 1;

        /* our testimonials widget #1 */
        $active_widgets[ 'sidebar-ourtestimonials' ][0] = 'company_testimonials-widget-' . $company_counter;
        $ourtestimonials_content[ $company_counter ] = array ( 'name' => 'Helen Mirten', 'position' => 'Happy Customer', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque'  );
        update_option( 'widget_company_testimonials-widget', $ourtestimonials_content );
        $company_counter++;

        /* our testimonials widget #2 */
        $active_widgets[ 'sidebar-ourtestimonials' ][] = 'company_testimonials-widget-' . $company_counter;
        $ourtestimonials_content[ $company_counter ] = array ( 'name' => 'Andrew Bird', 'position' => 'Happy Appartment Owner', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque' );
        update_option( 'widget_company_testimonials-widget', $ourtestimonials_content );
        $company_counter++;

        /* our testimonials widget #3 */
        $active_widgets[ 'sidebar-ourtestimonials' ][] = 'company_testimonials-widget-' . $company_counter;
        $ourtestimonials_content[ $company_counter ] = array ( 'name' => 'Kristen Bell', 'position' => 'Happy Client', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque');
        update_option( 'widget_company_testimonials-widget', $ourtestimonials_content );
        $company_counter++;

        /* our testimonials widget #4 */
        $active_widgets[ 'sidebar-ourtestimonials' ][] = 'company_testimonials-widget-' . $company_counter;
        $ourtestimonials_content[ $company_counter ] = array ( 'name' => 'Harry Wise', 'position' => 'Happy House Owner', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'fb_link' => '#', 'tw_link' => '#', 'gp_link' => '#', 'ln_link' => '#', 'image_uri' => get_template_directory_uri()."/images/testimonials-4.jpg" );
        update_option( 'widget_company_testimonials-widget', $ourtestimonials_content );
        $company_counter++;

        /* our testimonials widget #5 */
        $active_widgets[ 'sidebar-ourtestimonials' ][] = 'company_testimonials-widget-' . $company_counter;
        $ourtestimonials_content[ $company_counter ] = array ( 'name' => 'Barbara Fisher', 'position' => 'Happy Housewife', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'fb_link' => '#', 'tw_link' => '#', 'gp_link' => '#', 'ln_link' => '#', 'image_uri' => get_template_directory_uri()."/images/testimonials-4.jpg" );
        update_option( 'widget_company_testimonials-widget', $ourtestimonials_content );
        $company_counter++;

        update_option( 'sidebars_widgets', $active_widgets );

    endif;

} ?>
<?php
/****************************/
/****** Our Testimonials Widget **/
/***************************/


class company_testimonials_widget extends WP_Widget {
    /*
     * Create widget
     */
    public function __construct() {
        parent::__construct('company_testimonials-widget',	__( 'Company - testimonial widget', 'company' ));
    }

    /*
     * Frontend of widget
     */
    function widget( $args, $instance ) {

        extract( $args );

        echo $before_widget;

        ?>

        <div >

            <span class="quote">
                 <?php if ( ! empty( $instance['description'] ) ): ?>
                    <?php echo htmlspecialchars_decode( apply_filters( 'widget_title', $instance['description'] ) ); ?>
                 <?php endif; ?>
            </span>

        <?php if ( ! empty( $instance['name'] ) ): ?>

                <p class="quote-name"><?php echo apply_filters( 'widget_title', $instance['name'] ); ?><br>

                    <?php endif; ?>

                    <?php if ( ! empty( $instance['position'] ) ): ?>

                    <span><?php echo htmlspecialchars_decode( apply_filters( 'widget_title', $instance['position'] ) ); ?></span>

                    <?php endif; ?>

                </p>

        </div>

        <?php

        echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['name']            = strip_tags( $new_instance['name'] );
        $instance['position']        = stripslashes( wp_filter_post_kses( $new_instance['position'] ) );
        $instance['description']     = stripslashes( wp_filter_post_kses( $new_instance['description'] ) );

        return $instance;

    }

    function form( $instance ) {

        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name of Client', 'company' ); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name( 'name' ); ?>"
                   id="<?php echo $this->get_field_id( 'name' ); ?>"
                   value="<?php if ( ! empty( $instance['name'] ) ): echo $instance['name']; endif; ?>"
                   class="widefat"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'position' ); ?>"><?php _e( 'About Client', 'company' ); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name( 'position' ); ?>"
                      id="<?php echo $this->get_field_id( 'position' ); ?>"><?php if ( ! empty( $instance['position'] ) ): echo htmlspecialchars_decode( $instance['position'] ); endif; ?></textarea>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Opinion Of Client', 'company' ); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name( 'description' ); ?>"
                      id="<?php echo $this->get_field_id( 'description' ); ?>"><?php
                if ( ! empty( $instance['description'] ) ): echo htmlspecialchars_decode( $instance['description'] ); endif;
                ?></textarea>
        </p>
        <?php

    }

}?>
<?php
/*****************************************/
/******          WIDGET Services     *************/
/*****************************************/
 add_action('widgets_init', 'csw_register_widgets');

function csw_register_widgets() {


register_widget('csw_service_widget');


$csw_sidebars = array (  'sidebar-ourservice' => 'sidebar-ourservice' );

/* Register sidebars */
foreach ( $csw_sidebars as $csw_sidebar ):

if( $csw_sidebar == 'sidebar-ourservice' ):

$csw_name = __('Our service section widgets', 'csw');

else:

$csw_name = $csw_sidebar;

endif;

register_sidebar(
array (
'name'          => $csw_name,
'id'            => $csw_sidebar,
'before_widget' => '',
'after_widget'  => '',
'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>'
)
);

endforeach;

}



/**
 * Add default widgets
 */
add_action('after_switch_theme', 'company_register_default_ourservice_widgets');

function company_register_default_ourservice_widgets() {

    $company_sidebars = array ( 'sidebar-ourservice' => 'sidebar-ourservice' );

    $active_widgets = get_option( 'sidebars_widgets' );


/**
* Default Our ourservice widgets
*/
  if ( empty ( $active_widgets[ $company_sidebars['sidebar-ourservice'] ] ) ):

$company_counter = 1;

/* our ourservice widget #1 */
        $active_widgets[ 'sidebar-ourservice' ][0] = 'csw_service-widget-' . $company_counter;
$ourservice_content[ $company_counter ] = array ( 'name' => 'Overview',  'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'url_link' => '/overview/', 'image_uri' => get_template_directory_uri()."/images/overview.png" );
update_option( 'widget_csw_service-widget', $ourservice_content );
$company_counter++;

/* our ourservice widget #2 */
        $active_widgets[ 'sidebar-ourservice' ][] = 'csw_service-widget-' . $company_counter;
$ourservice_content[ $company_counter ] = array ( 'name' => 'Bathroom Renovation',  'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'url_link' => '/bathroom-renovation-2/',  'image_uri' => get_template_directory_uri()."/images/bathroom-renovation.png" );
update_option( 'widget_csw_service-widget', $ourservice_content );
$company_counter++;

/* our ourservice widget #3 */
        $active_widgets[ 'sidebar-ourservice' ][] = 'csw_service-widget-' . $company_counter;
$ourservice_content[ $company_counter ] = array ( 'name' => 'Kitchen Renovation',  'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'url_link' => '/kitchen-renovation-2/', 'image_uri' => get_template_directory_uri()."/images/kitchen-renovation.png" );
update_option( 'widget_csw_service-widget', $ourservice_content );
$company_counter++;

/* our ourservice widget #4 */
        $active_widgets[ 'sidebar-ourservice' ][] = 'csw_service-widget-' . $company_counter;
$ourservice_content[ $company_counter ] = array ( 'name' => 'Basement Renovation',  'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'url_link' => '/basement-renovation-2/',  'image_uri' => get_template_directory_uri()."/images/basement-renovation.png" );
update_option( 'widget_csw_service-widget', $ourservice_content );
$company_counter++;

      /* our ourservice widget #5 */
      $active_widgets[ 'sidebar-ourservice' ][] = 'csw_service-widget-' . $company_counter;
$ourservice_content[ $company_counter ] = array ( 'name' => 'Full Renovation',  'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'url_link' => '/full-home-renovation/',  'image_uri' => get_template_directory_uri()."/images/full-renovation.png" );
update_option( 'widget_csw_service-widget', $ourservice_content );
$company_counter++;

      /*        $active_widgets[ 'sidebar-ourtestimonials' ][0] = 'company_testimonials-widget-' . $company_counter;
        $ourtestimonials_content[ $company_counter ] = array ( 'name' => 'Helen Mirten', 'position' => 'Account Manager', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'fb_link' => '#', 'tw_link' => '#', 'gp_link' => '#', 'ln_link' => '#', 'image_uri' => get_template_directory_uri()."/images/testimonials-1.jpg" );
        update_option( 'widget_company_testimonials-widget', $ourtestimonials_content );
        $company_counter++;*/

      update_option( 'sidebars_widgets', $active_widgets );

endif;

}
?>
<?php
/****************************/
/****** service  widget **/
/***************************/

add_action('admin_enqueue_scripts', 'csw_service_widget_scripts');

function csw_service_widget_scripts() {

    wp_enqueue_media();

    wp_enqueue_script('csw_service_widget_script', get_template_directory_uri() . '/js/adpic.js');

}

class csw_service_widget extends WP_Widget {

    public function __construct() {
        parent::__construct('csw_service-widget',	__( 'Company - service  widget', 'csw' ));
    }

    function widget( $args, $instance ) {

        extract( $args );

        echo $before_widget;

        ?>



        <a href="<?php if ( ! empty( $instance['url_link'] ) ): ?>
                 <?php echo apply_filters( 'widget_title', $instance['url_link'] ); ?>
                 <?php endif; ?>"
            <?php
            $csw_service_target = '_self';
            if ( ! empty( $instance['open_new_window'] ) ):
                $csw_service_target = '_blank';
            endif;
            ?> target="<?php echo $csw_service_target; ?>" class="block" title="Read more">

            <div class="service-header">
                <?php if ( ! empty( $instance['image_uri'] ) && ( $instance['image_uri'] != 'Upload Image' ) ) { ?>
                <figure class="profile-pic">
                    <img src="<?php echo esc_url( $instance['image_uri'] ); ?>"alt="<?php _e( 'Uploaded image', 'csw' ); ?>"/>
                </figure>
                <?php
                }
                ?>
                <?php if ( ! empty( $instance['name'] ) ): ?>
                <p class="block-title">
                 <?php echo apply_filters( 'widget_title', $instance['name'] ); ?>
                </p>
                <?php endif; ?>
            </div>

            <?php if ( ! empty( $instance['description'] ) ): ?>
                <div class="block-text">
                    <p><?php echo htmlspecialchars_decode( apply_filters( 'widget_title', $instance['description'] ) ); ?></p>
                </div>
            <?php endif; ?>

        </a>

        <?php

        echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['name']            = strip_tags( $new_instance['name'] );
        $instance['description']     = stripslashes( wp_filter_post_kses( $new_instance['description'] ) );
        $instance['url_link']         = strip_tags( $new_instance['url_link'] );
        $instance['image_uri']       = strip_tags( $new_instance['image_uri'] );
        $instance['open_new_window'] = strip_tags( $new_instance['open_new_window'] );
        $instance['custom_media_id'] = strip_tags( $new_instance['custom_media_id'] );

        return $instance;

    }

    function form( $instance ) {

        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name of Service', 'csw' ); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name( 'name' ); ?>"
                   id="<?php echo $this->get_field_id( 'name' ); ?>"
                   value="<?php if ( ! empty( $instance['name'] ) ): echo $instance['name']; endif; ?>"
                   class="widefat"/>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description Of Service', 'csw' ); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name( 'description' ); ?>"
                      id="<?php echo $this->get_field_id( 'description' ); ?>"><?php
                if ( ! empty( $instance['description'] ) ): echo htmlspecialchars_decode( $instance['description'] ); endif;
                ?></textarea>
        </p>
       <p>
            <label
                for="<?php echo $this->get_field_id( 'url_link' ); ?>"><?php _e( 'Link http://example.com/page/', 'csw' ); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name( 'url_link' ); ?>"
                   id="<?php echo $this->get_field_id( 'url_link' ); ?>"
                   value="<?php if ( ! empty( $instance['url_link'] ) ): echo $instance['url_link']; endif; ?>"
                   class="widefat">

        </p>

        <p>
            <input type="checkbox" name="<?php echo $this->get_field_name( 'open_new_window' ); ?>"
                   id="<?php echo $this->get_field_id( 'open_new_window' ); ?>" <?php if ( ! empty( $instance['open_new_window'] ) ): checked( (bool) $instance['open_new_window'], true ); endif; ?> ><?php _e( 'Open links in new window?', 'csw' ); ?>
            <br>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image_uri' ); ?>"><?php _e( 'Image', 'csw' ); ?></label><br/>

            <?php

            if ( ! empty( $instance['image_uri'] ) ) :

                echo '<img class="custom_media_image_service" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="' . __( 'Uploaded image', 'csw' ) . '" /><br />';

            endif;

            if ( empty( $instance['image_uri'] ) ) :

                echo '<img class="custom_media_image_service" src=" " style="margin:0;padding:0;max-width:100px;float:left;display:none" alt="' . __( 'Uploaded image', 'csw' ) . '" /><br />';

            endif;

            ?>

            <input type="text" class="widefat custom_media_url_service"
                   name="<?php echo $this->get_field_name( 'image_uri' ); ?>"
                   id="<?php echo $this->get_field_id( 'image_uri' ); ?>"
                   value="<?php if ( ! empty( $instance['image_uri'] ) ): echo $instance['image_uri']; endif;  ?>"
                   style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button_service" id="custom_media_button_service"
                   name="<?php echo $this->get_field_name( 'image_uri' ); ?>"
                   value="<?php _e( 'Upload Image', 'csw' ); ?>" style="margin-top:5px;">
        </p>

        <input class="custom_media_id" id="<?php echo $this->get_field_id( 'custom_media_id' ); ?>"
               name="<?php echo $this->get_field_name( 'custom_media_id' ); ?>" type="hidden"
               value="<?php if ( ! empty( $instance["custom_media_id"] ) ): echo $instance["custom_media_id"]; endif; ?>"/>

        <?php

    }

}?>
