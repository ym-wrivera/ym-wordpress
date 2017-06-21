<?php
//submit button

$wp_customize->add_section( 'gf_stla_form_id_submit_button' , array(
    'title' => 'Submit Button',
    'panel' => 'gf_stla_panel',
  ) );

$wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][button-align]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[submit-button][button-align]',   array(
    'type' => 'select',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_submit_button', // Required, core or custom.
    'label' => __( 'Button Position' ),
    'choices'        => $align_pos,
  )
);

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][button-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[submit-button][button-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Button Color' ),
      'section' => 'gf_stla_form_id_submit_button',
    )
  )
);

     $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][hover-color]' , array(
      'default'     => '',
      'transport'   => 'refresh',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[submit-button][hover-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Hover Color' ),
      'section' => 'gf_stla_form_id_submit_button',
    )
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][font-size]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[submit-button][font-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_submit_button', // Required, core or custom.
    'label' => __( 'Font Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 24px or 30%'
  )
  )
);

     $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][font-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[submit-button][font-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Font Color' ),
      'section' => 'gf_stla_form_id_submit_button',
    )
  )
);

     $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][font-hover-color]' , array(
      'default'     => '',
      'transport'   => 'refresh',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[submit-button][font-hover-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Hover Font Color' ),
      'section' => 'gf_stla_form_id_submit_button',
    )
  )
);

$wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][width]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[submit-button][width]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_submit_button', // Required, core or custom.
    'label' => __( 'Width' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 50px or 30%'
  )
  )
);

  $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][height]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[submit-button][height]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_submit_button', // Required, core or custom.
    'label' => __( 'Height' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 50px or 30%'
  )
  )
);
  $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][border-size]' , array(
      'default'     => '0px',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[submit-button][border-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_submit_button', // Required, core or custom.
    'label' => __( 'Border Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][border-type]' , array(
      'default'     => 'inherit',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[submit-button][border-type]',   array(
    'type' => 'select',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_submit_button', // Required, core or custom.
    'label' => __( 'Border Type' ),
    'choices'        => $border_types,
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][border-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[submit-button][border-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Border Color' ),
      'section' => 'gf_stla_form_id_submit_button',
    )
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][border-radius]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[submit-button][border-radius]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_submit_button', // Required, core or custom.
    'label' => __( 'Border Radius' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

  $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][margin]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[submit-button][margin]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_submit_button', // Required, core or custom.
    'label' => __( 'Margin' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[submit-button][padding]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[submit-button][padding]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_submit_button', // Required, core or custom.
    'label' => __( 'Padding' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);