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
function getSpecificList($conn, $id){
	$sql = 'SELECT * FROM list WHERE id=:id';
	$stmt = $conn->prepare($sql);
	$stmt->BindParam(":id", $id);
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
	foreach ($arr as $key => $row) {
	echo $row . " ";
	}
}

/*
* Functions for updating list contents within the database
*/
function createList($conn, $title){
	$sql = "INSERT INTO list (title) VALUES (:title)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":title", $title);
	$stmt->execute();

	$conn = null;
}
function deleteList($conn, $id){
	$sql = "DELETE FROM list WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $conn = null;
}
function updateList($conn, $id, $title){
	$sql = "UPDATE list SET title=:title WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":title", $title);
    $stmt->execute();

    $conn = null;
}

function createTask($conn, $binding_id, $description, $status, $duration){
	$sql = "INSERT INTO tasks (binding_id, description, status, duration) VALUES (:binding_id, :description, :status, :duration)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":binding_id", $binding_id);
	$stmt->bindParam(":description", $description);
	$stmt->bindParam(":status", $status);
	$stmt->bindParam(":duration", $duration);
	$stmt->execute();

	$conn = null;
}
function deleteTask(){

}
function updateTask(){

}

?>