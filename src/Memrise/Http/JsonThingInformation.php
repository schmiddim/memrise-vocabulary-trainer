<?php
/**
 * User: ms
 * Date: 23.09.15
 * Time: 00:47
 */

namespace Memrise\Http;
use Zend\Http\Client;

class JsonThingInformation  extends AbstractHttp {
	public function __construct() {
		$this->setPath('thing/get/?thing_id=');
	}

	/**
	 * @param int $thingId
	 */
	public function get($thingId) {

		$path = $this->getPath();
		$this->setPath($path . $thingId);

		$client = new Client();
		$client->setUri($this->getApiEndpoint() . $this->getPath());

		$client->setMethod(\Zend\Http\Request::METHOD_GET);

		$response = $client->send();

		return $response->getBody();


	}
}