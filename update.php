<!DOCTYPE html>

<?php include 'db.php';

$taskId = (int)$_GET['id'];

$selectFromWhereQuery = "select * from tasks where id='$taskId'";

$rows = $db->query($selectFromWhereQuery);

$row = $rows->fetch_assoc();

if (isset($_POST['send'])) {
    $task = htmlspecialchars($_POST['task']);
    $updateQuery = "update tasks set name='$task' where id ='$taskId'";
    $db->query($updateQuery);

    header('location: index.php');
}

?>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <title>To-Do-list Koen Tibben</title>
</head>
<body>

<div class="container">
    <div class="row" style="margin-top: 70px;">
        <center><h1>Edit Task</h1></center>
        <div class="col-md-10 col-md-offset-1">
            <table class="table">
                <hr>
                <br>
                <form method="post">
                    <div class="form-group">
                        <label>Task Name</label>
                        <input type="text" required name="task" value="<?php echo $row['name']; ?>"
                               class="form-control">
                    </div>
                    <input type="submit" name="send" value="Edit Task" class="btn btn-success">
                    <a href="index.php" class="btn btn-warning">Back to To-Do List</a>
                </form>
        </div>
    </div>
</div>
</body>
</html>