<?php

require "../connect.php";
require "../modal/modal.php";

$redirect = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	createTask($conn, $_GET["binding_id"], $_POST["description"], $_POST["status"], $_POST["duration"]);
	$redirect = "../index.php";
}

if($redirect != ""){
	header ('Location: ' . $redirect);
	exit();
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="../css/stylesheet.css" rel="stylesheet" />	
    <title></title>
</head>
<body>
	<form method="post">
		<div class="list_wrapper">
			<div class="list">
				<select name="status" class="" placeholder="">
					<option class="status NotStarted">NotStarted</option>
					<option class="status Working">Working</option>
					<option class="status Finished">Finished</option>
				</select>
				<input type="text" name="description" class="description" placeholder="Fill in a description"/>
				<input type="text" name="duration" class="time" placeholder="0:00-12:00"/>
				<input class="submit" type="submit"/>
			</div>
		</div>
	</form>	
</body>
</html>