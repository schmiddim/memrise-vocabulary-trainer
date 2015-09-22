<?php
/**
 * User: ms
 * Date: 23.09.15
 * Time: 00:05
 */
namespace Memrise\Http;

use Zend\Http\Client;

/**
 * Class JsonCourseInformation
 * @package Memrise\Http
 */
class JsonCourseInformation extends AbstractHttp {

	/**
	 *
	 */
	public function __construct() {
		$this->setPath('course/get/?course_id=');
	}

	/**
	 * @param int $courseId
	 */
	public function get($courseId) {

		$path = $this->getPath();
		$this->setPath($path . $courseId);

		$client = new Client();
		$client->setUri($this->getApiEndpoint() . $this->getPath());

		$client->setMethod(\Zend\Http\Request::METHOD_GET);

		$response = $client->send();

		return $response->getBody();


	}
}