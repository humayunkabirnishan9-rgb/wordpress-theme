<?php
/**
 * Custom Nav Walker for BlueWireSEO
 * Generates proper dropdown markup
 *
 * @package BlueWireSEO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'BlueWireSEO_Nav_Walker' ) ) :

class BlueWireSEO_Nav_Walker extends Walker_Nav_Menu {

    /**
     * Start element
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes     = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

        if ( 0 === $depth ) {
            $class_names .= ' bws-nav-item';
        }

        $output .= '<li class="' . esc_attr( $class_names ) . '">';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        if ( 0 === $depth ) {
            $atts['class'] = '';
        }

        $atts      = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = '';

        // Check if item has children
        $has_children = in_array( 'menu-item-has-children', $classes );

        $item_output .= '<a' . $attributes . '>';
        $item_output .= apply_filters( 'the_title', $item->title, $item->ID );

        if ( $has_children && 0 === $depth ) {
            $item_output .= '<svg class="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="width:12px;height:12px;max-width:12px;max-height:12px;margin-left:4px;flex-shrink:0;"><polyline points="6 9 12 15 18 9"></polyline></svg>';
        }

        $item_output .= '</a>';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    /**
     * Start level
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent  = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"sub-menu bws-dropdown\">\n";
    }

    /**
     * End level
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent  = str_repeat( "\t", $depth );
        $output .= "$indent</ul>\n";
    }
}

endif;
