<?php
/**
 * Plugin Name:       woocomAdditions
 * Plugin URI:        https://github.com/samtarling/woocomAdditions
 * Description:       Some interesting modifications to WooCommerce ;-)
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Sam Tarling
 * Author URI:        https://github.com/samtarling/woocomAdditions
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       woocomAdditions
 * Domain Path:       /woocomAdditions
 */

defined( 'ABSPATH' ) || exit;

//Actions
add_action('wp_enqueue_scripts','registerScripts');


//Functions
/**
 * Register CSS files
 *
 * @return void
 */
function registerScripts()
{
    wp_enqueue_style( 'style1', plugins_url( 'wca_style.css' , __FILE__ ) );
}

/**
 * Show the product tagline in the product loop
 *
 * @return void
 */
function getWooProductTagline()
{
    $productId = get_the_ID();
    
    if ( ! empty( $productId ) )
    {
        $wcProduct = wc_get_product($productId);
        echo "<p class='woocomAdditions_product_tagline'>" . $wcProduct->get_meta( 'tagline' ) . "</p>";

    }
    
}