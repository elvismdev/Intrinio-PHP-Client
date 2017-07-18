<?php

require_once __DIR__ . '/vendor/autoload.php';

use Elvismdev\Intrinio\Intrinio;


$intrinio = new Intrinio(
	'359afa799e7886a1ada567d2737819e5', 	// username
	'a989e10198656f1797b88ceef378a409'		// password
	);


$params = [
'identifier'	=> 'AAPL',
'item'			=> 'totalcurrentassets',
'type'			=> 'QTR'
];
$historical_data = $intrinio->request('historical_data', $params);

echo $historical_data;