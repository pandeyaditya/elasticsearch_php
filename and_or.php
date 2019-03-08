<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();

/* OR and AND */

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['filtered']['filter']['and'][]['term']['age'] = 10;
$params['body']['query']['filtered']['filter']['or'][]['term']['badges'] = 8;

$result = $client->search($params);


/* OR and AND ends */