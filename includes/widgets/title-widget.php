<?php
namespace Elementor_Custom_Addon;

if ( ! defined ( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Elementor Title Widet
 * 
 * Elementor widget for testing purpose
 *
 * @since 1.0.0
 */
class Elementor_Title_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     * 
     * Retrieve Widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name
     */
    public function get_name() {
        return 'custom_title';
    }

    /**
     * Get widget title.
     * 
     * Retrieve widget title.
     * 
     * @since 1.0.0
     * @access public
     * @return string widget title
     */
    public function get_title() {
        return __( 'custom-title', 'elementor-custom-addon' );
    }

    /**
     * Get widget icon.
     * 
     * Retrieve widget icon.
     * 
     * @since 1.0.0
     * @access public
     * @return string widget icon
     */
    public function get_icon() {
        return 'eicon-site-title';
    }

    /**
     * Get custom help url
     * 
     * Retrieve URL where the user can get more information about the widget.
     * 
     * @since 1.0.0
     * @access public
     * @return string Widget help URL
     */
    public function get_custom_help_url() {
        return '';
    }

    /**
     * Get widget categories
     * 
     * Retrieve the list of categories the widget belongs to.
     * 
     * @since 1.0.0
     * @access public
     * @return array Widget categories
     */
    public function get_categories() {
        return [ 'elementor_custom_addon_category' ];
    }

    /**
     * Get widget keywords.
     * 
     * Retrieve the list of keywords the widget belongs to.
     * 
     * @since 1.0.0
     * @access public
     * @return array Widget keywords
     */
    public function get_keywords() {
        return [ 'title', 'custom' ];
    }

    /**
     * Register widget controls
     * 
     * Add input fields to allow the user to customize the widget settings.
     * 
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        // WYSIWYG Content
        $this->start_controls_section(
            'elementor_custom_addon_titles',
            [
                'label' => __( 'Title with Subtitle', 'elementor-custom-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'sub_title_text',
            [
                'label' => __( 'Text Untertitel', 'elementor-custom-addon' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Untertitel', 'elementor-custom-addon' ),
                'default' => __( '', 'elementor-custom-addon' )
            ]
        );

        $this->add_control(
            'sub_title_color',
            [
                'label' => __( 'Farbe Untertitel', 'elementor-custom-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' =>'#000000',
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'title_text',
            [
                'label' => __( 'Text Titel', 'elementor-custom-addon' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Titel', 'elementor-custom-addon' ),
                'default' => __( '', 'elementor-custom-addon' )
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Farbe Titel', 'elementor-custom-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} h2' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'title_align',
            [
                'label' => __( 'Ausrichtung', 'elementor-custom-addon' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [

                    'text-start' => [
                        'title' => __( 'Links', 'elementor-custom-addon' ),
                        'icon' => 'eicon-text-align-left'
                    ],

                    'text-center' => [
                        'title' => __( 'Mitte', 'elementor-custom-addon' ),
                        'icon' => 'eicon-text-align-center'
                    ],

                    'text-end' => [
                        'title' => __( 'Rechts', 'elementor-custom-addon' ),
                        'icon' => 'eicon-text-align-right'
                    ]
                ],
                'default' => 'text-start',
                'toggle' => true
            ]
        );



        $this->end_controls_section();
    }

    /**
     * Render Widget output on the frontend
     * 
     * Written in PHP and used to generate the final HTML
     * 
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="title-wrapper ' . $settings['title_align'] . '">';
        echo '<p>' . $settings['sub_title_text'] . '</p>';
        echo '<h2>' . $settings['title_text'] . '</h2>';
        echo '</div>';

    }
}