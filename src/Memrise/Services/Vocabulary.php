<?php
/**
 * User: ms
 * Date: 23.09.15
 * Time: 07:56
 */

namespace Memrise\Services;

use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;

/**
 * Class Vocabulary
 * @package Memrise\Services
 */
class Vocabulary implements EventManagerAwareInterface{


	/***
	 * @var int
	 */
	protected $courseId = -1;
	/**
	 * @var null
	 */
	protected $events = null;
	/**
	 * Inject an EventManager instance
	 *
	 * @param  EventManagerInterface $eventManager
	 * @return void
	 */


	public function __construct($courseId) {

	}



	public function setEventManager(EventManagerInterface $eventManager) {
		$eventManager->setIdentifiers(array(
			__CLASS__,
			get_called_class(),
		));
		$this->events = $eventManager;
		return $this;
	}

	/**
	 * Retrieve the event manager
	 *
	 * Lazy-loads an EventManager instance if none registered.
	 *
	 * @return EventManagerInterface
	 */
	public function getEventManager() {
		if (null === $this->events) {
			$this->setEventManager(new EventManager());
		}
		return $this->events;
	}

	/**
	 * @return int
	 */
	protected function getCourseId() {
		return $this->courseId;
	}

	/**
	 * @param int $courseId
	 */
	protected function setCourseId($courseId) {
		$this->courseId = $courseId;
	}



	public function triggerEvent() {
		$this->getEventManager()->trigger('post_Example',__CLASS__, array('payload' => 'foobarto'));
	}



}