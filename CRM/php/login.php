<?php 
    session_start();
    
    if(isset($_POST["uname"]) && 
        isset($_POST["passwrd"])){
        
        include "../login_db.php";

        $uname = $_POST["uname"];
        $password = $_POST["passwrd"];

        $data = "uname=".$uname;

        if (empty($uname)) {
            $em = "Username required";
            header("Location: ../login.php?error=$em&$data");
            exit;
        } else if (empty($password)) {
            $em = "Password required";
            header("Location: ../login.php?error=$em&$data");
            exit;
        }else {
            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$uname]);

            

            if($stmt->rowCount() == 1){
                $user = $stmt -> fetch();

                $username = $user['username'];
                $passwrd = $user['password'];
                $fname = $user['fname'];
                $id = $user['id'];

                if($username === $uname){
                    if(password_verify($password, $passwrd)){
                        $_SESSION['id'] = $id;
                        $_SESSION['fname'] = $fname;

                        header("Location: ../home.php");
                        exit;
                    }else {
                        $em = "Incorrect User name or password";
                        header("Location: ../login.php?error=$em&$data");
                        exit;
                    }
                }else {
                    $em = "Incorrect User name or password";
                    header("Location: ../login.php?error=$em&$data");
                    exit;
                }
            
            }else {
                $em = "Incorrect User name or password";
                header("Location: ../login.php?error=$em&$data");
                exit;
            }

            
        }

    }else {
        header("Location: ../login.php?error=error");
    }



?>