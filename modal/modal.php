<?php

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