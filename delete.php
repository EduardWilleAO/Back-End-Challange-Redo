<?php

require "connect.php";
require "modal/modal.php";

$result = getSpecificList($conn, $_GET["id"]);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    deleteList($conn, $_GET["id"]);
}

$conn = null;

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="css/stylesheet.css" rel="stylesheet" />	
    <title></title>
</head>
<body>
	<?php foreach($result as $row){ ?>
		<form method="post">
		<div class="list_wrapper">
			<div class="list">
				<h4 name="title" class="title">Do you want to delete <br> <i class="red">"<?php print $row["title"]; ?>"</i></h4>
				<input class="delete" type="submit" value="Delete"/>
			</div>
		</div>
		</form>	
	<?php } ?>
</body>
</html>