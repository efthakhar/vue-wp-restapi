<?php

namespace CRUD_RESTAPI;

class Database{

    

    function __construct()
    {

        $this->create_tables();
    }
    

    function create_tables()
    {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
    
        $table_name = $wpdb->prefix . 'doctors';
    
        $sql =  "CREATE TABLE `$table_name` 
                (
                    `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
                    `name` varchar(220) DEFAULT NULL,
                    `email` varchar(220) DEFAULT NULL,
                     PRIMARY KEY(doctor_id)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
                ";

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
        
    }

    static function delete_tables()
    {
        global $wpdb;
        $tableArray = [   
            $wpdb->prefix . "doctors",
        ];

      foreach ($tableArray as $tablename) 
      {
        $wpdb->query("DROP TABLE IF EXISTS $tablename");
      }
    }
}

    


?>