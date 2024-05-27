<?php

function cinema_theater_customize_register( $wp_customize ) {

     // Register the custom control type.
    $wp_customize->register_control_type( 'Cinema_Theater_Toggle_Control' );


    $wp_customize->add_setting('film_maker_lite_email_address',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('film_maker_lite_email_address',array(
        'label' => esc_html__('Add Email Address','cinema-theater'),
        'section'   => 'film_maker_lite_topbar',
        'type'      => 'text'
    ));

    // Film Category Section
    $wp_customize->add_section( 'cinema_theater_category_section' , array(
        'title'      => __( 'Featured Actor Section Settings', 'cinema-theater' ),
        'priority' => 10,
        'panel' => 'film_maker_lite_panel_id'
    ) );

    $wp_customize->add_setting( 'cinema_theater_featured_actors_enable', array(
        'default'           => false,
        'transport'         => 'refresh',
        'sanitize_callback' => 'film_maker_lite_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new Cinema_Theater_Toggle_Control( $wp_customize, 'cinema_theater_featured_actors_enable', array(
        'label'       => esc_html__( 'Show / Hide section', 'cinema-theater' ),
        'section'     => 'cinema_theater_category_section',
        'type'        => 'toggle',
        'settings'    => 'cinema_theater_featured_actors_enable',
    ) ) );


    $wp_customize->add_setting('cinema_theater_featured_actors_heading',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cinema_theater_featured_actors_heading',array(
        'label' => esc_html__('Section Title ','cinema-theater'),
        'section'   => 'cinema_theater_category_section',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('cinema_theater_featured_actors_sub_heading',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cinema_theater_featured_actors_sub_heading',array(
        'label' => esc_html__('Section Text','cinema-theater'),
        'section'   => 'cinema_theater_category_section',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('cinema_theater_featured_actors_btn_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cinema_theater_featured_actors_btn_text',array(
        'label' => esc_html__('Section Button Text','cinema-theater'),
        'section'   => 'cinema_theater_category_section',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('cinema_theater_featured_actors_btn_link',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('cinema_theater_featured_actors_btn_link',array(
        'label' => esc_html__('Section Button Link','cinema-theater'),
        'section'   => 'cinema_theater_category_section',
        'type'      => 'url'
    ));

    $film_maker_lite_categories = get_categories();
    $film_maker_lite_cats = array();
    $i = 0;
    $film_maker_lite_offer_cat[]= 'select';
    foreach($film_maker_lite_categories as $film_maker_lite_category){
        if($i==0){
            $default = $film_maker_lite_category->slug;
            $i++;
        }
        $film_maker_lite_offer_cat[$film_maker_lite_category->slug] = $film_maker_lite_category->name;
    }

    $wp_customize->add_setting('cinema_theater_featured_actors_section_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'film_maker_lite_sanitize_choices',
    ));
    $wp_customize->add_control('cinema_theater_featured_actors_section_category',array(
        'type'    => 'select',
        'choices' => $film_maker_lite_offer_cat,
        'label' => __('Select Category','cinema-theater'),
        'section' => 'cinema_theater_category_section',
    ));
}
add_action( 'customize_register', 'cinema_theater_customize_register' );
