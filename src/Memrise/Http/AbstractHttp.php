<?php
/**
 * User: ms
 * Date: 23.09.15
 * Time: 00:06
 */

namespace Memrise\Http;

/**
 * Class AbstractHttp
 * @package Memrise\Http
 */
class AbstractHttp {

	/**
	 * @var string
	 */
	protected $domain = 'http://www.memrise.com';
	/**
	 * @var string
	 */
	protected $apiPath = '/api/';
	/**
	 * @var string
	 */
	protected $endpoint = 'http://www.memrise.com/api/';
	/**
	 * @var string
	 */
	protected $path = '';

	/**
	 * @return string
	 */
	protected function getApiEndpoint() {
		return $this->domain . $this->apiPath;
	}

	/**
	 * @return string
	 */
	public function getDomain() {
		return $this->domain;
	}


	/**
	 * @return string
	 */
	protected function getPath() {
		return $this->path;
	}

	/**
	 * @param string $path
	 */
	protected function setPath($path) {
		$this->path = $path;
	}

}