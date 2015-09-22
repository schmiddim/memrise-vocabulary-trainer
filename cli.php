<?php
/**
 * User: ms
 * Date: 23.09.15
 * Time: 00:02
 *
 * Github
 *
 * https://github.com/carpiediem/memrise-enhancement-suite/wiki/Unofficial-Documentation-for-the-Memrise-API
 *
 *
 *
 * Course
 *
 * http://www.memrise.com/api/course/get/?course_id=78623
 *
 * Level
 *
 * http://www.memrise.com/api/level/get/?level_id=614731
 *
 * Thing  id's missing
 */

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$italianID = 78623;


$cI = new \Memrise\Http\JsonCourseInformation();

$cI->get($italianID);


$level = new \Memrise\Http\JsonLevelInformation(614731);
$result = $level->get(614731);


$vocInfo = new \Memrise\Http\VocabularyResponse();
$result = $vocInfo->get("/course/78623/learn-basic-italian/6/");



$a  = new \Memrise\Parser\Html\VocabularyInformation($result);
var_dump($a->getItemIds()) ;


//get info about the vocabulary with the id http://www.memrise.com/api/thing/get/?thing_id=14214352