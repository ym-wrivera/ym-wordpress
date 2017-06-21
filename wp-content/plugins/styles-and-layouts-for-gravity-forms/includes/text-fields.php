<?php
//form text fields section

$wp_customize->add_section( 'gf_stla_form_id_text_fields' , array(
    'title' => 'Text Fields',
    'panel' => 'gf_stla_panel',
  ) );

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[text-fields][max-width]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[text-fields][max-width]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_text_fields', // Required, core or custom.
    'label' => __( 'Width' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 400px or 90%'
  )
  )
);

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[text-fields][font-size]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[text-fields][font-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_text_fields', // Required, core or custom.
    'label' => __( 'Font Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 40px'
  )
  )
);

$wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[text-fields][font-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[text-fields][font-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Font Color' ),
      'section' => 'gf_stla_form_id_text_fields',
    )
  )
);
  $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[text-fields][border-size]' , array(
      'default'     => '0px',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[text-fields][border-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_text_fields', // Required, core or custom.
    'label' => __( 'Border Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[text-fields][border-type]' , array(
      'default'     => 'inherit',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[text-fields][border-type]',   array(
    'type' => 'select',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_text_fields', // Required, core or custom.
    'label' => __( 'Border Type' ),
    'choices'        => $border_types,
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[text-fields][border-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[text-fields][border-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Border Color' ),
      'section' => 'gf_stla_form_id_text_fields',
    )
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[text-fields][border-radius]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[text-fields][border-radius]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_text_fields', // Required, core or custom.
    'label' => __( 'Border Radius' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[text-fields][background-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[text-fields][background-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Background Color' ),
      'section' => 'gf_stla_form_id_text_fields',
    )
  )
);


  $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[text-fields][margin]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[text-fields][margin]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_text_fields', // Required, core or custom.
    'label' => __( 'Margin' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[text-fields][padding]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[text-fields][padding]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_text_fields', // Required, core or custom.
    'label' => __( 'Padding' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);