<?php

$connection = mysqli_connect("localhost", "root", "root");
$db = mysqli_select_db($connection, 'login_db');


if(isset($_POST['delete_task'])){
    $id = $_POST['delete_task'];
    $query = "DELETE FROM tasks WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
        {
            echo 'data updated';
            header("Location: tasks.php");
        }else {
            echo 'data not updated';
            header("Location: tasks.php");
        }
}

if(isset($_POST['updatedata'])){

    $id = $_POST['update_id'];


    $description = $_POST["description"];
    $contact = $_POST["contact"];
    $member = $_POST["member"];
    $status = $_POST["status"];

    $query = "UPDATE tasks SET description='$description', contact='$contact', member='$member', status='$status' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo 'data updated';
        header("Location: tasks.php");
    }else {
        echo 'data not updated';
        header("Location: tasks.php");
    }

}


?>