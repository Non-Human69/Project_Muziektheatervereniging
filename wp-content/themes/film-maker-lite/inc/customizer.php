<?php
/**
 * Film Maker Lite: Customizer
 *
 * @package Film Maker Lite
 * @subpackage film_maker_lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function film_maker_lite_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Film_Maker_Lite_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Film_Maker_Lite_Control_Sortable' );

	//add home page setting pannel
	$wp_customize->add_panel( 'film_maker_lite_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'film-maker-lite' ),
	    'description' => __( 'Description of what this panel does.', 'film-maker-lite' ),
	) );

	$wp_customize->add_section('film_maker_lite_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'film-maker-lite'),
		'description' => __('Control will not function if the toggle in the main settings is off.', 'film-maker-lite'),
		'priority' => 12,
		'panel' => 'film_maker_lite_panel_id'
		
	) );

	$wp_customize->add_setting( 'film_maker_lite_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_return_to_header_mob',
	) ) );

	$wp_customize->add_setting( 'film_maker_lite_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_slider_buttom_mob',
	) ) );
	$wp_customize->add_setting( 'film_maker_lite_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_related_post_mob',
	) ) );


	//TP Color Option
	$wp_customize->add_section('film_maker_lite_color_option',array(
     'title'         => __('TP Color Option', 'film-maker-lite'),
     'priority' => 2,
     'panel' => 'film_maker_lite_panel_id'
    ) );

	$wp_customize->add_setting( 'film_maker_lite_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'film_maker_lite_tp_color_option', array(
  		'label'     => __('Theme Color', 'film-maker-lite'),
	    'description' => __('It will change the complete theme color in one click.', 'film-maker-lite'),
	    'section' => 'film_maker_lite_color_option',
	    'settings' => 'film_maker_lite_tp_color_option',
  	)));

	//Sidebar Position
	$wp_customize->add_section('film_maker_lite_tp_general_settings',array(
        'title' => __('TP General Option', 'film-maker-lite'),
        'priority' => 1,
        'panel' => 'film_maker_lite_panel_id'
    ) );

 	$wp_customize->add_setting('film_maker_lite_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'film_maker_lite_sanitize_choices'
	));
 	$wp_customize->add_control('film_maker_lite_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'film-maker-lite'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'film-maker-lite'),
		'section' => 'film_maker_lite_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','film-maker-lite'),
		'Container' => __('Container','film-maker-lite'),
		'Container Fluid' => __('Container Fluid','film-maker-lite')
		),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('film_maker_lite_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'film_maker_lite_sanitize_choices'
	));
	$wp_customize->add_control('film_maker_lite_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Sidebar Position', 'film-maker-lite'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'film-maker-lite'),
        'section' => 'film_maker_lite_tp_general_settings',
        'choices' => array(
            'full' => __('Full','film-maker-lite'),
            'left' => __('Left','film-maker-lite'),
            'right' => __('Right','film-maker-lite'),
            'three-column' => __('Three Columns','film-maker-lite'),
            'four-column' => __('Four Columns','film-maker-lite'),
            'grid' => __('Grid Layout','film-maker-lite')
        ),
	) );
	// Add Settings and Controls for Post sidebar Layout
	$wp_customize->add_setting('film_maker_lite_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'film_maker_lite_sanitize_choices'
	));
	$wp_customize->add_control('film_maker_lite_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'film-maker-lite'),
        'description'   => __('This option work for single blog page', 'film-maker-lite'),
        'section' => 'film_maker_lite_tp_general_settings',
        'choices' => array(
            'full' => __('Full','film-maker-lite'),
            'left' => __('Left','film-maker-lite'),
            'right' => __('Right','film-maker-lite'),
        ),
	) );
	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('film_maker_lite_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'film_maker_lite_sanitize_choices'
	));
	$wp_customize->add_control('film_maker_lite_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'film-maker-lite'),
        'description'   => __('This option work for pages.', 'film-maker-lite'),
        'section' => 'film_maker_lite_tp_general_settings',
        'choices' => array(
            'full' => __('Full','film-maker-lite'),
            'left' => __('Left','film-maker-lite'),
            'right' => __('Right','film-maker-lite')
        ),
	) );

	$wp_customize->add_setting( 'film_maker_lite_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_preloader_show_hide',
	) ) );

	$wp_customize->add_setting( 'film_maker_lite_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_sticky', array(
		'label'       => esc_html__( 'Show / Hide Sticky Header', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_sticky',
	) ) );

	//tp typography option
	$film_maker_lite_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('film_maker_lite_typography_option',array(
		'title'         => __('TP Typography Option', 'film-maker-lite'),
		'priority' => 1,
		'panel' => 'film_maker_lite_panel_id'
   	));

   	$wp_customize->add_setting('film_maker_lite_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'film_maker_lite_sanitize_choices',
	));
	$wp_customize->add_control(	'film_maker_lite_heading_font_family', array(
		'section' => 'film_maker_lite_typography_option',
		'label'   => __('heading Fonts', 'film-maker-lite'),
		'type'    => 'select',
		'choices' => $film_maker_lite_font_array,
	));

	$wp_customize->add_setting('film_maker_lite_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'film_maker_lite_sanitize_choices',
	));
	$wp_customize->add_control(	'film_maker_lite_body_font_family', array(
		'section' => 'film_maker_lite_typography_option',
		'label'   => __('Body Fonts', 'film-maker-lite'),
		'type'    => 'select',
		'choices' => $film_maker_lite_font_array,
	));

	//MENU TYPOGRAPHY
	$wp_customize->add_section( 'film_maker_lite_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'film-maker-lite' ),
    	'priority' => 6,
		'panel' => 'film_maker_lite_panel_id'
	) );

	$wp_customize->add_setting('film_maker_lite_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'film_maker_lite_sanitize_choices',
	));
	$wp_customize->add_control(	'film_maker_lite_menu_font_family', array(
		'section' => 'film_maker_lite_menu_typography',
		'label'   => __('Menu Fonts', 'film-maker-lite'),
		'type'    => 'select',
		'choices' => $film_maker_lite_font_array,
	));

	$wp_customize->add_setting('film_maker_lite_menu_font_weight',array(
        'default' => '600',
        'sanitize_callback' => 'film_maker_lite_sanitize_choices'
	));
	$wp_customize->add_control('film_maker_lite_menu_font_weight',array(
     'type' => 'radio',
     'label'     => __('Font Weight', 'film-maker-lite'),
     'section' => 'film_maker_lite_menu_typography',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','film-maker-lite'),
         '200' => __('200','film-maker-lite'),
         '300' => __('300','film-maker-lite'),
         '400' => __('400','film-maker-lite'),
         '500' => __('500','film-maker-lite'),
         '600' => __('600','film-maker-lite'),
         '700' => __('700','film-maker-lite'),
         '800' => __('800','film-maker-lite'),
         '900' => __('900','film-maker-lite')
     ),
	) );
	
	$wp_customize->add_setting('film_maker_lite_menu_text_tranform',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'film_maker_lite_sanitize_choices'
 	));
 	$wp_customize->add_control('film_maker_lite_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','film-maker-lite'),
		'section' => 'film_maker_lite_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','film-maker-lite'),
		   'Lowercase' => __('Lowercase','film-maker-lite'),
		   'Capitalize' => __('Capitalize','film-maker-lite'),
		),
	) );


	$wp_customize->add_setting('film_maker_lite_menu_font_size', array(
	'default' => 12,
    'sanitize_callback' => 'film_maker_lite_sanitize_number_range',
	));

	$wp_customize->add_control(new Film_Maker_Lite_Range_Slider($wp_customize, 'film_maker_lite_menu_font_size', array(
    'section' => 'film_maker_lite_menu_typography',
    'label' => esc_html__('Font Size', 'film-maker-lite'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));


	//TP Blog Option
	$wp_customize->add_section('film_maker_lite_blog_option',array(
        'title' => __('TP Blog Option', 'film-maker-lite'),
        'priority' => 5,
        'panel' => 'film_maker_lite_panel_id'
    ) );
    /** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment', 'category'),
        'sanitize_callback' => 'film_maker_lite_sanitize_sortable',
    ));
    $wp_customize->add_control(new Film_Maker_Lite_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'film-maker-lite'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'film-maker-lite') ,
        'section' => 'film_maker_lite_blog_option',
        'choices' => array(
            'date' => __('date', 'film-maker-lite') ,
            'author' => __('author', 'film-maker-lite') ,
            'comment' => __('comment', 'film-maker-lite') ,
            'category' => __('category', 'film-maker-lite') ,
        ) ,
    )));
    $wp_customize->add_setting( 'film_maker_lite_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'film_maker_lite_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'film_maker_lite_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','film-maker-lite' ),
		'section'     => 'film_maker_lite_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	$wp_customize->add_setting('film_maker_lite_read_more_text',array(
		'default'=> __('Read More','film-maker-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('film_maker_lite_read_more_text',array(
		'label'	=> __('Edit Button Text','film-maker-lite'),
		'section'=> 'film_maker_lite_blog_option',
		'type'=> 'text'
	));
	$wp_customize->add_setting( 'film_maker_lite_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_blog_option',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_remove_read_button',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'film_maker_lite_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'film_maker_lite_customize_partial_film_maker_lite_remove_read_button',
	));
	$wp_customize->add_setting( 'film_maker_lite_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_blog_option',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_remove_tags',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'film_maker_lite_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'film_maker_lite_customize_partial_film_maker_lite_remove_tags',
	 ));
    $wp_customize->add_setting( 'film_maker_lite_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_blog_option',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'film_maker_lite_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'film_maker_lite_customize_partial_film_maker_lite_remove_category',
	));
	$wp_customize->add_setting( 'film_maker_lite_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'film-maker-lite' ),
	 'section'     => 'film_maker_lite_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'film_maker_lite_remove_comment',
	) ) );

	$wp_customize->add_setting( 'film_maker_lite_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'film-maker-lite' ),
	 'section'     => 'film_maker_lite_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'film_maker_lite_remove_related_post',
	) ) );

	$wp_customize->add_setting('film_maker_lite_related_post_heading',array(
		'default'=> __('Related Posts','film-maker-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('film_maker_lite_related_post_heading',array(
		'label'	=> __('Related Post Title','film-maker-lite'),
		'section'=> 'film_maker_lite_blog_option',
		'type'=> 'text'
	));
	
	$wp_customize->add_setting( 'film_maker_lite_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'film_maker_lite_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'film_maker_lite_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','film-maker-lite' ),
		'section'     => 'film_maker_lite_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );

	$wp_customize->add_setting( 'film_maker_lite_related_post_per_columns', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'film_maker_lite_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'film_maker_lite_related_post_per_columns', array(
		'label'       => esc_html__( 'Related Post Per Row','film-maker-lite' ),
		'section'     => 'film_maker_lite_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	) );
	
	$wp_customize->add_setting('film_maker_lite_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'film_maker_lite_sanitize_choices'
	));
	$wp_customize->add_control('film_maker_lite_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'film-maker-lite'),
        'description' => __( 'Control Works only for full,left and right sidebar position in archieve posts', 'film-maker-lite' ),
        'section' => 'film_maker_lite_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','film-maker-lite'),
            'content-image' => __('Content-Media','film-maker-lite'),
        ),
	) );

	//TP Preloader Option
	$wp_customize->add_section('film_maker_lite_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'film-maker-lite'),
		'priority' => 3,
		'panel' => 'film_maker_lite_panel_id'
	) );

	$wp_customize->add_setting( 'film_maker_lite_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_preloader_show_hide',
	) ) );

	$wp_customize->add_setting( 'film_maker_lite_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'film_maker_lite_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'film-maker-lite'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'film-maker-lite'),
	    'section' => 'film_maker_lite_prelaoder_option',
	    'settings' => 'film_maker_lite_tp_preloader_color1_option',
  	)));

  	$wp_customize->add_setting( 'film_maker_lite_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'film_maker_lite_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'film-maker-lite'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'film-maker-lite'),
	    'section' => 'film_maker_lite_prelaoder_option',
	    'settings' => 'film_maker_lite_tp_preloader_color2_option',
  	)));

  	$wp_customize->add_setting( 'film_maker_lite_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'film_maker_lite_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'film-maker-lite'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'film-maker-lite'),
	    'section' => 'film_maker_lite_prelaoder_option',
	    'settings' => 'film_maker_lite_tp_preloader_bg_color_option',
  	)));

	// Top Bar
	$wp_customize->add_section( 'film_maker_lite_topbar', array(
    	'title'      => __( 'Contact Details', 'film-maker-lite' ),
    	'priority' => 6,
    	'description' => __( 'Add your contact details', 'film-maker-lite' ),
		'panel' => 'film_maker_lite_panel_id'
	) );

	$wp_customize->add_setting('film_maker_lite_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'film_maker_lite_sanitize_phone_number'
	));
	$wp_customize->add_control('film_maker_lite_phone_number',array(
		'label'	=> __('Add Phone Number','film-maker-lite'),
		'section'=> 'film_maker_lite_topbar',
		'type'=> 'text'
	));

	 $wp_customize->add_setting('film_maker_lite_phone_icon',array(
		'default'	=> 'fas fa-phone-volume',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Film_Maker_Lite_Icon_Changer(
        $wp_customize,'film_maker_lite_phone_icon',array(
		'label'	=> __('Phone Number Icon','film-maker-lite'),
		'transport' => 'refresh',
		'section'	=> 'film_maker_lite_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('film_maker_lite_book_ticket_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('film_maker_lite_book_ticket_button',array(
		'label'	=> __('Add Book Ticket Button Text','film-maker-lite'),
		'section'=> 'film_maker_lite_topbar',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'film_maker_lite_book_ticket_button', array(
		'selector' => '.register-btn',
		'render_callback' => 'film_maker_lite_customize_partial_film_maker_lite_book_ticket_button',
	) );

	$wp_customize->add_setting('film_maker_lite_book_ticket_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('film_maker_lite_book_ticket_link',array(
		'label'	=> __('Add Book Ticket Page Link','film-maker-lite'),
		'section'=> 'film_maker_lite_topbar',
		'type'=> 'url'
	));

	// Social Media
	$wp_customize->add_section( 'film_maker_lite_social_media', array(
    	'title'      => __( 'Social Media Links', 'film-maker-lite' ),
    	'priority' => 7,
    	'description' => __( 'Add your Social Links', 'film-maker-lite' ),
		'panel' => 'film_maker_lite_panel_id'
	) );

	$wp_customize->add_setting( 'film_maker_lite_header_fb_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_header_fb_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_social_media',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_header_fb_new_tab',
	) ) );

	$wp_customize->add_setting('film_maker_lite_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('film_maker_lite_facebook_url',array(
		'label'	=> __('Facebook Link','film-maker-lite'),
		'section'=> 'film_maker_lite_social_media',
		'type'=> 'url'
	));
	$wp_customize->selective_refresh->add_partial( 'film_maker_lite_facebook_url', array(
		'selector' => '.media-links a',
		'render_callback' => 'film_maker_lite_customize_partial_film_maker_lite_facebook_url',
	) );
	$wp_customize->add_setting('film_maker_lite_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Film_Maker_Lite_Icon_Changer(
        $wp_customize,'film_maker_lite_facebook_icon',array(
		'label'	=> __('Facebook Icon','film-maker-lite'),
		'transport' => 'refresh',
		'section'	=> 'film_maker_lite_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'film_maker_lite_header_twt_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_header_twt_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_social_media',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_header_twt_new_tab',
	) ) );

	$wp_customize->add_setting('film_maker_lite_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('film_maker_lite_twitter_url',array(
		'label'	=> __('Twitter Link','film-maker-lite'),
		'section'=> 'film_maker_lite_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('film_maker_lite_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Film_Maker_Lite_Icon_Changer(
        $wp_customize,'film_maker_lite_twitter_icon',array(
		'label'	=> __('Twitter Icon','film-maker-lite'),
		'transport' => 'refresh',
		'section'	=> 'film_maker_lite_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'film_maker_lite_header_ins_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_header_ins_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_social_media',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_header_ins_new_tab',
	) ) );

	$wp_customize->add_setting('film_maker_lite_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('film_maker_lite_instagram_url',array(
		'label'	=> __('Instagram Link','film-maker-lite'),
		'section'=> 'film_maker_lite_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('film_maker_lite_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Film_Maker_Lite_Icon_Changer(
        $wp_customize,'film_maker_lite_instagram_icon',array(
		'label'	=> __('Instagram Icon','film-maker-lite'),
		'transport' => 'refresh',
		'section'	=> 'film_maker_lite_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'film_maker_lite_header_ut_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_header_ut_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_social_media',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_header_ut_new_tab',
	) ) );

	$wp_customize->add_setting('film_maker_lite_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('film_maker_lite_youtube_url',array(
		'label'	=> __('YouTube Link','film-maker-lite'),
		'section'=> 'film_maker_lite_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('film_maker_lite_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Film_Maker_Lite_Icon_Changer(
        $wp_customize,'film_maker_lite_youtube_icon',array(
		'label'	=> __('Youtube Icon','film-maker-lite'),
		'transport' => 'refresh',
		'section'	=> 'film_maker_lite_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'film_maker_lite_header_pint_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_header_pint_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'film-maker-lite' ),
		'section'     => 'film_maker_lite_social_media',
		'type'        => 'toggle',
		'settings'    => 'film_maker_lite_header_pint_new_tab',
	) ) );

	$wp_customize->add_setting('film_maker_lite_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('film_maker_lite_pint_url',array(
		'label'	=> __('Pinterest Link','film-maker-lite'),
		'section'=> 'film_maker_lite_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('film_maker_lite_pinterest_icon',array(
		'default'	=> 'fab fa-pinterest',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Film_Maker_Lite_Icon_Changer(
        $wp_customize,'film_maker_lite_pinterest_icon',array(
		'label'	=> __('Pinterest Icon','film-maker-lite'),
		'transport' => 'refresh',
		'section'	=> 'film_maker_lite_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('film_maker_lite_social_icon_fontsize',array(
	'default'=> '14',
	'sanitize_callback'	=> 'film_maker_lite_sanitize_number_absint'
));
$wp_customize->add_control('film_maker_lite_social_icon_fontsize',array(
	'label'	=> __('Social Icons Font Size in PX','film-maker-lite'),
	'type'=> 'number',
	'section'=> 'film_maker_lite_social_media',
	'input_attrs' => array(
		'step' => 1,
		'min'  => 0,
		'max'  => 30,
			),
));

	//home page slider
	$wp_customize->add_section( 'film_maker_lite_slider_section' , array(
    	'title'      => __( 'Slider Section', 'film-maker-lite' ),
    	'priority' => 8,
		'panel' => 'film_maker_lite_panel_id'
	) );

	$wp_customize->add_setting( 'film_maker_lite_slider_arrows', array(
	 'default'           => false,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
 ) );
 $wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_slider_arrows', array(
	 'label'       => esc_html__( 'Show / Hide Slider', 'film-maker-lite' ),
	 'section'     => 'film_maker_lite_slider_section',
	 'type'        => 'toggle',
	 'settings'    => 'film_maker_lite_slider_arrows',
 ) ) );
	$wp_customize->selective_refresh->add_partial( 'film_maker_lite_slider_arrows', array(
		'selector' => '.inner_carousel h2',
		'render_callback' => 'film_maker_lite_customize_partial_film_maker_lite_slider_arrows',
	) );

	$wp_customize->add_setting('film_maker_lite_slider_top_content',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('film_maker_lite_slider_top_content',array(
		'label'	=> __('Slider Short Title','film-maker-lite'),
		'section'	=> 'film_maker_lite_slider_section',
		'type'		=> 'text'
	));

	for ( $film_maker_lite_count = 1; $film_maker_lite_count <= 4; $film_maker_lite_count++ ) {

		$wp_customize->add_setting( 'film_maker_lite_slider_page' . $film_maker_lite_count, array(
			'default'           => '',
			'sanitize_callback' => 'film_maker_lite_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'film_maker_lite_slider_page' . $film_maker_lite_count, array(
			'label'    => __( 'Select Slide Image Page', 'film-maker-lite' ),
			'description' => __('Image Size ( 1835 x 700 ) px','film-maker-lite'),
			'section'  => 'film_maker_lite_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'film_maker_lite_slider_button', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
 	) );
 	$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_slider_button', array(
	 'label'       => esc_html__( 'Show / Hide Slider Button', 'film-maker-lite' ),
	 'section'     => 'film_maker_lite_slider_section',
	 'type'        => 'toggle',
	 'settings'    => 'film_maker_lite_slider_button',
 	) ) );

 	$wp_customize->add_setting('film_maker_lite_slider_content_layout',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'film_maker_lite_sanitize_choices'
	));
	$wp_customize->add_control('film_maker_lite_slider_content_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'film-maker-lite'),
        'section' => 'film_maker_lite_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','film-maker-lite'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','film-maker-lite'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','film-maker-lite'),
        ),
	) );



	// Latest Release Section
	$wp_customize->add_section('film_maker_lite_latest_release_section',array(
		'title'	=> __('Latest Release Section','film-maker-lite'),
		'panel' => 'film_maker_lite_panel_id',
		'priority' => 9,
	));

	$wp_customize->add_setting( 'film_maker_lite_latest_release_enable', array(
	 'default'           => false,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
 ) );
 $wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_latest_release_enable', array(
	 'label'       => esc_html__( 'Show / Hide Latest Release', 'film-maker-lite' ),
	 'section'     => 'film_maker_lite_latest_release_section',
	 'type'        => 'toggle',
	 'settings'    => 'film_maker_lite_latest_release_enable',
 ) ) );

	$wp_customize->add_setting('film_maker_lite_latest_release_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('film_maker_lite_latest_release_heading',array(
		'label'	=> __('Section Title','film-maker-lite'),
		'section'	=> 'film_maker_lite_latest_release_section',
		'type'		=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'film_maker_lite_latest_release_heading', array(
		'selector' => '#latest-release h2',
		'render_callback' => 'film_maker_lite_customize_partial_film_maker_lite_latest_release_heading',
	) );

	$wp_customize->add_setting('film_maker_lite_latest_release_sub_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('film_maker_lite_latest_release_sub_heading',array(
		'label'	=> __('Section Sub Title','film-maker-lite'),
		'section'	=> 'film_maker_lite_latest_release_section',
		'type'		=> 'text'
	));

	$film_maker_lite_categories = get_categories();
	$cats = array();
	$i = 0;
	$film_maker_lite_offer_cat[]= 'select';
	foreach($film_maker_lite_categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$film_maker_lite_offer_cat[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('film_maker_lite_latest_release_section_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'film_maker_lite_sanitize_choices',
	));
	$wp_customize->add_control('film_maker_lite_latest_release_section_category',array(
		'type'    => 'select',
		'choices' => $film_maker_lite_offer_cat,
		'label' => __('Select Category','film-maker-lite'),
		'section' => 'film_maker_lite_latest_release_section',
	));

	//footer
	$wp_customize->add_section('film_maker_lite_footer_section',array(
		'title'	=> __('Footer Text','film-maker-lite'),
		'description'	=> __('Add copyright text.','film-maker-lite'),
		'panel' => 'film_maker_lite_panel_id',
		'priority' => 11,
	));

	$wp_customize->add_setting('film_maker_lite_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('film_maker_lite_footer_text',array(
		'label'	=> __('Copyright Text','film-maker-lite'),
		'section'	=> 'film_maker_lite_footer_section',
		'type'		=> 'text'
	));

	// footer columns
	$wp_customize->add_setting('film_maker_lite_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'film_maker_lite_sanitize_number_absint'
	));
	$wp_customize->add_control('film_maker_lite_footer_columns',array(
		'label'	=> __('Footer Widget Columns','film-maker-lite'),
		'section'	=> 'film_maker_lite_footer_section',
		'setting'	=> 'film_maker_lite_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));

	$wp_customize->add_setting( 'film_maker_lite_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'film_maker_lite_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'film-maker-lite'),
			'description' => __('It will change the complete footer widget backgorund color.', 'film-maker-lite'),
			'section' => 'film_maker_lite_footer_section',
			'settings' => 'film_maker_lite_tp_footer_bg_color_option',
	)));
	
	$wp_customize->add_setting('film_maker_lite_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'film_maker_lite_footer_widget_image',array(
    'label' => __('Footer Widget Background Image','film-maker-lite'),
    'section' => 'film_maker_lite_footer_section'
	)));

	$wp_customize->selective_refresh->add_partial( 'film_maker_lite_footer_text', array(
		'selector' => '.site-info a',
		'render_callback' => 'film_maker_lite_customize_partial_film_maker_lite_footer_text',
	) );

	$wp_customize->add_setting( 'film_maker_lite_return_to_header', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
 ) );
 $wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_return_to_header', array(
	 'label'       => esc_html__( 'Show / Hide Return to header', 'film-maker-lite' ),
	 'section'     => 'film_maker_lite_footer_section',
	 'type'        => 'toggle',
	 'settings'    => 'film_maker_lite_return_to_header',
 ) ) );

 $wp_customize->add_setting('film_maker_lite_scroll_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Film_Maker_Lite_Icon_Changer(
        $wp_customize,'film_maker_lite_scroll_top_icon',array(
		'label'	=> __('Scroll to top Icon','film-maker-lite'),
		'transport' => 'refresh',
		'section'	=> 'film_maker_lite_footer_section',
		'type'		=> 'icon'
	)));

   // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('film_maker_lite_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'film_maker_lite_sanitize_choices'
	));
	$wp_customize->add_control('film_maker_lite_scroll_top_position',array(
     'type' => 'radio',
     'label'     => __('Scroll to top Position', 'film-maker-lite'),
     'description'   => __('This option work for scroll to top', 'film-maker-lite'),
     'section' => 'film_maker_lite_footer_section',
     'choices' => array(
         'Right' => __('Right','film-maker-lite'),
         'Left' => __('Left','film-maker-lite'),
         'Center' => __('Center','film-maker-lite')
     ),
	) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'film_maker_lite_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'film_maker_lite_customize_partial_blogdescription',
	) );

		$wp_customize->add_setting( 'film_maker_lite_site_title_text', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_site_title_text', array(
		 'label'       => esc_html__( 'Show / Hide Site Title', 'film-maker-lite' ),
		 'section'     => 'title_tagline',
		 'type'        => 'toggle',
		 'settings'    => 'film_maker_lite_site_title_text',
	 ) ) );

	 

		$wp_customize->add_setting('film_maker_lite_site_title_font_size',array(
			'default'	=> 25,
			'sanitize_callback'	=> 'film_maker_lite_sanitize_number_absint'
		));
		$wp_customize->add_control('film_maker_lite_site_title_font_size',array(
			'label'	=> __('Site Title Font Size in PX','film-maker-lite'),
			'section'	=> 'title_tagline',
			'setting'	=> 'film_maker_lite_site_title_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 80,
			),
		));

		$wp_customize->add_setting( 'film_maker_lite_tagline_text', array(
		 'default'           => false,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_tagline_text', array(
		 'label'       => esc_html__( 'Show / Hide Site Tagline', 'film-maker-lite' ),
		 'section'     => 'title_tagline',
		 'type'        => 'toggle',
		 'settings'    => 'film_maker_lite_tagline_text',
	 ) ) );

		// logo site tagline size
		$wp_customize->add_setting('film_maker_lite_site_tagline_font_size',array(
			'default'	=> 15,
			'sanitize_callback'	=> 'film_maker_lite_sanitize_number_absint'
		));
		$wp_customize->add_control('film_maker_lite_site_tagline_font_size',array(
			'label'	=> __('Site Tagline Font Size in PX','film-maker-lite'),
			'section'	=> 'title_tagline',
			'setting'	=> 'film_maker_lite_site_tagline_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 50,
			),
		));

   $wp_customize->add_setting('film_maker_lite_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'film_maker_lite_sanitize_number_absint'
	));
	$wp_customize->add_control('film_maker_lite_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','film-maker-lite'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('film_maker_lite_logo_settings',array(
     'default' => 'Different Line',
     'sanitize_callback' => 'film_maker_lite_sanitize_choices'
	));
   $wp_customize->add_control('film_maker_lite_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'film-maker-lite'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'film-maker-lite'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','film-maker-lite'),
            'Same Line' => __('Same Line','film-maker-lite')
        ),
	) );

	$wp_customize->add_setting('film_maker_lite_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'film_maker_lite_sanitize_number_absint'
	));
	$wp_customize->add_control('film_maker_lite_per_columns',array(
		'label'	=> __('Product Per Row','film-maker-lite'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('film_maker_lite_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'film_maker_lite_sanitize_number_absint'
	));
	$wp_customize->add_control('film_maker_lite_product_per_page',array(
		'label'	=> __('Product Per Page','film-maker-lite'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

		$wp_customize->add_setting( 'film_maker_lite_product_sidebar', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_product_sidebar', array(
		 'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'film-maker-lite' ),
		 'section'     => 'woocommerce_product_catalog',
		 'type'        => 'toggle',
		 'settings'    => 'film_maker_lite_product_sidebar',
	 ) ) );

	 $wp_customize->add_setting('film_maker_lite_sale_tag_position',array(
        'default' => 'right',
        'sanitize_callback' => 'film_maker_lite_sanitize_choices'
	));
	$wp_customize->add_control('film_maker_lite_sale_tag_position',array(
        'type' => 'radio',
        'label'     => __('Sale Badge Position', 'film-maker-lite'),
        'description'   => __('This option work for Archieve Products', 'film-maker-lite'),
        'section' => 'woocommerce_product_catalog',
        'choices' => array(
            'left' => __('Left','film-maker-lite'),
            'right' => __('Right','film-maker-lite'),
        ),
	) );

	$wp_customize->add_setting( 'film_maker_lite_single_product_sidebar', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_single_product_sidebar', array(
		 'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'film-maker-lite' ),
		 'section'     => 'woocommerce_product_catalog',
		 'type'        => 'toggle',
		 'settings'    => 'film_maker_lite_single_product_sidebar',
	 ) ) );

	 $wp_customize->add_setting( 'film_maker_lite_related_product', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Film_Maker_Lite_Toggle_Control( $wp_customize, 'film_maker_lite_related_product', array(
			'label'       => esc_html__( 'Show / Hide related product', 'film-maker-lite' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'film_maker_lite_related_product',
		) ) );


	// 404 PAGE
	$wp_customize->add_section('film_maker_lite_404_page_section',array(
		'title'         => __('404 Page', 'film-maker-lite'),
		'description'   => 'Here you can customize 404 Page content.',
	) );
	$wp_customize->add_setting('film_maker_lite_not_found_title',array(
		'default'=> __('Oops! That page cant be found.','film-maker-lite'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('film_maker_lite_not_found_title',array(
		'label'	=> __('Edit Title','film-maker-lite'),
		'section'=> 'film_maker_lite_404_page_section',
		'type'=> 'text',
	));
	$wp_customize->add_setting('film_maker_lite_not_found_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','film-maker-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('film_maker_lite_not_found_text',array(
		'label'	=> __('Edit Text','film-maker-lite'),
		'section'=> 'film_maker_lite_404_page_section',
		'type'=> 'text'
	));

}
add_action( 'customize_register', 'film_maker_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Film Maker Lite 1.0
 * @see film_maker_lite_customize_register()
 *
 * @return void
 */
