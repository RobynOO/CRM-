<?php
session_start();

include "login_db.php";



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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/tasks.js" defer></script>
    <script src="js/edit-btn.js" defer></script>
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


    <div class="container p-4 float-start">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-reader p-3">
                        <h2>Tasks 
                            <button href="" class="btn btn-dark float-end" id="myBtn">Add Task</button>
                            <div id="myModal" class="modal">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4>New Task</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="php/tasks.php" method="post">
                                                            <div class="mb-3">
                                                                <label for="">Description</label>
                                                                <input type="text" name="description" class="form-control" >
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Contact</label>
                                                                <input type="text" name="contact" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Team Member</label>
                                                                <input type="text" name="member" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Status</label>
                                                                <input type="text" name="status" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <button type="submit" class="btn btn-dark" name="save_task">Save Task</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal end -->


                            </div>
                        </h2>
                    </div>
                    <div class="card-body">

                    
                        <?php      

                       

                            $connection = mysqli_connect("localhost", "root", "root");
                            $db = mysqli_select_db($connection, 'login_db' );

                            $query = "SELECT * FROM tasks";
                            $query_run = mysqli_query($connection, $query);

                        ?>    

                        <table class="table table-bordered table striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Contact</th>
                                    <th>Team Member</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php    
                                if($query_run){
                                    foreach($query_run as $task){

                            ?>
                            <tbody>
                                <tr> 
                                    <td type="hidden"><?php echo $task["id"]; ?></td>
                                    <td><?php echo $task["description"]; ?></td>
                                    <td><?php echo $task["contact"]; ?></td>
                                    <td><?php echo $task["member"]; ?></td>
                                    <td><?php echo $task["status"]; ?></td>
                                    <td>
                                    <button type="button" class="btn btn-success btn-two" id="myBtn-two">EDIT</button>
                                    <form action="updatedata.php" method="post" class="d-inline">
                                        <button class="btn btn-danger" type="submit" name="delete_task" value="<?=$task['id'];?>">DELETE</button>
                                    </form>
                                    </td>
                                        <div id="myModal-two" class="modal">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                                <div class="close-two">&times;</span>
                                                <form action="updatedata.php" method="post">

                                                        <input type="hidden" name="update_id" id="update_id">
                                                        <div class="mb-3">
                                                            <label for="">Description</label>
                                                            <input type="text" name="description" class="form-control" id="descriptions">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Contact</label>
                                                            <input type="text" name="contact" class="form-control" id="contacts">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Team Member</label>
                                                            <input type="text" name="member" class="form-control" id="members">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Status</label>
                                                            <input type="text" name="status" class="form-control" id="statuses">
                                                        </div>
                                                            <div class="mb-3">
                                                            <button type="submit" class="btn btn-dark" name="updatedata">Update Task</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                </tr>
                                    
                            </tbody>
                            <?php
                                    }
                                }else 
                                {
                                    echo "No Record Found";
                                }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

            $('.btn-two').on('click', function() {
            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();
            
            console.log(data);

            $('#update_id').val(data[0]);
            $('#descriptions').val(data[1]);
            $('#contacts').val(data[2]);
            $('#members').val(data[3]);
            $('#statuses').val(data[4]);
            });


    </script>

</body>
</html>

<?php } else {
    header("Location: home.php");
    exit;
}

?>