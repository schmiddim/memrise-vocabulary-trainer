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
$courseInformation = $cI->get($italianID);

foreach($courseInformation->course->levels as $level) {

	echo $level->title . "\n";
	$vocInfo = new \Memrise\Http\VocabularyResponse();
	$result = $vocInfo->get($level->url);
	$thingInfo = new \Memrise\Parser\Html\VocabularyInformation($result);

	foreach($thingInfo->getItemIds() as $itemId) {
		$thingInfo = new \Memrise\Http\JsonThingInformation();
		$info  =$thingInfo->get($itemId);

		$foreign=  $info->thing->columns->{'1'}->val;
		$translation = $info->thing->columns->{'2'}->val;
		echo $info->thing->columns->{'1'}->val . "\t" . $translation ."\n" ;

	}

}
