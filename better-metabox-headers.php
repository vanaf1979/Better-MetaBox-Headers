<?php
/**
 * Microbe
 *
 * @package             Better MetaBox Headers
 * @author              Stephan Nijman <contact@vanaf1979.nl>
 * @copyright           2019 Stephan Nijman
 * @license             GPL-3.0-or-later
 * @version             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:         Better MetaBox Headers
 * Plugin URI:          https://vanaf1979.nl/better-metabox-headers
 * Description:         Better MetaBox Headers Plugin for WordPress Gutenberg.
 * Version:             1.0.0
 * Requires at least:   5.2
 * Requires PHP:        7.0
 * Author:              Stephan Nijman
 * Author URI:          https://vanaf1979.nl
 * Text Domain:         better-metabox-headers
 * License:             GPL v3 or later
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 */


 /**
 * Set namespace.
 */
namespace Vanaf1979;



/**
 * Check WordPress context.
 */
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Microbe
 * 
 * Main BetterMetaBoxHeaders plugin class.
 *
 * @package Microbe
 */
final class BetterMetaBoxHeaders {


    /**
     * instance.
     * 
     * @var Microbe $instance instance instance.
     *
     * @access private
     * @since 1.0.0
     */
    private static $instance = null;


    /**
     * instance.
     *
     * Return a instance of this class.
     *
     * @since 1.0.0
     * 
     * @access public
     * @return BetterMetaBoxHeaders
     */
    public static function instance() : BetterMetaBoxHeaders {

        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof \Vanaf1979\BetterMetaBoxHeaders ) ) {

            self::$instance = new Self();

        }

        return self::$instance;

    }


    /**
     * __clone
     * 
     * Throw error on object clone.
     * 
     * @uses _doing_it_wrong https://developer.wordpress.org/reference/functions/_doing_it_wrong/
     * @uses esc_html__ https://developer.wordpress.org/reference/functions/esc_html__/
     *
     * @since 1.0.0
     * 
     * @access public
     * @return void
     */
    public function __clone() {

        \_doing_it_wrong( __METHOD__ , \esc_html__( 'Cheating huh?', '_microbe' ), '1.0' );

    }

    
    /**
     * __wakeup
     * 
     * Disable unserializing of the class.
     * 
     * @uses _doing_it_wrong https://developer.wordpress.org/reference/functions/_doing_it_wrong/
     * @uses esc_html__ https://developer.wordpress.org/reference/functions/esc_html__/
     *
     * @since 1.0.0
     * 
     * @access public
     * @return void
     */
    public function __wakeup() {

        \_doing_it_wrong( __METHOD__ , \esc_html__( 'Cheating huh?' , '_microbe' ) , '1.0' );

    }


    /**
     * register
     *
     * Register hooks with WordPress.
     * 
     * @uses add_action https://developer.wordpress.org/reference/functions/add_action/
     *
     * @since 1.0.0
     * 
     * @access public
     * @return void
     */
    public function register() : void {
        
        \add_action(
            'enqueue_block_editor_assets',
            array( $this , 'enqueue_styles' ),
            100
        );

    }


    /**
     * enqueue_styles.
     * 
     * Enqueue editor stylesheets.
     * 
     * @uses wp_enqueue_style() https://developer.wordpress.org/reference/functions/wp_enqueue_style/
     * 
     * @access public
     * @return void
     */
    public function enqueue_styles() : void {

        \wp_enqueue_style(
            'better-metabox-headers-styles',
            plugin_dir_url( __FILE__ ) . 'dist/css/better-metabox-headers.css',
            array(),
            '1.0.0',
            'all'
        );

    }

}


/**
 * runBetterMetaBoxHeaders.
 * 
 * Initialize the BetterMetaBoxHeaders class.
 * 
 * @uses BetterMetaBoxHeaders
 * 
 * @return void
 */
function runBetterMetaBoxHeaders() : void {

    \Vanaf1979\BetterMetaBoxHeaders::instance()->register();

}

runBetterMetaBoxHeaders();
?>