<?php
/**
 * Created by PhpStorm.
 * User: Abhicenation
 * Date: 10/31/2017
 * Time: 5:05 PM
 */



function load_script() {

    wp_enqueue_style('custom-style1', get_theme_file_uri('/css/base.css'));
    wp_enqueue_style('custom-style2', get_theme_file_uri('/css/layout.css'));

    wp_enqueue_script( 'custom-scripts10', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
    wp_enqueue_script( 'custom-scripts11', get_theme_file_uri( '/js/jquery-1.10.2.min.js' ));
    wp_enqueue_script( 'custom-scripts11', get_theme_file_uri( '/js/jquery-migrate-1.2.1.min.js' ));
    wp_enqueue_script( 'custom-scripts2', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
    wp_enqueue_script( 'custom-scripts3', get_theme_file_uri( '/js/scrollspy.js' ));
    wp_enqueue_script( 'custom-scripts4', get_theme_file_uri( '/js/jquery.flexslider.js' ));
    //wp_enqueue_script( 'custom-scripts5', get_theme_file_uri( '/js/jquery.reveal.js' ));
    wp_enqueue_script( 'custom-scripts7','http://maps.google.com/maps/api/js?sensor=true');
    wp_enqueue_script( 'custom-scripts6', get_theme_file_uri( '/js/gmaps.js' ));
    wp_enqueue_script( 'custom-scripts8', get_theme_file_uri( '/js/init.js'));
    wp_enqueue_script( 'custom-scripts9', get_theme_file_uri( '/js/smoothscrolling.js'));
}
add_action('wp_enqueue_scripts','load_script');


// add custom post type for portfolio
function portfolio_init() {

    $portfolio_labels = array(
       'name'               => _x( 'PortFolios ', 'port-folio', 'kreativetheme' ),
       'singular_name'      => _x( 'PortFolio', 'port-folio', 'kreativetheme' ),
       'menu_name'          => _x( 'PortFolios', 'port-folio', 'kreativetheme' ),
       'name_admin_bar'     => _x( 'PortFolios', 'port-folio', 'kreativetheme' ),
       'add_new'            => _x( 'Add New', 'port-folio', 'kreativetheme' ),
       'add_new_item'       => __( 'Add New PortFolio', 'kreativetheme' ),
       'new_item'           => __( 'New PortFolio', 'kreativetheme' ),
       'edit_item'          => __( 'Edit PortFolio', 'kreativetheme' ),
       'view_item'          => __( 'View PortFolio', 'kreativetheme' ),
       'all_items'          => __( 'All PortFolio', 'kreativetheme' ),
       'search_items'       => __( 'Search PortFolio', 'kreativetheme' ),
       'parent_item_colon'  => __( 'Parent PortFolio:', 'kreativetheme' ),
       'not_found'          => __( 'No PortFolio found.', 'kreativetheme' ),
       'not_found_in_trash' => __( 'No PortFolio found in Trash.', 'kreativetheme' ),
    );

    $args = array(
        'labels' => $portfolio_labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'port-folio'),
        'query_var' => true,
        'menu_icon' => 'dashicons-portfolio',
        'taxonomies' => array('post_tag'),
        'supports' => array(
            'title',
            'page-attributes',
            'thumbnail',
            'editor'
            )
        );

    register_post_type( 'port-folio', $args );
}
abstract class Portfolio_Meta_Box
{
   public static function add()
   {
       $screens = ['port-folio'];
       foreach ($screens as $screen) {
           add_meta_box(
               'portfolio_metabox_id',          // Unique ID
               'PortFolio Detail', // Box title
               [self::class, 'html'],   // Content callback, must be of type callable
               $screen                  // Post type
           );
       }
   }

   public static function save($post_id)
   {
       if (array_key_exists('portfolio_url', $_POST)) {
           update_post_meta(
               $post_id,
               'portfolio_url',
               $_POST['portfolio_url']
           );
       }
   }

   public static function html($post)
   {
       $value = get_post_meta($post->ID, 'portfolio_url', true);
    ?>
        <label for="portfolio_url">Enter Portfolio Url :</label><br>
        <input type="text" id="portfolio_url" name="portfolio_url" value="<?php echo $value; ?>"  size="100" required>
<?php
   }
}

add_action( 'init', 'portfolio_init' );
add_action('add_meta_boxes', ['Portfolio_Meta_Box', 'add']);
add_action('save_post', ['Portfolio_Meta_Box', 'save']);


// add custom post type for Services
function services_init(){
    $service_labels = array(
           'name'               => _x( 'Services ', 'services', 'kreativetheme' ),
           'singular_name'      => _x( 'Service', 'services', 'kreativetheme' ),
           'menu_name'          => _x( 'Services', 'services', 'kreativetheme' ),
           'name_admin_bar'     => _x( 'Services', 'services', 'kreativetheme' ),
           'add_new'            => _x( 'Add New', 'services', 'kreativetheme' ),
           'add_new_item'       => __( 'Add New Service', 'kreativetheme' ),
           'new_item'           => __( 'New Service', 'kreativetheme' ),
           'edit_item'          => __( 'Edit Service', 'kreativetheme' ),
           'view_item'          => __( 'View Service', 'kreativetheme' ),
           'all_items'          => __( 'All Services', 'kreativetheme' ),
           'search_items'       => __( 'Search Service', 'kreativetheme' ),
           'parent_item_colon'  => __( 'Parent Service:', 'kreativetheme' ),
           'not_found'          => __( 'No Service found.', 'kreativetheme' ),
           'not_found_in_trash' => __( 'No Service found in Trash.', 'kreativetheme' ),
        );

        $args = array(
            'labels' => $service_labels,
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'services'),
            'query_var' => true,
            'menu_icon' => 'dashicons-lightbulb',
                'supports' => array(
                'title',
                'page-attributes',
                'thumbnail','editor')
        );
        register_post_type('services',$args);
}
add_action('init','services_init');

