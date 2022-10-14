<?php
session_start();

include "../login_db.php";

 

    if(isset($_POST["name"]) && 
        isset($_POST["company"]) && 
        isset($_POST["title"]) && 
        isset($_POST["email"]) && 
        isset($_POST["phone"]) && 
        isset($_POST["address"])){
        
        include "../login_db.php";

        $name = $_POST["name"];
        $company = $_POST["company"];
        $title = $_POST["title"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        $data = "name=".$name."&company=".$company."&title=".$title."&email=".$email."&phone=".$phone."&address=".$address;

        if(empty($name)){
            $em = "First name required";
            header("Location: ../contact.php?error=$em&$data");
            exit;
        }else if(empty($company)) {
            $em = "Last name required";
            header("Location: ../contact.php?error=$em&$data");
            exit;
        } else if (empty($title)) {
            $em = "Username required";
            header("Location: ../contact.php?error=$em&$data");
            exit;
        } else if (empty($email)) {
            $em = "Username required";
            header("Location: ../contact.php?error=$em&$data");
            exit;
        }else if (empty($phone)) {
            $em = "Username required";
            header("Location: ../contact.php?error=$em&$data");
            exit;
        }else if (empty($address)) {
            $em = "Password required";
            header("Location: ../contact.php?error=$em&$data");
            exit;
        }else {

            $sql = "INSERT INTO contacts (name,company,title,email,phone,address) 
                    VALUES(?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $company, $title, $email, $phone, $address]);

            header("Location: ../contact.php?success=created successfully");
            exit;
        }

    }else {
        header("Location: ../contact.php?error=error");
    }


?>