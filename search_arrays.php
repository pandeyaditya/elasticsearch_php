<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();





// Searching with Arrays

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['bool']['must']['terms']['age'] = array(10,30);

$result = $client->search($params);

// Searching with Arrays ends
