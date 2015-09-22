<?php
/**
 * User: ms
 * Date: 23.09.15
 * Time: 00:25
 */
namespace Memrise\Http;
use Zend\Http\Client;


class VocabularyResponse  extends AbstractHttp{
	/**
	 * @param $path
	 */
	public function get($path) {

		$this->setPath($path);
		$url = $this->getDomain() . $this->getPath();
		$client = new Client();
		$client->setUri($url);
		$client->setMethod(\Zend\Http\Request::METHOD_GET);
		$response = $client->send();
		return $response->getBody();

	}

}