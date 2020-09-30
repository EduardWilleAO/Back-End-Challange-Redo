<?php

/**
* Simple functions for getting all lists.
*/
function getLists($conn){
	$sql = 'SELECT * FROM list';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
};
function getSpecificList($conn, $id){
	$sql = 'SELECT * FROM list WHERE id=:id';
	$stmt = $conn->prepare($sql);
	$stmt->BindParam(":id", $id);
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
};

/**
* Functions for returning tasks or a single task.
*/
function getTasks($conn, $id, $sort){
	if($sort != "" || $sort){
		$sql = 'SELECT * FROM tasks WHERE binding_id=:id ORDER BY duration ' . $sort;
	}  else{
		$sql = 'SELECT * FROM tasks WHERE binding_id=:id';
	}

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$result2 = $stmt->fetchAll();
	return $result2;
};
function getSpecificTask($conn, $id){
	$sql = "SELECT * FROM tasks WHERE task_id=:id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
};

function wordSplitting($word){
	$arr = preg_split('/(?=[A-Z])/', $word);
	foreach ($arr as $key => $row) {
		echo $row . " ";
	}
};

/*
* CRUD functions for the lists
*/
function createList($conn, $title){
	$sql = "INSERT INTO list (title) VALUES (:title)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":title", $title);
	$stmt->execute();

	$conn = null;
};
function deleteList($conn, $id){
	$sql = "DELETE FROM list WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $conn = null; 
}; // voeg toe dat als de lijst word verwijderd dat hij ook alle tasks verwijderd die behoren tot die lijst.
function updateList($conn, $id, $title){
	$sql = "UPDATE list SET title=:title WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":title", $title);
    $stmt->execute();

    $conn = null;
};

/*
* CRUD functions for the tasks within the lists
*/
function createTask($conn, $binding_id, $description, $status, $duration){
	$sql = "INSERT INTO tasks (binding_id, description, status, duration) VALUES (:binding_id, :description, :status, :duration)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":binding_id", $binding_id);
	$stmt->bindParam(":description", $description);
	$stmt->bindParam(":status", $status);
	$stmt->bindParam(":duration", $duration);
	$stmt->execute();

	$conn = null;
};
function deleteTask($conn, $id){
	$sql = "DELETE FROM tasks WHERE task_id=:id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$conn = null;
};
function updateTask($conn, $id, $description, $status, $duration){
	$sql = "UPDATE tasks SET description=:description, status=:status, duration=:duration WHERE task_id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":duration", $duration);
    $stmt->execute();

    $conn = null;

};

?>