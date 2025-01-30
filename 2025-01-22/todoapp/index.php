<?php
session_start();
require_once('./config.php');
require_once("./database/init.php");
require_once('./handlers/get_tasks.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple To-Do App</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">To-Do List</h1>

        <div class="row justify-content-center">
            <div class="col-md-10 row-md-10">
                <?php
                $state = "";
                if (isset($_SESSION["error"])) {
                    $state = "error";
                } elseif (isset($_SESSION["success"])) {
                    $state = "success";
                }

                if (!empty($state)): ?>
                    <div class="alert alert-<?= $state == "error" ? "danger" : "success" ?>">
                        <?php
                        echo $_SESSION[$state];
                        unset($_SESSION[$state]);
                        ?>
                    </div>
                <?php endif; ?>

                <form
                    class="input-group mb-3 p-1"
                    method="post"
                    action="./handlers/add_task.php">
                    <input
                        type="text"
                        id="task"
                        name="task"
                        class="form-control p-3"
                        placeholder="Enter a new task..." />
                    <button class="btn btn-primary p-3" type="submit">Add</button>
                </form>

                <div class="bg-light rounded p-4">
                    <ul id="tasks" class="list-group">
                        <?php if (isset($tasks)): ?>
                            <?php foreach (array_reverse($tasks) as $task): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-4 gap-2 task-item">
                                    <!-- Task text -->
                                    <span class="fs-5 mb-0 view-mode"><?= $task['task'] ?></span>

                                    <form class="edit-mode w-100" method="POST" action="./handlers/update_task.php" style="display: none;">
                                        <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                        <div class="input-group">
                                            <input type="text" name="task"
                                                value="<?= $task['task'] ?>"
                                                class="form-control">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-save"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary cancel-edit">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </form>

                                    <div class="d-flex gap-3">
                                        <button class="text-primary btn btn-link p-0 edit-btn">
                                            <i class="fa fa-edit fa-2xl"></i>
                                        </button>
                                        <a href="./handlers/delete_task.php?id=<?php echo $task["id"]; ?>" class="text-danger">
                                            <i class="fa fa-trash fa-2xl"></i>
                                        </a>
                                    </div>

                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="./helpers/scripts.js"></script>

</body>

</html>