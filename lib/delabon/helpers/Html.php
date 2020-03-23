<?php 

namespace Delabon\Helpers;

class Html{

    /**
     * Prepare attributes
     *
     * @param array $atts
     * @return string
     */
    private function prepare_attributes( $atts ){

        $str = '';

        foreach( $atts as $key => $value ){
            
            if( $value === '' ) continue;

            $str .= ' ' . $key . '="'.$value.'"';
        }
        
        return $str;
    }

    /**
     * Get input markup
     *
     * @param array $args
     * @return string
     */
    function input( $args = [] ){

        $args = wp_parse_args( $args, [
            'type' => 'text',
        ]);

        // type 
        if( empty($args['type']) || ! $args['type'] ){
            $args['type'] = 'text';
        }

        // class
        $args['class'] = 'dlb-input dlb-input-' . $args['type'] . ( ! empty($args['class']) ? ' '.$args['class'] : '' );

        return '<input'.$this->prepare_attributes($args).'>';
    }

    /**
     * Get textarea markup
     *
     * @param array $args
     * @return string
     */
    function textarea( $args = [] ){

        // class
        $args['class'] = 'dlb-input dlb-input-textarea' . ( ! empty($args['class']) ? ' '.$args['class'] : '' );

        // value
        $value = '';

        if( isset( $args['value'] ) ){
            $value = $args['value'];
            unset($args['value']);
        }

        return '<textarea'.$this->prepare_attributes($args).'>'.$value.'</textarea>';
    }

    /**
     * Get select markup
     *
     * @param array $args
     * @return string
     */
    function select( $args = [] ){

        // class
        $args['class'] = 'dlb-input dlb-input-select' . ( ! empty($args['class']) ? ' '.$args['class'] : '' );

        // value
        $value = '';

        if( isset( $args['value'] ) ){
            $value = $args['value'];
            unset($args['value']);
        }

        // items
        $items = [];
        $items_markup = '';

        if( isset( $args['items'] ) ){
            $items = $args['items'];
            unset($args['items']);
        }
        
        foreach( $items as $item_key => $item_text ){

            $is_selected = $value == $item_key ? ' selected="selected"' : '';

            $items_markup .= '<option value="'.$item_key.'"'.$is_selected.'>'.$item_text.'</option>';
        }

        return '<select'.$this->prepare_attributes($args).'>'.$items_markup.'</select>';
    }

    /**
     * Get title markup
     *
     * @param string $text
     * @param array $args
     * @return void
     */
    function title( $text, $args = [] ){

        if( $text === '' ) return '';

        $args = wp_parse_args( $args, [
            'class' => '',
        ]);

        $args['class'] = 'dlb-input-title' . ( ! empty($args['class']) ? ' '.$args['class'] : '' );

        return '<h3'.$this->prepare_attributes($args).'>'.$text.'</h3>';
    }

    /**
     * Get description markup
     *
     * @param string $text
     * @param array $args
     * @return void
     */
    function description( $text, $args = [] ){

        if( $text === '' ) return '';

        $args = wp_parse_args( $args, [
            'class' => '',
        ]);

        $args['class'] = 'dlb-input-description' . ( ! empty($args['class']) ? ' '.$args['class'] : '' );

        return '<p'.$this->prepare_attributes($args).'>'.$text.'</p>';
    }

    /**
     * Get container markup
     *
     * @param string $text
     * @param array $args
     * @return string
     */
    function container( $text, $args = [] ){

        if( $text === '' || ! $text ) return '';

        // class
        $args['class'] = 'dlb-input-container' . ( ! empty($args['class']) ? ' '.$args['class'] : '' );

        return '<div'.$this->prepare_attributes($args).'>'.$text.'</div>';
    }
}
