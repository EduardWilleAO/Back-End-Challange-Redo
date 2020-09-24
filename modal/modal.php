<?php

/**
* Simple function for getting all the lists, this is here for separation from the index.
*/
function getLists($conn){
	$sql = 'SELECT * FROM list';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}

/**
* This function returns only a single task belonging to a spefic list given with $id.
* This is needed for the front end because like "Trello" I want each task separated in containers.
*/
function getSpecificTasks($conn, $id){
	$sql = 'SELECT * FROM tasks WHERE binding_id=:id';
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$result2 = $stmt->fetchAll();
	return $result2;
};

/**
* this function is needed for "Not Started"
* I want these words separated so it looks nice,
* this is the way I found to achieve that.
*/
function wordSplitting($word){
	$arr = preg_split('/(?=[A-Z])/', $word);
	foreach ($arr as $key => $value) {
	echo $value . " ";
	}
}

?>