<?php

require "../connect.php";
require "../modal/modal.php";

$redirect = "";
$result = getSpecificTask($conn, $_GET["id"]);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	deleteTask($conn, $_GET["id"]);
	$redirect = "../index.php";
}

if($redirect != ""){
	header("Location: " . $redirect);
	exit();
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="../css/stylesheet.css" rel="stylesheet" />	
    <title></title>
</head>
<body>
	<?php foreach($result as $row){ ?>
		<form method="post">
		<div class="list_wrapper">
			<div class="list">
				<h4 name="title" class="title">Do you want to delete task with description<br><i class="red">"<?php print $row["description"]; ?>"</i></h4>
				<input class="delete" type="submit" value="Delete"/>
			</div>
		</div>
		</form>	
	<?php } ?>
</body>
</html>