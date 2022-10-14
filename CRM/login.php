<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form class=" shadow w-450 p-3" action="php/login.php" method="post">
            <h4 class="display-3 fs-1">Log In</h4><br>

            <?php  if(isset($_GET['error'])){ ?> 
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>


            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="uname" value="<?php echo (isset($_GET['uname']))? $_GET['uname']: ""; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="passwrd">
            </div>
            <button type="submit" class="btn btn-primary">Log In</button>
            <a href="index.php" class="log-in">Sign Up</a>
        </form>
    </div>
</body>
</html>