//add custom post type for Services
abstract class Services_Meta_Box
{
   public static function add(){
       $screens=['services'];
       foreach ($screens as $screen){
           add_meta_box(
               'services_meta_box',
               'Service Icon',
               [self::class,'html'],
               $screen
           );
       }
   }

   public static function save($post_id){
       if(array_key_exists('services_icon',$_POST)){
           update_post_meta($post_id,'services_icon',$_POST['services_icon']);
       }
   }

   public static function html($post){
       $value=get_post_meta($post->ID,'services_icon', true);
       ?>
            <label for="services_icon">Enter class name for services icon</label>
            <input type="text" id="services_icon" name="services_icon" value="<?php echo $value; ?>"  size="50" required>
       <?php
   }
}
add_action('add_meta_boxes',['Services_meta_box','add']);
add_action('save_post',['Services_meta_box','save']);


//add custom post type for Slide intro
function slider_intro(){
    $slider_labels = array(
          'name'               => _x( 'Sliders ', 'port-folio', 'kreativetheme' ),
          'singular_name'      => _x( 'slider', 'port-folio', 'kreativetheme' ),
          'menu_name'          => _x( 'Sliders', 'port-folio', 'kreativetheme' ),
          'name_admin_bar'     => _x( 'Sliders', 'port-folio', 'kreativetheme' ),
          'add_new'            => _x( 'Add New', 'port-folio', 'kreativetheme' ),
          'add_new_item'       => __( 'Add New Slider', 'kreativetheme' ),
          'new_item'           => __( 'New Slider', 'kreativetheme' ),
          'edit_item'          => __( 'Edit Slider', 'kreativetheme' ),
          'view_item'          => __( 'View Slider', 'kreativetheme' ),
          'all_items'          => __( 'All Slider', 'kreativetheme' ),
          'search_items'       => __( 'Search Slider', 'kreativetheme' ),
          'parent_item_colon'  => __( 'Parent Slider:', 'kreativetheme' ),
          'not_found'          => __( 'No Slider found.', 'kreativetheme' ),
          'not_found_in_trash' => __( 'No Slider found in Trash.', 'kreativetheme' ),
       );
    $args = array(
           'labels' => $slider_labels,
           'public' => true,
           'show_ui' => true,
           'capability_type' => 'post',
           'hierarchical' => false,
           'rewrite' => array('slug' => 'port-folio'),
           'query_var' => true,
           'menu_icon' => 'dashicons-format-image',
           'supports' => array(
               'title',
               'page-attributes',
               'thumbnail','editor')
           );
    register_post_type('slider-intro',$args);
}
add_action('init','slider_intro');


