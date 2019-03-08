<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();

/* Deleting a document */

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['id'] = '1A-002';

$result = $client->delete($params);


/* Deleting a document ends */
