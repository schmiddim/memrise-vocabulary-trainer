<?php
/**
 * User: ms
 * Date: 23.09.15
 * Time: 00:12
 */

namespace Memrise\Http;

use Zend\Http\Client;


class JsonLevelInformation extends AbstractHttp {
	public function __construct() {
		$this->setPath('level/get/?level_id=');

	}

	/**
	 * @param int $levelId
	 */
	public function get($levelId) {

		$path = $this->getPath();
		$this->setPath($path . $levelId);

		$client = new Client();
		$client->setUri($this->getApiEndpoint() . $this->getPath());
		$client->setMethod(\Zend\Http\Request::METHOD_GET);

		$response = $client->send();

		return $response->getBody();


	}

}