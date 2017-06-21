<?php
//form fields section

$wp_customize->add_section( 'gf_stla_form_id_field_labels' , array(
    'title' => 'Field Labels',
    'panel' => 'gf_stla_panel',
  ) );

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[field-labels][display]' , array(
      'default'     => false,
      'transport'   => 'refresh',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[field-labels][display]',   array(
    'type' => 'checkbox',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_field_labels', // Required, core or custom.
    'label' => __( 'Hide Labels' ),
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[field-labels][font-size]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[field-labels][font-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_field_labels', // Required, core or custom.
    'label' => __( 'Label Font Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 40px or 90%'
  )
  )
);


 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[field-labels][font-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[field-labels][font-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Label Font Color' ),
      'section' => 'gf_stla_form_id_field_labels',
    )
  )
);

 
//   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[field-labels][margin]' , array(
//       'default'     => '',
//       'transport'   => 'postMessage',
//       'type' => 'option'
//   ) );

//   $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[field-labels][margin]',   array(
//     'type' => 'text',
//     'priority' => 10, // Within the section.
//     'section' => 'gf_stla_form_id_field_labels', // Required, core or custom.
//     'label' => __( 'Margin' ),
//    'input_attrs' => array(
//     'placeholder' => 'Example: 5px 10px 5px 10px'
//   )
//   )
// );

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[field-labels][padding]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[field-labels][padding]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_field_labels', // Required, core or custom.
    'label' => __( 'Padding' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);