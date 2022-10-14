<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['fname'])){

?>

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
    <div>
        <nav class="top-nav">
            <h2>Customer Relationship Management</h2>
            <div class="right-nav-menu">
                <p id="uname">Hello, <?= $_SESSION['fname']?></p>
                <a href="login.php">Logout</a>
            </div>
        </nav>
        <nav class="side-nav">
            <li>
                <a href="home.php">Dashoboard</a>
            </li>
            <li>
                <a href="tasks.php">Task</a>
            </li>
            <li>
                <a href="contact.php">Contact</a>
            </li>
        </nav>
    </div>
    <div class="animation">
        <p class="line-1 anim-typewriter">HELLO, I'm Robyn and welcome to my CRM System</p>
        <p class="line-1 anim-typewriter">Technologies: HTML,CSS,JS,JQUERY,PHP,MySQL</p>
    </div>
    

</body>
</html>

<?php } else {
    header("Location: home.php");
    exit;
}

?>
