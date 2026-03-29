<?php
	require_once('wp_bootstrap_navwalker.php');
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// // Load jQuery
	// if ( !is_admin() ) {
	//    wp_deregister_script('jquery');
	//    wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"), array( 
	// 		'in_footer' => false, 
	// 		'strategy' => 'defer' 
	// 	) // $args (load in footer, use defer attribute)
	//    );
	// }
	
	function my_scripts() {
    wp_enqueue_script('jquery');

	
}
add_action('wp_enqueue_scripts', 'my_scripts');
	// // Clean up the <head>
	// function removeHeadLinks() {
    // 	remove_action('wp_head', 'rsd_link');
    // 	remove_action('wp_head', 'wlwmanifest_link');
    // }
    // add_action('init', 'removeHeadLinks');
    // remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

	//to register primary menu
function register_my_menus()
{
	if (function_exists('register_nav_menus')) {
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'school'),
		));
	}
}
add_action('init', 'register_my_menus');

//declaring contact us footer widget
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Contact Info Footer',
		'id'   => 'contact-footer-wa',
		'description'   => 'It will hold contact widget for footer.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
}






//wp customize settings code
function admec_customize_register($wp_customize)
{
	// Footer Background Color
	$wp_customize->add_setting('footer_bg_color', array(
		'default'   => '#150080ff',
		'transport' => 'refresh',
	));

	$wp_customize->add_section('new_colors', array(
		'title'    => __('Footer Settings', 'school'),
		'priority' => 30,
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_color', array(
		'label'      => __('Select Footer Backgrond', 'school'),
		'section'    => 'new_colors',
		'settings'   => 'footer_bg_color',
	)));

	//footer background color ends here

	// footer 1 title
	$wp_customize->add_setting('footer_1_title', array(
		'default'   => 'Course Categories',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('footer_1_title', array(
		'label'      => __('Footer 1 Title', 'school'),
		'section'    => 'new_colors',
		'settings'   => 'footer_1_title',
		'type'       => 'text',
		'description' => __('Change Footer 1 Title'),
	));

	//footer 1 title end

	//footer 1 category settings
	$wp_customize->add_setting('footer_1_cat', array(
		'capability' => 'edit_theme_options',
		'default'   => '6',
		'transport' => 'refresh',
		'sanitize_callback' => 'themeslug_sanitize_select'
	));

	//get all categories
	$categories = get_categories(array(
		'orderby' => 'name',
		'order'   => 'ASC',
		'hide_empty' => 0,
		'parent' => 0,
		'exclude' => '1, 2, 3'
	));

	//get cateory id also
	$cat_ids = array_map(function ($cat) {
		return $cat->cat_ID;
	}, $categories);

	$cat_names = array_map(function ($cat) {
		return $cat->name;
	}, $categories);

	$wp_customize->add_control('footer_1_cat', array(
		'settings' => 'footer_1_cat',
		'label'   => __('Showing Sub Categories of', 'school'),
		'description' => 'Select Parent Category for Footer 1',
		'section' => 'new_colors',
		'type'    => 'select',
		'choices'    => array_combine($cat_ids, $cat_names)
	));

	
// footer 2 category settings
$wp_customize->add_setting('footer_2_cat', array(
	'capability' => 'edit_theme_options',
	'default'   => '6',
	'transport' => 'refresh',
	'sanitize_callback' => 'themeslug_sanitize_select'
));

$wp_customize->add_control('footer_2_cat', array(
	'settings' => 'footer_2_cat',
	'label'   => __('Products Category', 'school'),
	'description' => 'Select Parent Category for Footer 2',
	'section' => 'new_colors',
	'type'    => 'select',
	'choices' => array_combine($cat_ids, $cat_names)
));


// footer 3 category settings
$wp_customize->add_setting('footer_3_cat', array(
	'capability' => 'edit_theme_options',
	'default'   => '0',
	'transport' => 'refresh',
	'sanitize_callback' => 'themeslug_sanitize_select'
));

$wp_customize->add_control('footer_3_cat', array(
	'settings' => 'footer_3_cat',
	'label'   => __('Browse Category', 'school'),
	'description' => 'Select Parent Category for Footer 3',
	'section' => 'new_colors',
	'type'    => 'select',
	'choices' => array_combine($cat_ids, $cat_names)
));

	
// footer 2 category settings
$wp_customize->add_setting('footer_2_cat', array(
	'capability' => 'edit_theme_options',
	'default'   => '6',
	'transport' => 'refresh',
	'sanitize_callback' => 'themeslug_sanitize_select'
));

$wp_customize->add_control('footer_2_cat', array(
	'settings' => 'footer_2_cat',
	'label'   => __('Products Category', 'school'),
	'description' => 'Select Parent Category for Footer 2',
	'section' => 'new_colors',
	'type'    => 'select',
	'choices' => array_combine($cat_ids, $cat_names)
));


// footer 3 category settings
$wp_customize->add_setting('footer_3_cat', array(
	'capability' => 'edit_theme_options',
	'default'   => '0',
	'transport' => 'refresh',
	'sanitize_callback' => 'themeslug_sanitize_select'
));

$wp_customize->add_control('footer_3_cat', array(
	'settings' => 'footer_3_cat',
	'label'   => __('Browse Category', 'school'),
	'description' => 'Select Parent Category for Footer 3',
	'section' => 'new_colors',
	'type'    => 'select',
	'choices' => array_combine($cat_ids, $cat_names)
));

	function themeslug_sanitize_select($input, $setting)
	{
		// Ensure input is a slug.
		$input = sanitize_key($input);

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control($setting->id)->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return (array_key_exists($input, $choices)) ? $input : $setting->default;
	}
}

add_action('customize_register', 'admec_customize_register');

// wp_customize
function my_dynamic_css()
{
?>
	<style type="text/css">
		#footer {
			background-color: <?php echo get_theme_mod('footer_bg_color'); ?>;
		}
	</style>
<?php
}

