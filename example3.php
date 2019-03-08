<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();

$params = array();


/*  Index 3 */
$params['body'] = array(
    'name' => 'Misty',
    'age' => 30,
    'badges' => 8,
    'pokemon' => array(
        'psyduck' => array(
            'type' => 'water',
            'moves' => array(
                'Water Gun' => array(
                    'pp' => 25,
                    'power' => 40
                )
            )
        )
    )
);

$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['id'] = '1A-002';


/*  Index 3 ends */
