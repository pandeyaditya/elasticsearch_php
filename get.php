<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();

$params = array();


//GET Example
# Finds a single document, useful when we know the id of the document

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['id'] = '1A-002';

$result = $client->get($params);


/* Get example ends */