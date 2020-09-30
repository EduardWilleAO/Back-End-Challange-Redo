<?php 

require "../connect.php";
require "../modal/modal.php";

$redirect = "";
$result2 = getSpecificTask($conn, $_GET["id"]);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    updateTask($conn, $_GET["id"], $_POST["description"], $_POST["status"], $_POST["duration"]);
    $redirect = "../index.php";
};
if($redirect != ""){
    header('Location: ' . $redirect);
    exit();
};

$conn = null;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../css/stylesheet.css" rel="stylesheet" />
    <title></title>
</head>
<body>
    <?php foreach($result2 as $row){ ?>
    <form method="post">
	    <div class="list_wrapper">
		    <div class="list">
				<select name="status" class="status">
					<option class="status NotStarted">NotStarted</option>
					<option class="status Working">Working</option>
					<option class="status Finished">Finished</option>
				</select>
				<textarea name="description" class="description black"><?php print $row["description"]; ?></textarea>
				<input name="duration" class="time" value="<?php print $row["duration"]; ?>" />
			    <input class="submit bg_green" type="submit" value="Save Changes"/>
		    </div>
	    </div>
	</form>	
	<?php } ?>
</body>
</html>