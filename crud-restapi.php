<?php
/*
* Plugin Name:       crud-restapi
* Plugin URI:        
* Description:       
* Version:           
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            
* Author URI:        
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Update URI:        
* Text Domain:       
* Domain Path:       /languages
*/

// don't call the file directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use CRUD_RESTAPI\Pages;
use CRUD_RESTAPI\Assets;
use CRUD_RESTAPI\Database;
use CRUD_RESTAPI\Routes;

class CRUD_RESTAPI{

	public $version = '1.0.0';
     
    private static $instance = null;

    private $container = [];

    function __construct()
    {
        require_once __DIR__ . '/vendor/autoload.php';
        $this->define_constants();

		register_activation_hook( __FILE__, [ $this, 'activate' ] );
		register_deactivation_hook( __FILE__, [ $this, 'deactivate' ] );

		add_action( 'plugins_loaded', [ $this, 'init_classes' ] );
    }
    
    function define_constants()
    {
        define('CRUD_RESTAPI_PLUGIN_DIR',plugin_dir_url(__FILE__));
    }

    function init_classes()
    {
        new Pages();
        new Assets();
        new Routes();
        
    }
    
    function activate()
    {
        new Database();
    }

    function deactivate()
    {
        Database::delete_tables();
    }

    static function getInstance()
    {
        if ( is_null( ( self::$instance ) ) ) {
			self::$instance = new self();
		}

		return self::$instance;
    }
}
    

CRUD_RESTAPI::getInstance();

