<?php

require "connect.php";
require "modal/modal.php";

$result = getLists($conn);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/stylesheet.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/6185da5d11.js" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
    <?php foreach($result as $row) { ?>
    <div class="list_wrapper">
        <div class="list">
            
            <h4 class="title"><?php print $row["title"]; ?>
                <a href="delete.php?id=<?php print $row["id"] ?>" class="delete_list"><i class="far fa-trash-alt"></i></a>
                <a href="update.php?id=<?php print $row["id"] ?>" class="update_list"><i class="fas fa-wrench"></i></a>
            </h4>
            
            <div class="task_list">
                <?php $result2 = getSpecificTasks($conn, $row["id"]); ?>
                <?php foreach($result2 as $row2) { ?>
                <div class="task">
                    <div class="status <?php print $row2['status']; ?>"><?php wordSplitting($row2['status']); ?></div>
                    <div class="description"><?php print $row2["description"]; ?></div>
                    <div class="time"><?php print $row2["duration"]; ?></div>
                </div>
                <?php } ?>
            </div>
            <a href="" class="add_task">+ Add another task</div>
        </div>
    </div>
    <?php } ?>
    
    <div class="list_wrapper">
        <div class="list last_list">
            <a href="create.php" class="add_list">+ Add another task</div>
        </div>
    </div>
</body>
</html>