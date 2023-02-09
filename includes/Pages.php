<?php

namespace CRUD_RESTAPI;

class Pages{

    function __construct()
    {
     add_action( 'admin_menu', [$this,'CRUD_RESTAPI_register_admin_page'] );
    }


    function CRUD_RESTAPI_register_admin_page() 
    {
        add_menu_page(
            __( 'crud-restapi', 'crud-restapi' ),
            __( 'crud-restapi', 'crud-restapi' ),
            'manage_options',
            'crud-restapi',
            [$this,'CRUD_RESTAPI_admin_page_contents'],
            'dashicons-schedule',
            3
        );

        add_submenu_page(
            'crud-restapi',
            __( 'home', 'textdomain' ),
            __( 'home', 'textdomain' ),
            'manage_options',
            'admin.php?page=crud-restapi#/',
            NULL
        );

        add_submenu_page(
            'crud-restapi',
            __( 'about', 'textdomain' ),
            __( 'about', 'textdomain' ),
            'manage_options',
            'admin.php?page=crud-restapi#/about',
            NULL
        );

        remove_submenu_page('crud-restapi', 'crud-restapi');
    }




    function CRUD_RESTAPI_admin_page_contents() 
    {
        ?>
            <div id="app"></div>
        <?php
    
    }



function books_ref_page_callback() { 
    ?>
    <div class="wrap">
        <h1><?php _e( 'Books Shortcode Reference', 'textdomain' ); ?></h1>
        <p><?php _e( 'Helpful stuff here', 'textdomain' ); ?></p>
    </div>
    <?php
}
}

    


?>