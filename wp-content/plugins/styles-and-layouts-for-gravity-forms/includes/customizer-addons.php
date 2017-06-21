<?php
//form text fields section
class Themes_Pack_Custom_Control extends WP_Customize_Control
{
  /**
   * Render the control's content.
   * Allows the content to be overriden without having to rewrite the wrapper.
   */
  public function render_content() {
    ?>
    <label>
        <h2><?php echo esc_html( $this->label ); ?></h2>
        <a href="https://wpmonks.com/downloads/theme-pack?src=customizer" target="_blank"><img src="<?php echo GF_STLA_URL; ?>/css/images/theme-pack.jpg"></a>
        <h3>Get pack of beautifully crafted themes and design forms instantly</h3>
        <hr>
      </textarea>
    </label>
    <?php
  }
}


class Grid_Layout_Custom_Control extends WP_Customize_Control
{
  /**
   * Render the control's content.
   * Allows the content to be overriden without having to rewrite the wrapper.
   */
  public function render_content() {
    ?>
    <label>
        <h2><?php echo esc_html( $this->label ); ?></h2>
        <a href="https://wpmonks.com/downloads/grid-layout?src=customizer" target="_blank"><img src="<?php echo GF_STLA_URL; ?>/css/images/grid-layout.jpg"></a>
        <h3>Divide your form into multiple columns to arrange fields side by side</h3>
        <hr>
      </textarea>
    </label>
    <?php
  }
}

class Field_Icons_Custom_Control extends WP_Customize_Control
{
  /**
   * Render the control's content.
   * Allows the content to be overriden without having to rewrite the wrapper.
   */
  public function render_content() {
    ?>
    <label>
        <h2><?php echo esc_html( $this->label ); ?></h2>
        <a href="https://wpmonks.com/downloads/field-icons?src=customizer" target="_blank"><img src="<?php echo GF_STLA_URL; ?>/css/images/field-icons.jpg"></a>
        <h3>Add icons inside form fields</h3>
        <hr>
      </textarea>
    </label>
    <?php
  }
}

class Custom_Themes_Custom_Control extends WP_Customize_Control
{
  /**
   * Render the control's content.
   * Allows the content to be overriden without having to rewrite the wrapper.
   */
  public function render_content() {
    ?>
    <label>
        <h2><?php echo esc_html( $this->label ); ?></h2>
        <a href="https://wpmonks.com/downloads/custom-themes?src=customizer" target="_blank"><img src="<?php echo GF_STLA_URL; ?>/css/images/custom-themes.jpg"></a>
        <h3>Save you current form style as theme and apply it on other forms</h3>
        <hr>
      </textarea>
    </label>
    <?php
  }
}



class Addon_Bundle_Custom_Control extends WP_Customize_Control
{
  /**
   * Render the control's content.
   * Allows the content to be overriden without having to rewrite the wrapper.
   */
  public function render_content() {
    ?>
    <label>
        <h2><?php echo esc_html( $this->label ); ?></h2>
        <a href="https://wpmonks.com/downloads/addon-bundle?src=customizer" target="_blank"><img src="<?php echo GF_STLA_URL; ?>/css/images/addon-bundle.jpg"></a>
        <h3>Get all the addons at a special discounted price</h3>
        <hr>
      </textarea>
    </label>
    <?php
  }
}

class More_Addons_Custom_Control extends WP_Customize_Control
{
  /**
   * Render the control's content.
   * Allows the content to be overriden without having to rewrite the wrapper.
   */
  public function render_content() {
    ?>
    <label>
        <h2><?php echo esc_html( $this->label ); ?></h2>
        <a href="https://wpmonks.com/styles-and-layouts-for-gravity-forms/?src=customizer#x-section-6" target="_blank"><img src="<?php echo GF_STLA_URL; ?>/css/images/more-addons.jpg"></a>
        <h3>Checkout more addons</h3>
        <hr>
      </textarea>
    </label>
    <?php
  }
}

class Material_Design_Custom_Control extends WP_Customize_Control
{
  /**
   * Render the control's content.
   * Allows the content to be overriden without having to rewrite the wrapper.
   */
  public function render_content() {
    ?>
    <label>
        <h2><?php echo esc_html( $this->label ); ?></h2>
        <a href="https://wpmonks.com/downloads/material-design?src=customizer" target="_blank"><img src="<?php echo GF_STLA_URL; ?>/css/images/material-design.jpg"></a>
        <h3>Apply material design on Gravity Forms with single click</h3>
        <hr>
      </textarea>
    </label>
    <?php
  }
}

