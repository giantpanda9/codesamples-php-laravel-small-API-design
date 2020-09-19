<?php
class parseOpenFoodFacts {
	function __construct() {
		$this->pageSize = 20;
	}
	function getURL($pageNo = 1, $productName = "") {
		$action = "process";
		$sortBy = "unique_scans_n";
		$pageSize = $this->pageSize;
		$baseUrl = "https://world.openfoodfacts.org/cgi/search.pl";
		$returned = "";
		if ($productName == "") {
			$returned = sprintf("%s?action=%s&sort_by=%s&page_size=%s&page=%s&json=1",$baseUrl,$action,$sortBy,$pageSize,$pageNo);
		} else {
			$productName = urlencode($productName);
			$returned = sprintf("%s?action=%s&sort_by=%s&page_size=%s&page=%s&search_terms=%s&json=1",$baseUrl,$action,$sortBy,$pageSize,$pageNo,$productName);
		}
		return $returned;
	}
	public function getResponse($pageNo = 1, $productName = "") {
		$APIUrl = $this->getURL($pageNo, $productName);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $APIUrl);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		if (curl_errno($curl)) {
			curl_close($curl);
			return [];
		}
		curl_close($curl);
		$responseJSON = json_decode($result);
		$pageSize = $this->pageSize;
		$resultsCount = intval($responseJSON->count);
		echo "\n";
		$result = array();
		$result["lastPage"] = round($resultsCount/$pageSize,0); //Approximate count of the last page for pagination
		$result["products"] = array();
		$responseJSON = $responseJSON->products;
		foreach ($responseJSON as $foodFact) {
			$returnedItem = array();
			if (isset($foodFact->id) && isset($foodFact->image_url) && isset($foodFact->product_name) && isset($foodFact->categories)) {
				$returnedItem["ID"] = strval($foodFact->id) ?: "N/A";
				$returnedItem["Image"] = strval($foodFact->image_url) ?: "N/A";
				$returnedItem["Name"] = strval($foodFact->product_name) ?: "N/A";
				$returnedItem["Category"] = strval($foodFact->categories) ?: "N/A";
				array_push($result["products"],$returnedItem);
			}
		}
		return $result;
	}
}
?>
