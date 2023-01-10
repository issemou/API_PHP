<?php

/**
 * headers
 */

header('Access-Control-Allow-Origin', '*');
header('Content-Type', 'application/json');

/**
 * initialize Api
 */
require_once('../_config/initialize.php');
AutoloaderClassOFApi::register();

/**
 * instantiate Classes
 */
$authors = Authors::getallAuthors();

/**
 * Blog Authors Query
 */
$results = $authors;

/**
 * get the row count
 */

$num = count($results);

if ($num>0){

    $authors_arr = array();
    $authors_arr['data'] = array();

    while ($row = $authors->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $authors_items = array(

            'id' =>$id,
            'firstname' =>$firstname,
            'lastname' => $lastname
        );
        array_push($authors_arr['data'],$authors_items);
    }

    /**
     * Convert to json and output
     */

    echo json_encode($authors_arr);
}
else{

    echo  json_encode(array('message'=>"No authors found"));
}