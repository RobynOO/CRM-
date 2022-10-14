<?php 

    if(isset($_POST["fname"]) && 
        isset($_POST["lname"]) && 
        isset($_POST["uname"]) && 
        isset($_POST["passwrd"])){
        
        include "../login_db.php";

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $uname = $_POST["uname"];
        $password = $_POST["passwrd"];

        $data = "fname=".$fname."&lname=".$lname."&uname=".$uname;

        if(empty($fname)){
            $em = "First name required";
            header("Location: ../index.php?error=$em&$data");
            exit;
        }else if(empty($lname)) {
            $em = "Last name required";
            header("Location: ../index.php?error=$em&$data");
            exit;
        } else if (empty($uname)) {
            $em = "Username required";
            header("Location: ../index.php?error=$em&$data");
            exit;
        } else if (empty($password)) {
            $em = "Password required";
            header("Location: ../index.php?error=$em&$data");
            exit;
        }else {
            // hashing the password 

            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (fname, lname, username, password) 
                    VALUES(?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$fname, $lname, $uname, $password]);

            header("Location: ../index.php?success=Your account has been created successfully");
            exit;
        }

    }else {
        header("Location: ../index.php?error=error");
    }



?>