<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();

$params = array();



/*  Index 2 */

$params['body'] = array(
    'name' => 'Brock',
    'age' => 30,
    'badges' => 8
);

$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['id'] = '1A-000';

/*  Index 2 ends */
