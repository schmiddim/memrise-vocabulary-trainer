<?php
/**
 * User: ms
 * Date: 23.09.15
 * Time: 00:20
 */

namespace Memrise\Parser\Html;

use phpQuery;

class VocabularyInformation {

	private $htmlResponse;

	/**
	 * @return string
	 */
	protected function getHtmlResponse() {
		return $this->htmlResponse;
	}

	/**
	 * @param string $htmlResponse
	 */
	protected function setHtmlResponse($htmlResponse) {
		$this->htmlResponse = $htmlResponse;
	}
	public function __construct($htmlResponse) {
		$this->setHtmlResponse($htmlResponse);
	}

	public function getItemIds() {

		phpQuery::newDocumentHTML($this->getHtmlResponse());
		$idArray = array();
		$items = pq('div[data-thing-id]');

		foreach($items as $item) {

			$idArray[] =  pq($item)->attr('data-thing-id')* 1;


		}

		return $idArray;

	}
}