function film_maker_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Film Maker Lite 1.0
 * @see film_maker_lite_customize_register()
 *
 * @return void
 */
function film_maker_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'FILM_MAKER_LITE_PRO_THEME_NAME' ) ) {
	define( 'FILM_MAKER_LITE_PRO_THEME_NAME', esc_html__( 'Film Maker Pro Theme', 'film-maker-lite' ));
}
if ( ! defined( 'FILM_MAKER_LITE_PRO_THEME_URL' ) ) {
	define( 'FILM_MAKER_LITE_PRO_THEME_URL', esc_url('https://www.themespride.com/products/film-maker-wordpress-theme/'));
}
if ( ! defined( 'FILM_MAKER_LITE_DOC_URL' ) ) {
	define( 'FILM_MAKER_LITE_DOC_URL', esc_url('https://page.themespride.com/demo/docs/film-maker-lite/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Film_Maker_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Film_Maker_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Film_Maker_Lite_Customize_Section_Pro(
				$manager,
				'film_maker_lite_section_pro',
				array(
					'priority'   => 9,
					'title'    => FILM_MAKER_LITE_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'film-maker-lite' ),
					'pro_url'  => esc_url( FILM_MAKER_LITE_PRO_THEME_URL, 'film-maker-lite' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Film_Maker_Lite_Customize_Section_Pro(
				$manager,
				'film_maker_lite_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'film-maker-lite' ),
					'pro_text' => esc_html__( 'Click Here', 'film-maker-lite' ),
					'pro_url'  => esc_url( FILM_MAKER_LITE_DOC_URL, 'film-maker-lite'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'film-maker-lite-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'film-maker-lite-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Film_Maker_Lite_Customize::get_instance();
