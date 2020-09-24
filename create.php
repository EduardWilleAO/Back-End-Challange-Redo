<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	require "connect.php";

	$sql = "INSERT INTO list (name) VALUES (:name)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":name", $_POST["title"]);
	$stmt->execute();

	$conn = null;

	header ('Location: index.php');
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="css/stylesheet.css" rel="stylesheet" />	
    <title></title>
</head>
<body>
	<form method="post">
	<div class="list_wrapper">
		<div class="list">
			<input name="title" class="title" placeholder="List Name"/>
			<input class="submit" type="submit"/>
		</div>
	</div>
	</form>	
</body>
</html>