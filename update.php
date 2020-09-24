<?php 

require "connect.php";
require "modal/modal.php";

$result = getSpecificList($conn, $_GET["id"]);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    updateList($conn, $_GET["id"], $_POST["title"]);
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
			    <input name="title" class="title" value="<?php print $row["title"]; ?>"/>
			    <input class="submit bg_green" type="submit" value="Save Changes"/>
		    </div>
	    </div>
	</form>	
	<?php } ?>
</body>
</html>