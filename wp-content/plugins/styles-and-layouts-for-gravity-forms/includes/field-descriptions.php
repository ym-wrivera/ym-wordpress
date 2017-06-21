<?php
//form  section
$wp_customize->add_section( 'gf_stla_form_id_field_descriptions' , array(
    'title' => 'Field Description',
    'panel' => 'gf_stla_panel',
  ) );

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[field-descriptions][text-align]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[field-descriptions][text-align]',   array(
    'type' => 'select',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_field_descriptions', // Required, core or custom.
    'label' => __( 'Description Font Alignment' ),
    'choices'        => $align_pos,
  )
);


 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[field-descriptions][font-size]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[field-descriptions][font-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_field_descriptions', // Required, core or custom.
    'label' => __( 'Label Font Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 40px or 90%'
  )
  )
);


 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[field-descriptions][font-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[field-descriptions][font-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Label Font Color' ),
      'section' => 'gf_stla_form_id_field_descriptions',
    )
  )
);

 
//   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[field-descriptions][margin]' , array(
//       'default'     => '',
//       'transport'   => 'postMessage',
//       'type' => 'option'
//   ) );

//   $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[field-descriptions][margin]',   array(
//     'type' => 'text',
//     'priority' => 10, // Within the section.
//     'section' => 'gf_stla_form_id_field_descriptions', // Required, core or custom.
//     'label' => __( 'Margin' ),
//    'input_attrs' => array(
//     'placeholder' => 'Example: 5px 10px 5px 10px'
//   )
//   )
// );

   $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[field-descriptions][padding]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[field-descriptions][padding]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_field_descriptions', // Required, core or custom.
    'label' => __( 'Padding' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);