<?php

include "login_db.php";

$connection = mysqli_connect("localhost", "root", "root");
$db = mysqli_select_db($connection, 'login_db');


if(isset($_POST['delete_contact'])){
    $id = $_POST['delete_contact'];
    $query = "DELETE FROM contacts WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
        {
            echo 'data updated';
            header("Location: contact.php");
        }else {
            echo 'data not updated';
            header("Location: contact.php");
        }
}

    if(isset($_POST['update_contact'])){

        include "login_db.php";

        $id = $_POST['updated_id'];

        $name = $_POST["name"];
        $company = $_POST["company"];
        $title = $_POST["title"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        $query = "UPDATE contacts SET name='$name', company='$company', title='$title', email='$email', phone='$phone', address='$address' WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo 'data updated';
            header("Location: contact.php");
        }else {
            echo 'data not updated';
            header("Location: contact.php");
        }

    }


?>