class Tooltips_Custom_Control extends WP_Customize_Control
{
  /**
   * Render the control's content.
   * Allows the content to be overriden without having to rewrite the wrapper.
   */
  public function render_content() {
    ?>
    <label>
        <h2><?php echo esc_html( $this->label ); ?></h2>
        <a href="https://wpmonks.com/downloads/tooltips?src=customizer" target="_blank"><img src="<?php echo GF_STLA_URL; ?>/css/images/tooltips.jpg"></a>
        <h3>Show tooltips inside Gravity Form fields</h3>
        <hr>
      </textarea>
    </label>
    <?php
  }
}

class Customization_Support_Custom_Control extends WP_Customize_Control
{
  /**
   * Render the control's content.
   * Allows the content to be overriden without having to rewrite the wrapper.
   */
  public function render_content() {
    ?>
    <label>
        <h2><?php echo esc_html( $this->label ); ?></h2>
        <a href="https://wpmonks.com/contact-us?src=customizer" target="_blank"><img src="<?php echo GF_STLA_URL; ?>/css/images/support.jpg"></a>
        <h3>Contact us for custom Gravity Forms work or for any support questions</h3>
        <hr>
      </textarea>
    </label>
    <?php
  }
}



$wp_customize->add_section( 'gf_stla_form_id_addons' , array(
    'title' => 'Addons',
    'panel' => 'gf_stla_panel',
  ) );

 $wp_customize->add_setting( 'gf_stla_form_id_[addons][addon-bundle]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

$wp_customize->add_control(
  new Addon_Bundle_Custom_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_[addons][addon-bundle]', // Setting id
    array( // Args, including any custom ones.
     'label' => __( 'Addon Bundle' ),
      'section' => 'gf_stla_form_id_addons',
    )
  )
);


 $wp_customize->add_setting( 'gf_stla_form_id_[addons][material-design]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

$wp_customize->add_control(
  new Material_Design_Custom_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_[addons][material-design]', // Setting id
    array( // Args, including any custom ones.
     'label' => __( 'Material Design' ),
      'section' => 'gf_stla_form_id_addons',
    )
  )
);


 $wp_customize->add_setting( 'gf_stla_form_id_[addons][grid-layout]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

$wp_customize->add_control(
  new Grid_Layout_Custom_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_[addons][grid-layout]', // Setting id
    array( // Args, including any custom ones.
     'label' => __( 'Grid Layout' ),
      'section' => 'gf_stla_form_id_addons',
    )
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_[addons][theme-pack]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

$wp_customize->add_control(
  new Themes_Pack_Custom_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_[addons][theme-pack]', // Setting id
    array( // Args, including any custom ones.
     'label' => __( 'Theme Pack' ),
      'section' => 'gf_stla_form_id_addons',
    )
  )
);



 $wp_customize->add_setting( 'gf_stla_form_id_[addons][field-icons]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

$wp_customize->add_control(
  new Field_Icons_Custom_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_[addons][field-icons]', // Setting id
    array( // Args, including any custom ones.
     'label' => __( 'Field Icons' ),
      'section' => 'gf_stla_form_id_addons',
    )
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_[addons][tooltips]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

$wp_customize->add_control(
  new Tooltips_Custom_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_[addons][tooltips]', // Setting id
    array( // Args, including any custom ones.
     'label' => __( 'Tooltips' ),
      'section' => 'gf_stla_form_id_addons',
    )
  )
);


 $wp_customize->add_setting( 'gf_stla_form_id_[addons][widget-sidebar]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );



 $wp_customize->add_setting( 'gf_stla_form_id_[addons][custom-themes]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

$wp_customize->add_control(
  new Custom_Themes_Custom_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_[addons][custom-themes]', // Setting id
    array( // Args, including any custom ones.
     'label' => __( 'Custom Themes' ),
      'section' => 'gf_stla_form_id_addons',
    )
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_[addons][woocommerce-addon]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );



 $wp_customize->add_setting( 'gf_stla_form_id_[addons][more]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

$wp_customize->add_control(
  new More_Addons_Custom_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_[addons][more]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'More Addons '),
      'section' => 'gf_stla_form_id_addons',
    )
  )
);

 $wp_customize->add_setting( 'gf_stla_form_id_[addons][customization-support]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

$wp_customize->add_control(
  new Customization_Support_Custom_Control(
    $wp_customize, // WP_Customize_Manager
    'gf_stla_form_id_[addons][customization-support]', // Setting id
    array( // Args, including any custom ones.
     'label' => __( 'Customization & Support' ),
      'section' => 'gf_stla_form_id_addons',
    )
  )
);