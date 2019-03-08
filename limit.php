<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();

/* Limiting results */

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['bool']['must']['terms']['age'] = array(30);
$params['size'] = 3;

$result = $client->search($params);

/* LImiting results ends */
