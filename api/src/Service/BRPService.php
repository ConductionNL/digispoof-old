<?php
// src/Service/BRPService.php
namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use GuzzleHttp\Client;

class BRPService
{
	private $params;
	private $client;
	
	public function __construct(ParameterBagInterface $params)
	{
		$this->params = $params;
		
		$this->client= new Client([
				// Base URI is used with relative requests
				'base_uri' => 'https://brp.zaakonline.nl/',
				// You can set any number of default request options.
				'timeout'  => 4000.0,
		]);
	}
	
	public function getAllPersons()
	{
		$response = $this->client->request('GET','/ingeschrevenpersonen/');
		
		$response = json_decode($response->getBody(), true);
		return $response['_embedded'];
	}
	
	public function getPersonOnBsn($bsn)
	{		
		$response = $this->client->request('GET','/ingeschrevenpersonen/'.$bsn);
		
		$response = json_decode($response->getBody(), true);
		return $response;
	}
	
}
