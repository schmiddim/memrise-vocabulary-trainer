<?php
/**
 * User: ms
 * Date: 23.09.15
 * Time: 00:57
 */
namespace Memrise\Factories;

use Memrise\Http\JsonThingInformation;


class Things {
	/**
	 * @var JsonThingInformation|null
	 */
	private $jsonThingInformation = null;

	/**
	 * @var array
	 */
	private $ids = array();

	public function __construct(JsonThingInformation $jsonThingInformation, $ids) {
		$this->setJsonThingInformation($jsonThingInformation);
		$this->setIds($ids);

	}

	/**
	 * @return JsonThingInformation|null
	 */
	public function getJsonThingInformation() {
		return $this->jsonThingInformation;
	}

	/**
	 * @param JsonThingInformation|null $jsonThingInformation
	 */
	protected function setJsonThingInformation($jsonThingInformation) {
		$this->jsonThingInformation = $jsonThingInformation;
	}

	/**
	 * @return array
	 */
	protected function getIds() {
		return $this->ids;
	}

	/**
	 * @param array $ids
	 */
	protected function setIds($ids) {
		$this->ids = $ids;
	}

	public function getItems() {
		foreach ($this->getIds() as $id) {

			echo $this->getJsonThingInformation()->get($id);

		}
	}


}