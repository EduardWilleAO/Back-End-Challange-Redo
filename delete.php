<?php

require "connect.php";
require "modal/modal.php";

$result = getSpecificList($conn, $_GET["id"]);
$result2 = getTasks($conn, $_GET["id"], "", "");
$redirect = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    deleteList($conn, $_GET["id"]);
	$redirect = "index.php";
}

if($redirect != ""){
	header("Location: " . $redirect);
	exit();
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="css/stylesheet.css" rel="stylesheet" />	
    <title></title>
</head>
<body>
	<div id="gridContainer">
		<?php foreach($result as $row){ ?>
			<form method="post">
			<div class="list_wrapper">
				<div class="list">
					<h4 name="title" class="title">Do you want to delete list<br><i class="red">"<?php print $row["title"]; ?>"</i></h4>
					<input class="delete" type="submit" value="Delete"/>
				</div>
			</div>
			</form>	
		<?php foreach($result2 as $row2){ ?>
			<form method="post">
			<div class="list_wrapper">
				<div class="list">
					<h4 name="title" class="title">Because you're deleting <i class="red">"<?php print $row["title"]; ?>"</i><br> 
					task<br><i class="red">"<?php print $row2["description"]; ?>"</i> will also delete</h4>
				</div>
			</div>
			</form>	
		<?php } ?>
		<?php } ?>
	</div>
</body>
</html>