<?php

require "connect.php";
require "modal/modal.php";

$result = getLists($conn);
$sort = $_GET["sort"];

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/stylesheet.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/6185da5d11.js" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
    <div id="navBarHitbox"></div>
    <div id="navBar">
        <div>Challange Back-end (ToDo List)</div>
        <a href="index.php?sort=DESC">Sort Up:<i class="fas fa-arrow-up"></i></a>
        <a href="index.php?sort=ASC">Sort Down:<i class="fas fa-arrow-down"></i></a>

        <a href="index.php?filter=NotStarted">Filter Status: <div class="status NotStarted">Not Started</div></a>
        <a href="index.php?filter=Working">Filter Status: <div class="status Working">Working</div></a>
        <a href="index.php?filter=Finished">Filter Status: <div class="status Finished">Finished</div></a>
    </div>
    
    <div id="gridContainer">
        <?php foreach($result as $row) { ?>
        <div class="list_wrapper">
            <div class="list">
            
                <h4 class="title"><?php print $row["title"]; ?>
                    <a href="delete.php?id=<?php print $row["id"] ?>" class="delete_list"><i class="far fa-trash-alt"></i></a>
                    <a href="update.php?id=<?php print $row["id"] ?>" class="update_list"><i class="fas fa-wrench"></i></a>
                </h4>
            
                <div class="task_list">
                    <?php 
                        if($sort != "" || $sort){ 
                            $result2 = getTasks($conn, $row["id"], $sort); 
                        }  else {
                            $result2 = getTasks($conn, $row["id"], $sort);
                        } 
                    ?>
                    <?php foreach($result2 as $row2) { ?>
                    <div class="task">
                        <div class="status <?php print $row2['status']; ?>"><?php wordSplitting($row2['status']); ?></div>
                        <a href="tasks/deleteTask.php?id=<?php print $row2["task_id"] ?>" class="delete_list opacity"><i class="far fa-trash-alt"></i></a>
                        <a href="tasks/updateTask.php?id=<?php print $row2["task_id"] ?>" class="update_list opacity"><i class="fas fa-wrench"></i></a>
                        <div class="description"><?php print $row2["description"]; ?></div>
                        <div class="time"><?php print $row2["duration"]; ?></div>
                    </div>
                    <?php } ?>
                </div>

                <a href="tasks/createTask.php?binding_id=<?php print $row['id']; ?>" class="add_task">+ Add another task</a>
            </div>
        </div>
        <?php } ?>
    
        <div class="list_wrapper">
            <div class="list last_list">
                <a href="create.php" class="add_list">+ Add another task</div>
            </div>
        </div>
    </div>
</body>
</html>