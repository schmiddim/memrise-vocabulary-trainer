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
class Vocabulary implements EventManagerAwareInterface {

	const EVENT_COURSE_INFORMATION = 'get_course_information';

	const EVENT_GET_LEVELS = 'get_levels';

	const EVENT_GET_THING_IDS = 'get_thing_ids';

	const EVENT_GET_THING = 'get_thing';


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
		$this->setCourseId($courseId);
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
		if (false === is_int($courseId) || -1 === $courseId) {
			throw new \Exception('invalid courseID');
		}
		$this->courseId = $courseId;
	}

	public function process() {
		$this->getEventManager()->trigger(self::EVENT_COURSE_INFORMATION, __CLASS__, array('courseId' => $this->getCourseId()));
	}

}