<?php
    class Fogarty_Shortcodes {
        
        public function __construct() {
            if (!is_admin()) {
                
            }
        }

        public function add_shortcode() {
            add_shortcode('fogarty', 'Fogarty_Shortcodes::update_shortcode');
        }

        public function update_shortcode($atts, $content = null) {
            $data = $atts['data'];
            $output = '';

            // Enqueue child theme scripts
            wp_enqueue_script('shortcode-scripts');
            wp_enqueue_style('shortcode-styles');
            
            if ($data == 'popup') {
                // Enqueue popup libraries
                wp_enqueue_script('popup');
                wp_enqueue_style('popup');

                // Pass target javascript variable
                $target = $atts['target'];
                wp_localize_script('popup', 'popupTarget', $target);

                // Update front-end message
                if (et_pb_is_pagebuilder_used() == false || is_admin()) $output = '<p style="text-align: center;">[click to edit popup shortcode]</p>';
            }

            // Return output value (default empty)
            return $output;
        }
    }
?>