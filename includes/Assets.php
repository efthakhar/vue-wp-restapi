<?php


namespace CRUD_RESTAPI;

class Assets{

    function __construct()
    {
        add_action( 'admin_enqueue_scripts', [$this,'load_assets'] );
        add_filter( 'script_loader_tag', [$this,'filter_script'], 10, 3 );
    }

    function load_assets($hook)
    {
	
        if( $hook != 'toplevel_page_crud-restapi' ) 
        {
             return;
        }
        wp_enqueue_style( 'CRUD_RESTAPI_main_css',  CRUD_RESTAPI_PLUGIN_DIR.'vuejs/dist/index.css' );
        wp_enqueue_script('CRUD_RESTAPI_main_js', CRUD_RESTAPI_PLUGIN_DIR.'vuejs/dist/index.js' );   
    }

    
    function filter_script( $tag, $handle, $source ) 
    {

        if ( 'CRUD_RESTAPI_main_js' === $handle ) {
            $tag = '<script type="module" crossorigin src="' . $source . '" ></script>';
        }
         
        return $tag;
    }

    
}

    


?>