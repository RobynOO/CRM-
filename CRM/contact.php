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
    <link rel="stylesheet" type="text/css" href="css/contact-style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/contact.js" defer></script>
    <script src="js/edit-contact.js" defer></script>
</head>
<body>
    <!-- top  navigation bar -->
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
                <a href="#">Contact</a>
            </li>
        </nav>
    </div>


    <div class="container p-4 float-start">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-reader p-3">
                        <h2>Contacts 
                            <button href="" class="btn btn-dark float-end" id="myBtn-three">Add Contact</button>
                            <div id="myModal-three" class="modal">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close-three">&times;</span>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4>New Contact</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="php/contact.php" method="post">
                                                            <div class="mb-3">
                                                                <label for="">Name</label>
                                                                <input type="text" name="name" class="form-control" >
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Company</label>
                                                                <input type="text" name="company" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Position/Job title</label>
                                                                <input type="text" name="title" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Email</label>
                                                                <input type="text" name="email" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Phone</label>
                                                                <input type="text" name="phone" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Address</label>
                                                                <input type="text" name="address" class="form-control">
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

                            $query = "SELECT * FROM contacts";
                            $query_run = mysqli_query($connection, $query);

                        ?>    

                        <table class="table table-bordered table striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Title</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php    
                                if($query_run){
                                    foreach($query_run as $contact){

                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $contact["id"]; ?></td>
                                    <td><?php echo $contact["name"]; ?></td>
                                    <td><?php echo $contact["company"]; ?></td>
                                    <td><?php echo $contact["title"]; ?></td>
                                    <td><?php echo $contact["email"]; ?></td>
                                    <td><?php echo $contact["phone"]; ?></td>
                                    <td><?php echo $contact["address"]; ?></td>
                                    <td>
                                    <button type="button" class="btn btn-success btn-four" id="myBtn-four">EDIT</button>
                                    <form action="updatecontact.php" method="post" class="d-inline">
                                        <button class="btn btn-danger" type="submit" name="delete_contact" value="<?=$contact['id'];?>">DELETE</button>
                                    </form>
                                    </td>
                                        <div id="myModal-four" class="modal">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                                <div class="close-four">&times;</span>
                                                <form action="updatecontact.php" method="post">
                                                        <input type="hidden" name="updated_id" id="updated_id">
                                                        <div class="mb-3">
                                                            <label for="">Name</label>
                                                            <p name="name"></p>
                                                            <input type="text" name="name" class="form-control" id="names">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Company</label>
                                                            <input type="text" name="company" class="form-control" id="companys">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Title</label>
                                                            <input type="text" name="title" class="form-control" id="titles">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Email</label>
                                                            <input type="text" name="email" class="form-control" id="emails">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Phone</label>
                                                            <input type="text" name="phone" class="form-control" id="phones">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Address</label>
                                                            <input type="text" name="address" class="form-control" id="addresses">
                                                        </div>
                                                            <div class="mb-3">
                                                            <button type="submit" class="btn btn-dark" name="update_contact">Update Contact</button>
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

            $('.btn-four').on('click', function() {
            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();
            
            console.log(data);

            $('#updated_id').val(data[0]);
            $('#names').val(data[1]);
            $('#companys').val(data[2]);
            $('#titles').val(data[3]);
            $('#emails').val(data[4]);
            $('#phones').val(data[5]);
            $('#addresses').val(data[6]);
            });


    </script>

</body>
</html>

<?php } else {
    header("Location: home.php");
    exit;
}

?>