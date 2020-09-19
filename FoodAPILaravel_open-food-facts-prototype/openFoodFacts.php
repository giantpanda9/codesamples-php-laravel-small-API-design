<?php
function main() {
	require_once dirname(__FILE__) . "/classes/class_parseOpenFoodFacts.php";
	$parseOpenFoodFactsInstance = new parseOpenFoodFacts();
	$parseOpenFoodFactsResponse = $parseOpenFoodFactsInstance->getResponse(1,"");
	$content = print_r($parseOpenFoodFactsResponse,1);
	echo $content . "\n";
	$filename = "test.txt";
	//file_put_contents($filename, $content);
}
main();
?>
