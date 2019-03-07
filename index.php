<?php
use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();

$params = array();

/*  Index 1    */

$params['body'] = array(
    'name' => 'Aditya P',
    'age' => 30,
    'badges' => 8
);

$params['index'] = 'pokemon';

$params['type'] = 'pokemon_trainer';

/*  Index 1 Ends */


/*  Index 2 */

$params['body'] = array(
    'name' => 'Brock',
    'age' => 30,
    'badges' => 8
);

$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['id'] = '1A-000';

/*  Index 2 ends */


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


$result = $client->index($params);


//GET Example
# Finds a single document, useful when we know the id of the document

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['id'] = '1A-002';

$result = $client->get($params);


/* Get example ends */



// Search with specific Fields


$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['match']['age'] = 30;

$result = $client->search($params);

// Search with specific Fields Ends 



// Searching with Arrays

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['bool']['must']['terms']['age'] = array(10,30);

$result = $client->search($params);

// Searching with Arrays ends



// Filtered search

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['filtered']['filter']['range']['age']['gte'] = 10;
$params['body']['query']['filtered']['filter']['range']['age']['lte'] = 50;

$result = $client->search($params);

// Filtered search ends 



/* OR and AND */

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['filtered']['filter']['and'][]['term']['age'] = 10;
$params['body']['query']['filtered']['filter']['and'][]['term']['badges'] = 8;

$result = $client->search($params);


/* OR and AND ends */



/* Limiting results */

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['bool']['must']['terms']['age'] = array(30);
$params['size'] = 3;

$result = $client->search($params);

/* LImiting results ends */




/* Pagination  */

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['body']['query']['bool']['must']['terms']['age'] = array(30);
$params['size'] = 3;
$params['from'] = 10;

$result = $client->search($params);

/* Pagination ends */




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




/* Deleting a document */

$params = [];
$params['index'] = 'pokemon';
$params['type'] = 'pokemon_trainer';
$params['id'] = '1A-002';

$result = $client->delete($params);


/* Deleting a document ends */

echo "<pre>";
print_r($result);