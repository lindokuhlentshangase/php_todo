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

$tasks = mysqli_query($conn,"SELECT * FROM  tasks");


?>