add_action('wp_head', 'my_dynamic_css');

//slider customizer settings

function slider_content($wp_customize)
{
	// Slider Section
	$wp_customize->add_section('slider_section', array(
		'title'    => __('Slider Settings', 'school'),
		'priority' => 30,
		'description' => __('Change Slider Here', 'school')
	));

	// Add setting (default ON)
	$wp_customize->add_setting('show_slider', array(
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
	));

	// Add checkbox control
	$wp_customize->add_control('show_slider_control', array(
		'label'    => __('Show Slider', 'mytheme'),
		'section'  => 'slider_section',
		'settings' => 'show_slider',
		'type'     => 'checkbox',
	));

	// Slider 1 Title
	$wp_customize->add_setting('slider_text_setting', array(
		'default'   => 'Start Online Education',
		'capability' => 'edit_theme_options'
	));

	$wp_customize->add_control('slider_text_setting', array(
		'label'      => __('Slider Text', 'school'),
		'type'       => 'text',
		'section'    => 'slider_section',
		'settings'   => 'slider_text_setting',
		'description' => __('Change Slider Text'),
	));

	$wp_customize->add_setting('slider_subtext_setting', array(
		'default'   => 'Free Online education template for elearning and online education institute.
',
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control('slider_subtext_setting', array(
		'label'      => __('Slider Sub Text', 'school'),
		'type'       => 'text',
		'section'    => 'slider_section',
		'settings'   => 'slider_subtext_setting',
		'description' => __('Change Slider Sub Text'),
	));

	// Slider 1 Image
	$wp_customize->add_setting('slider_1_image', array(
		'capability' => 'edit_theme_options',
		'default'   => get_template_directory_uri() . '/images/slides/img1.jpg',
		'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider_1_image', array(
		'label'      => __('Upload Slider 1 Image', 'school'),
		'priority' => 30,
		'section'    => 'slider_section',
		'settings'   => 'slider_1_image',
	)));
	// Slider 2 Image
	$wp_customize->add_setting('slider_2_image', array(
		'capability' => 'edit_theme_options',
		'default'   => get_template_directory_uri() . '/images/slides/img2.jpg',
		'transport' => 'refresh',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider_2_image', array(
		'label'      => __('Upload Slider 2 Image', 'school'),
		'priority' => 30,
		'section'    => 'slider_section',
		'settings'   => 'slider_2_image',
	)));
	// Slider 3 Image
	$wp_customize->add_setting('slider_3_image', array(
		'capability' => 'edit_theme_options',
		'default'   => get_template_directory_uri() . '/images/slides/img3.jpg',
		'transport' => 'refresh',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider_3_image', array(
		'label'      => __('Upload Slider 3 Image', 'school'),
		'priority' => 30,
		'section'    => 'slider_section',
		'settings'   => 'slider_3_image',
	)));
}
add_action('customize_register', 'slider_content');
//slider customizer settings end






