<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();

// Filtered search

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['filtered']['filter']['range']['age']['gte'] = 10;
$params['body']['query']['filtered']['filter']['range']['age']['lte'] = 50;

$result = $client->search($params);

// Filtered search ends 
