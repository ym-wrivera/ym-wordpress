<?php
//form wrapper section

$wp_customize->add_section( 'gf_stla_form_id_form_wrapper' , array(
    'title' => 'Form Wrapper',
    'panel' => 'gf_stla_panel',
  ) );

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-wrapper][max-width]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-wrapper][max-width]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_wrapper', // Required, core or custom.
    'label' => __( 'Width' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 400px or 90%'
  )
  )
);
$wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-wrapper][font]' , array(
      'default'     => 'Default',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-wrapper][font]',   array(
    'type' => 'select',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_wrapper', // Required, core or custom.
    'label' => __( 'Font Family' ),
    'choices' => $font_collection,
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-wrapper][background-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[form-wrapper][background-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Background Color' ),
      'section' => 'gf_stla_form_id_form_wrapper',
    )
  )
);

$wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-wrapper][background-image]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Image_Control(
           $wp_customize,
           'gf_stla_form_id_'.$current_form_id.'[form-wrapper][background-image]',
           array(
               'label'      => 'Background Image' ,
               'section'    => 'gf_stla_form_id_form_wrapper',
               'settings'   => 'gf_stla_form_id_'.$current_form_id.'[form-wrapper][background-image]',
    )
  )
);

  $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-wrapper][border-size]' , array(
      'default'     => '0px',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-wrapper][border-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_wrapper', // Required, core or custom.
    'label' => __( 'Border Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-wrapper][border-type]' , array(
      'default'     => 'inherit',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-wrapper][border-type]',   array(
    'type' => 'select',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_wrapper', // Required, core or custom.
    'label' => __( 'Border Type' ),
    'choices'        => $border_types,
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-wrapper][border-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[form-wrapper][border-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Border Color' ),
      'section' => 'gf_stla_form_id_form_wrapper',
    )
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-wrapper][border-radius]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-wrapper][border-radius]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_wrapper', // Required, core or custom.
    'label' => __( 'Border Radius' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

  $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-wrapper][margin]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-wrapper][margin]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_wrapper', // Required, core or custom.
    'label' => __( 'Margin' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-wrapper][padding]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-wrapper][padding]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_wrapper', // Required, core or custom.
    'label' => __( 'Padding' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);