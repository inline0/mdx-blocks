<?php
/**
 * Plugin Name: MDX Blocks
 * Plugin URI: https://github.com/inline0/mdx-blocks
 * Description: WordPress blocks powered by MDX
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Author: Inline0
 * Author URI: https://inline0.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: mdx-blocks
 * Domain Path: /languages
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('MDX_BLOCKS_VERSION', '1.0.0');
define('MDX_BLOCKS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MDX_BLOCKS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('MDX_BLOCKS_PLUGIN_FILE', __FILE__);

/**
 * Main plugin class
 */
class MDX_Blocks {
    
    /**
     * Instance of this class
     */
    private static $instance = null;
    
    /**
     * Get instance
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Constructor
     */
    private function __construct() {
        $this->init_hooks();
    }
    
    /**
     * Initialize hooks
     */
    private function init_hooks() {
        register_activation_hook(MDX_BLOCKS_PLUGIN_FILE, [$this, 'activate']);
        register_deactivation_hook(MDX_BLOCKS_PLUGIN_FILE, [$this, 'deactivate']);
        
        add_action('init', [$this, 'init']);
    }
    
    /**
     * Plugin activation
     */
    public function activate() {
        flush_rewrite_rules();
    }
    
    /**
     * Plugin deactivation
     */
    public function deactivate() {
        flush_rewrite_rules();
    }
    
    /**
     * Initialize plugin
     */
    public function init() {
        // Load text domain for translations
        load_plugin_textdomain('mdx-blocks', false, dirname(plugin_basename(__FILE__)) . '/languages');
        
        // Register blocks
        $this->register_blocks();
    }
    
    /**
     * Register blocks
     */
    private function register_blocks() {
        // Register custom blocks here
    }
}

// Initialize plugin
MDX_Blocks::get_instance();