// add Testimonial
function Testimonial(){
    $testimonial_labels = array(
          'name'               => _x( 'Testimonials ', 'port-folio', 'kreativetheme' ),
          'singular_name'      => _x( 'Testimonial', 'port-folio', 'kreativetheme' ),
          'menu_name'          => _x( 'Testimonials', 'port-folio', 'kreativetheme' ),
          'name_admin_bar'     => _x( 'Testimonials', 'port-folio', 'kreativetheme' ),
          'add_new'            => _x( 'Add New', 'port-folio', 'kreativetheme' ),
          'add_new_item'       => __( 'Add New Testimonial', 'kreativetheme' ),
          'new_item'           => __( 'New Testimonial', 'kreativetheme' ),
          'edit_item'          => __( 'Edit Testimonial', 'kreativetheme' ),
          'view_item'          => __( 'View Testimonial', 'kreativetheme' ),
          'all_items'          => __( 'All Testimonial', 'kreativetheme' ),
          'search_items'       => __( 'Search Testimonial', 'kreativetheme' ),
          'parent_item_colon'  => __( 'Parent Testimonial:', 'kreativetheme' ),
          'not_found'          => __( 'No Testimonial found.', 'kreativetheme' ),
          'not_found_in_trash' => __( 'No Testimonial found in Trash.', 'kreativetheme' ),
       );
    $args = array(
           'labels' => $testimonial_labels,
           'public' => true,
           'show_ui' => true,
           'capability_type' => 'post',
           'hierarchical' => false,
           'rewrite' => array('slug' => 'port-folio'),
           'query_var' => true,
           'menu_icon' => 'dashicons-format-status',
            'taxonomies' => array('post_tag'),
           'supports' => array(
               'title',
               'page-attributes',
               'thumbnail','editor')
           );
    register_post_type('testimonials',$args);
}
add_action('init','Testimonial');

// add Team
function Teams(){
    $team_labels = array(
          'name'               => _x( 'Teams ', 'port-folio', 'kreativetheme' ),
          'singular_name'      => _x( 'Team', 'port-folio', 'kreativetheme' ),
          'menu_name'          => _x( 'Teams', 'port-folio', 'kreativetheme' ),
          'name_admin_bar'     => _x( 'Teams', 'port-folio', 'kreativetheme' ),
          'add_new'            => _x( 'Add New', 'port-folio', 'kreativetheme' ),
          'add_new_item'       => __( 'Add New Team', 'kreativetheme' ),
          'new_item'           => __( 'New Team', 'kreativetheme' ),
          'edit_item'          => __( 'Edit Team', 'kreativetheme' ),
          'view_item'          => __( 'View Team', 'kreativetheme' ),
          'all_items'          => __( 'All Team', 'kreativetheme' ),
          'search_items'       => __( 'Search Team', 'kreativetheme' ),
          'parent_item_colon'  => __( 'Parent Team:', 'kreativetheme' ),
          'not_found'          => __( 'No Team found.', 'kreativetheme' ),
          'not_found_in_trash' => __( 'No Team found in Trash.', 'kreativetheme' ),
       );
    $args = array(
           'labels' => $team_labels,
           'public' => true,
           'show_ui' => true,
           'capability_type' => 'post',
           'hierarchical' => false,
           'rewrite' => array('slug' => 'port-folio'),
           'query_var' => true,
           'menu_icon' => 'dashicons-admin-users',
            'taxonomies' => array('post_tag'),
           'supports' => array(
               'title',
               'page-attributes',
               'thumbnail','editor')
           );
    register_post_type('teams',$args);
}
add_action('init','Teams');


// add Our work pro
function WorkProcess(){
    $process_labels = array(
          'name'               => _x( 'Work Process', 'port-folio', 'kreativetheme' ),
          'singular_name'      => _x( 'Work Process', 'port-folio', 'kreativetheme' ),
          'menu_name'          => _x( 'Work Process', 'port-folio', 'kreativetheme' ),
          'name_admin_bar'     => _x( 'Work Process', 'port-folio', 'kreativetheme' ),
          'add_new'            => _x( 'Add New', 'port-folio', 'kreativetheme' ),
          'add_new_item'       => __( 'Add New Work Process', 'kreativetheme' ),
          'new_item'           => __( 'New Work Process', 'kreativetheme' ),
          'edit_item'          => __( 'Edit Work Process', 'kreativetheme' ),
          'view_item'          => __( 'View Work Process', 'kreativetheme' ),
          'all_items'          => __( 'All Work Process', 'kreativetheme' ),
          'search_items'       => __( 'Search Work Process', 'kreativetheme' ),
          'parent_item_colon'  => __( 'Parent Work Process:', 'kreativetheme' ),
          'not_found'          => __( 'No Work Process found.', 'kreativetheme' ),
          'not_found_in_trash' => __( 'No Work Process found in Trash.', 'kreativetheme' ),
       );
    $args = array(
           'labels' => $process_labels,
           'public' => true,
           'show_ui' => true,
           'capability_type' => 'post',
           'hierarchical' => false,
           'rewrite' => array('slug' => 'work-process'),
           'query_var' => true,
           'menu_icon' => 'dashicons-editor-alignleft',
           'supports' => array(
               'title', 'page-attributes', 'editor')
           );
    register_post_type('workprocess',$args);
}
add_action('init','WorkProcess');

//add custom post type for Services
abstract class Homepage_Meta_Box
{

   public static function add(){
       if(isset($_GET['post'])) {
           $post_id = $_GET['post'];
           $front_page_id = get_option('page_on_front');
           if ($post_id == $front_page_id) {
               $screens = ['page'];
               foreach ($screens as $screen) {
                   add_meta_box(
                       'home_meta_box',
                       'All Information',
                       [self::class, 'html'],
                       $screen
                   );
               }
           }
       }

   }

