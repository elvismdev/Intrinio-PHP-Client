# Intrinio PHP Client

Unofficial and simple Intrinio API client for PHP. Gives easy access to stock market data.

## Requirements
- PHP 7.0+

## Installation
```
composer require elvismdev/intrinio dev-master
```

## Example Usage
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
use Elvismdev\Intrinio\Intrinio;

$intrinio = new Intrinio(
	'INTRINIO_API_USERNAME',
	'INTRINIO_API_PASSWORD'
	);

// All companies covered by Intrinio.
$companies = $intrinio->request('companies');
print_r($companies);

// Single company information
$params = [
'identifier'	=> 'AAPL'
];
$company = $intrinio->request(
	'companies',
	$params
	);
print_r($company);

// Historical data for single company.
$params = [
'identifier'	=> 'AAPL'
];
$historical_data = $intrinio->request(
	'historical_data',
	$params
	);
print_r($historical_data);

// Total current assets data for single company, in a quaterly period.
$params = [
'identifier'	=> 'AAPL',
'item'		=> 'totalcurrentassets',
'type'		=> 'QTR'
];
$totalcurrentassets = $intrinio->request(
	'historical_data',
	$params
	);
print_r($totalcurrentassets);
```

Follow up the [official Intrino API documentation](http://docs.intrinio.com/#u-s-public-company-data-feed) and query with corresponding endpoint slug and parameters like in the example codes above.
