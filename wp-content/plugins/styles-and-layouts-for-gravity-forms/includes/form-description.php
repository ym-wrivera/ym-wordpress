<?php 

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-description][font-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[form-description][font-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Description Font Color' ),
      'section' => 'gf_stla_form_id_form_title_description',
    )
  )
);

 
 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-description][font-size]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-description][font-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_title_description', // Required, core or custom.
    'label' => __( 'Description Font Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-description][text-align]' , array(
      'default'     => 'dotted',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-description][text-align]',   array(
    'type' => 'select',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_title_description', // Required, core or custom.
    'label' => __( 'Description Font Alignment' ),
    'choices'        => $align_pos,
  )
);

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-description][margin]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-description][margin]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_title_description', // Required, core or custom.
    'label' => __( 'Margin' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-description][padding]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-description][padding]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_title_description', // Required, core or custom.
    'label' => __( 'Padding' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);