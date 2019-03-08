<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();

// Search with specific Fields


$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['match']['age'] = 30;

$result = $client->search($params);

// Search with specific Fields Ends 
