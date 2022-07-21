<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Box_Expand extends Widget_Base{

  public function get_name(){
    return 'box-expand';
  }

  public function get_title(){
    return 'Box-expand';
  }

  public function get_icon(){
    return 'fa fa-camera';
  }

  public function get_categories(){
    return ['general'];
  }

  protected function _register_controls(){

    $this->start_controls_section(
      'section_content',
      [
        'label' => 'Settings',
      ]
    );

    $this->add_control(
      'label_heading',
      [
        'label' => 'Label Heading',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'Example'
      ]
    );

    $this->add_control(
      'content_heading',
      [
        'label' => 'Content Heading',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'My Other Example Heading'
      ]
    );

    $this->add_control(
      'content',
      [
        'label' => 'Content',
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => 'Some example content. Start Editing Here.'
      ]
    );
    $this->add_control(
      'image__content',
      [
        'label' => 'Image',
        'type' => \Elementor\Controls_Manager::MEDIA,
      ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
      'section_style',
      [
        'label' => __( 'Style', 'plugin-name' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_control(
      'font_color',
      [
        'label' => __( 'Font Color', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'selectors' => [
          '{{WRAPPER}} .box-expand' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_control(
      'bg_color',
      [
        'label' => __( 'Background Color', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'selectors' => [
          '{{WRAPPER}} .box-expand' => 'background-color: {{VALUE}}',
        ],
      ]
    );

    $this->end_controls_section();
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
//  $this->add_inline_editing_attributes('label_heading', 'none');
    $this->add_render_attribute(
      'label_heading',
      ['class' => ['box-expand__label-heading'],]);

    ?>
      <link rel="stylesheet" href="../wp-content/plugins/ElementorPlus/widgets/box-expand.css">
      <link rel="stylesheet" href="wp-content/plugins/ElementorPlus/widgets/box-expand.css">
      <div class="box-expand" style="color: ' . $settings['font_color'] . ';background-color: ='. $settings['bg_color'] . '">
        <?php echo '<img src="' . $settings['image__content']['url'] . '" alt="">'; ?>
        <div <?php echo $this->get_render_attribute_string('label_heading'); ?>>
          <?php echo $settings['label_heading']?>
        </div>
        <div class="box-expand__content" style="background-color: ='. $settings['bg_color'] . '">
          <div class="box-expand__content__heading" <?php echo $this->get_render_attribute_string('content_heading'); ?>>
            <?php echo $settings['content_heading'] ?>
          </div>
          <div class="box-expand__content__copy" <?php echo $this->get_render_attribute_string('content'); ?>>
            <?php echo $settings['content'] ?>
          </div>
        </div>
      </div>
    <?php
  }

  protected function _content_template(){
    ?>
    <#
        view.addInlineEditingAttributes( 'label_heading', 'basic' );
        view.addRenderAttribute(
        'label_heading',
        {'class': [ 'box-expand__label-heading' ],});
    #>

      <div class="box-expand"style="color: {{ settings.font_color }};background-color: {{ settings.bg_color }}">
        <img src="{{ settings.image__content.url }}"> 
        <div {{{ view.getRenderAttributeString( 'label_heading' ) }}}>{{{ settings.label_heading }}}</div>
        <div class="box-expand__content">
          <div class="box-expand__content__heading">{{{ settings.content_heading }}}</div>
          <div class="box-expand__content__copy">
            {{{ settings.content }}}
          </div>
        </div>
    </div>
    <?php
  }
}
