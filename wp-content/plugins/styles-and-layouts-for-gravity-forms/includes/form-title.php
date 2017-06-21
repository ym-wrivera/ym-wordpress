<?php 

 $wp_customize->add_section( 'gf_stla_form_id_form_title_description' , array(
    'title' => 'Form Title & Description',
    'panel' => 'gf_stla_panel',
  ) );

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-title][font-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[form-title][font-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Title Font Color' ),
      'section' => 'gf_stla_form_id_form_title_description',
    )
  )
);

 
 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-title][font-size]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-title][font-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_title_description', // Required, core or custom.
    'label' => __( 'Title Font Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-title][text-align]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-title][text-align]',   array(
    'type' => 'select',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_title_description', // Required, core or custom.
    'label' => __( 'Title Font Alignment' ),
    'choices'        => $align_pos,
  )
);

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-title][margin]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-title][margin]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_title_description', // Required, core or custom.
    'label' => __( 'Margin' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[form-title][padding]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[form-title][padding]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_form_title_description', // Required, core or custom.
    'label' => __( 'Padding' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);