   public static function save($post_id){
       //Service data
       if(array_key_exists('service_label',$_POST)){
           update_post_meta($post_id,'service_label',$_POST['service_label']);
       }
       if(array_key_exists('service_title',$_POST)){
                  update_post_meta($post_id,'service_title',$_POST['service_title']);
       }
       if(array_key_exists('service_desc',$_POST)){
                  update_post_meta($post_id,'service_desc',$_POST['service_desc']);
       }
       // Portfolio Data
       if (array_key_exists('portfolio_label', $_POST)) {
           update_post_meta($post_id, 'portfolio_label', $_POST['portfolio_label']);
       }
       if (array_key_exists('portfolio_title', $_POST)) {
           update_post_meta($post_id, 'portfolio_title', $_POST['portfolio_title']);
       }
       if (array_key_exists('portfolio_desc', $_POST)) {
           update_post_meta($post_id, 'portfolio_desc', $_POST['portfolio_desc']);
       }
       //About Data
       if (array_key_exists('about_label', $_POST)) {
           update_post_meta($post_id, 'about_label', $_POST['about_label']);
       }
       if (array_key_exists('about_title', $_POST)) {
           update_post_meta($post_id, 'about_title', $_POST['about_title']);
       }
       if (array_key_exists('about_desc', $_POST)) {
           update_post_meta($post_id, 'about_desc', $_POST['about_desc']);
       }
   }

   public static function html($post){
            $service_label=get_post_meta($post->ID,'service_label', true);
            $service_title=get_post_meta($post->ID,'service_title', true);
            $service_desc=get_post_meta($post->ID,'service_desc', true);

            $portfolio_label=get_post_meta($post->ID,'portfolio_label', true);
            $portfolio_title=get_post_meta($post->ID,'portfolio_title', true);
            $portfolio_desc=get_post_meta($post->ID,'portfolio_desc', true);

            $about_label = get_post_meta($post->ID, 'about_label', true);
            $about_title = get_post_meta($post->ID, 'about_title', true);
            $about_desc = get_post_meta($post->ID, 'about_desc', true);
   ?>
           <h3>Services</h3>
                <label for="service_label">Service Label</label>
                <input type="text" id="service_label" name="service_label" value="<?php echo $service_label; ?>"  size="50" required>
                <br>
                <label for="service_title">Services Title</label>
                <input type="text" id="service_title" name="service_title" value="<?php echo $service_title; ?>"  size="50" required>
                <br>
                <label for="service_desc">Services Description</label>
                <textarea type="text" id="service_desc" name="service_desc" rows="4" cols="140" required><?php echo $service_desc; ?></textarea>
            <hr>
            <h3>Portfolio</h3>
               <label for="portfolio_label">Portfolio Label</label>
               <input type="text" id="portfolio_label" name="portfolio_label" value="<?php echo $portfolio_label; ?>"  size="50" required>
               <br>
               <label for="portfolio_title">Portfolio Title</label>
               <input type="text" id="portfolio_title" name="portfolio_title" value="<?php echo $portfolio_title; ?>" size="50" required>
               <br>
               <label for="portfolio_desc">Portfolio Description</label>
               <textarea type="text" id="portfolio_desc" name="portfolio_desc" rows="4" cols="140" required><?php echo $portfolio_desc; ?></textarea>
            <hr>
            <h3>About Us</h3>
               <label for="about_label">About Us Label</label>
               <input type="text" id="about_label" name="about_label" value="<?php echo $about_label; ?>" size="50" required>
               <br>
               <label for="about_title">About Us Title</label>
               <input type="text" id="about_title" name="about_title" value="<?php echo $about_title; ?>" size="50" required>
               <br>
               <label for="about_desc">About Us Description</label>
               <textarea type="text" id="about_desc" name="about_desc" rows="4" cols="140" required><?php echo $about_desc; ?></textarea>
       <?php
   }
}
add_action('add_meta_boxes',['Homepage_Meta_Box','add']);
add_action('save_post',['Homepage_Meta_Box','save']);


// here is logic for validation of post title
function force_post_title()
{
  echo "<script type='text/javascript'>\n";
  echo "
  jQuery('#publish').click(function(){
        var testervar = jQuery('[id^=\"titlediv\"]')
        .find('#title');
        if (testervar.val().length < 1)
        {
            jQuery('[id^=\"titlediv\"]').css('background', '#e4131c');            
            return false;
        }
    });
  ";
   echo "</script>\n";
}
add_action('edit_form_advanced', 'force_post_title');
add_action('edit_page_form', 'force_post_title');