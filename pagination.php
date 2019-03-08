<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();

/* Pagination  */

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['bool']['must']['terms']['age'] = array(30);
$params['size'] = 3;
$params['from'] = 10;

$result = $client->search($params);

/* Pagination ends */
