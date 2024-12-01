<?php

namespace Elvismdev\Intrinio;

use Requests;

/**
 * Intrinio Client
 */
class Intrinio
{

	const API_HOST = 'https://api-v2.intrinio.com';

	/**
	 * @var string
	 */
	protected $options;
	protected $token;

	/**
	 * Intrinio constructor.
	 *
	 * @param string $username
	 * @param string $password
	 */
	function __construct($username, $password, $token)
	{
		$this->options = array(
			'auth' => array($username, $password)
		);

		$this->token = $token;
	}


	/**
	 * Make API request to Intrino.
	 *
	 * @param string $slug
	 * @param array $params
	 */
	public function request($slug, $params = [])
	{
		$headers = array(
			'Accept'          => 'application/json',
			'Accept-Encoding' => 'gzip, deflate',
			'Authorization'   => 'Bearer ' . $this->token
		);
		$uri = $this->uriConstruct($slug, $params);
		$response = Requests::get($uri, $headers, $this->options);

		return $response->body;
	}


	/**
	 * Construct full request URI
	 *
	 * @param string $slug
	 * @param array $params
	 * @return string
	 */
	private function uriConstruct($slug, $params)
	{
		$uri = self::API_HOST . '/' . $slug;
		if ($params) {
			$queryData = http_build_query($params);
			$uri .= '?' . $queryData;
		}

		return $uri;
	}
}
