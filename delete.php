<?php

include 'db.php';

$id = (int)$_GET['id'];

$deleteQuery = "delete from tasks where id = '$id'";

$taskIsDeleted = $db->query($deleteQuery);

if ($taskIsDeleted) {
    header('location: index.php');
}