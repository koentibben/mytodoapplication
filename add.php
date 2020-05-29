<?php
include 'db.php';


if (isset($_POST['send'])) {

    $taskName = htmlspecialchars($_POST['task']);

    $addTaskQuery = "insert into tasks (name) values ('$taskName')";

    $taskIsAdded = $db->query($addTaskQuery);

    if ($taskIsAdded) {
        header('location: index.php');
    }

}