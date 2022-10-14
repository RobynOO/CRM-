<?php
session_start();

include "../login_db.php";

 

    if(isset($_POST["description"]) && 
        isset($_POST["contact"]) && 
        isset($_POST["member"]) && 
        isset($_POST["status"])){
        
        include "../login_db.php";

        $description = $_POST["description"];
        $contact = $_POST["contact"];
        $member = $_POST["member"];
        $status = $_POST["status"];

        $data = "description=".$description."&contact=".$contact."&member=".$member;

        if(empty($description)){
            $em = "First name required";
            header("Location: ../tasks.php?error=$em&$data");
            exit;
        }else if(empty($contact)) {
            $em = "Last name required";
            header("Location: ../tasks.php?error=$em&$data");
            exit;
        } else if (empty($member)) {
            $em = "Username required";
            header("Location: ../tasks.php?error=$em&$data");
            exit;
        } else if (empty($status)) {
            $em = "Password required";
            header("Location: ../tasks.php?error=$em&$data");
            exit;
        }else {
            // hashing the password 

            $sql = "INSERT INTO tasks (description, contact, member, status) 
                    VALUES(?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$description, $contact, $member, $status]);

            header("Location: ../tasks.php?success=Your account has been created successfully");
            exit;
        }

    }else {
        header("Location: ../tasks.php?error=error");
    }


?>