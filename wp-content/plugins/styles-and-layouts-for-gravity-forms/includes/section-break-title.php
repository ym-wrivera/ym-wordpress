<?php
//form  section
$wp_customize->add_section( 'gf_stla_form_id_section_break_title_description' , array(
    'title' => 'Section Break Title & Description ',
    'panel' => 'gf_stla_panel',
  ) );

 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[section-break-title][text-align]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[section-break-title][text-align]',   array(
    'type' => 'select',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_section_break_title_description', // Required, core or custom.
    'label' => __( 'Title  Font Alignment' ),
    'choices'        => $align_pos,
  )
);


 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[section-break-title][font-size]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('gf_stla_form_id_'.$current_form_id.'[section-break-title][font-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'gf_stla_form_id_section_break_title_description', // Required, core or custom.
    'label' => __( 'Title Font Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 40px or 90%'
  )
  )
);


 $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[section-break-title][font-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[section-break-title][font-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Title Font Color' ),
      'section' => 'gf_stla_form_id_section_break_title_description',
    )
  )
);

  $wp_customize->add_setting( 'gf_stla_form_id_'.$current_form_id.'[section-break-title][background-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_'.$current_form_id.'[section-break-title][background-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Title Background Color' ),
      'section' => 'gf_stla_form_id_section_break_title_description',
    )
  )
);