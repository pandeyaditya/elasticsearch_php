<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();

/* Updating a document  */

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['id'] = '1A-000';

$result = $client->get($params);

$result['_source']['age'] = 21; // Update existing field

$result['_source']['pokemon'] = array(
    'Onix' => array(
        'type' => 'rock',
        'moves' => array(
            'Rock Slide' => array(
                'power' => 100,
                'pp' => 40
            ),
            'Earthquake' => array(
                'power' => 200,
                'pp' => 100
            )
        )
    )
);

$params['body']['doc'] = $result['_source'];

$result = $client->update($params);

/* Updating a document ends */