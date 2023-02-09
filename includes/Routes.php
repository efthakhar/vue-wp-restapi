<?php


namespace CRUD_RESTAPI;

class Routes{
    function __construct()
    {
        add_action('rest_api_init', [$this, 'rest_routes']);
    }

    function rest_routes()
    {
        register_rest_route( 'crud-restapi/v1', 'posts',
            [ 
                [
                    'methods'  => 'GET',
                    'callback' => [$this,'get_latest_posts_by_category']
                ],
                [
                    'methods'  => 'POST',
                    'callback' => [$this,'insert_doctors']
                ],
        ]);
    }
    
    function insert_doctors( $request)
    {
        $params = $request->get_params();
        $name = $params['name'];
        $email = $params['email'];
        global $wpdb;
        $wpdb->query( "INSERT INTO wp_doctors(name,email) VALUES( '$name','$email')" );
        
    }

    function get_latest_posts_by_category()
    {
        
        global $wpdb;
        return $results = $wpdb->get_results( "SELECT * FROM wp_doctors");
    }
}

    


?>