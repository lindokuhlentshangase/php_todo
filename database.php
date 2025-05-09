<?php 
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "todo1";
$conn = "";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if ($conn){
    //echo "You are connected!";
} else{
    echo "Failed to connect";
}


if (isset($_POST["submit"])){
    $task = $_POST["task"];

    $stmt = $conn->prepare("INSERT INTO tasks (task) VALUES (?)");
    $stmt->bind_param("s", $task);
    $stmt->execute();
    
header('Location: index.php');
}

if (isset($_POST['delete_task'])){
    $id = $_POST['delete_id'];

    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header('Location: index.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];
    $conn->query("UPDATE tasks SET task = '$task' WHERE id = $id");
}

if (isset($_POST['save_task'])) {
    $id = $_POST['id'];
    $updated_task = $_POST['updated_task'];
    $stmt = $conn->prepare("UPDATE tasks SET task = ? WHERE id = ?");
    $stmt->bind_param("si", $updated_task, $id);
    $stmt->execute();
    header('Location: index.php');
    exit();
}

$edit_id = isset($_POST['edit_id']) ? $_POST['edit_id'] : null;
$tasks = mysqli_query($conn,"SELECT * FROM tasks");


?>

