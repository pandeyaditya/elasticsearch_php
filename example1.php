<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();
/*  Index 1    */

$params['body'] = array(
    'name' => 'Aditya P',
    'age' => 30,
    'badges' => 8
);

$params['index'] = 'pokemon';

$params['type'] = 'pokemon_trainer';

/*  Index 1 Ends */
