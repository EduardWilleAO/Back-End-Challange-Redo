<?php

require "connect.php";
require "modal/modal.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	createList($conn, $_POST["title"]);
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
				<input name="title" class="title" placeholder="List title"/>
				<input class="submit" type="submit"/>
			</div>
		</div>
	</form>	
</body>
</html>