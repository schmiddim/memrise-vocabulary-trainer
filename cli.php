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
/**
 * found here http://stackoverflow.com/a/11871948
 * @param $input
 * @param $pad_length
 * @param string $pad_string
 * @param int $pad_type
 * @return string
 */
function mb_str_pad($input, $pad_length, $pad_string = ' ', $pad_type = STR_PAD_RIGHT) {
	mb_internal_encoding('utf-8'); // @important
	$diff = strlen($input) - mb_strlen($input);
	return str_pad($input, $pad_length + $diff, $pad_string, $pad_type);
}

$italianID = 78623;

$cI = new \Memrise\Http\JsonCourseInformation();
$courseInformation = $cI->get($italianID);

foreach ($courseInformation->course->levels as $level) {

	echo '== ' . $level->index . ' ' .  $level->title . " ==\n";

	$vocInfo = new \Memrise\Http\VocabularyResponse();
	$result = $vocInfo->get($level->url);
	$thingInfo = new \Memrise\Parser\Html\VocabularyInformation($result);

	$words = array();
	$maxLenWord = 0;
	foreach ($thingInfo->getItemIds() as $itemId) {
		$thingInfo = new \Memrise\Http\JsonThingInformation();
		$info = $thingInfo->get($itemId);
		$pair = array();
		$pair['foreign'] = $info->thing->columns->{'1'}->val;
		$pair['translation'] = $info->thing->columns->{'2'}->val;

		if (mb_strlen($pair['foreign']) > $maxLenWord) {
			$maxLenWord = mb_strlen($pair['foreign']);
		}
		$words[] = $pair;
	}

	foreach ($words as $word) {
		$str = mb_str_pad($word['foreign'], $maxLenWord + 3, ' ', STR_PAD_RIGHT);
		$str .= $word['translation'] . "\n";
		echo $str;
	}

}
