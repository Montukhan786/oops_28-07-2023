<?php
include 'user.php';
$userobj = new Users();

//delete record
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    if ($userobj->deleteRecord('tblusers', "id='" . $deleteId . "'")) {
        header('location:index.php?msg3=delete');
    } else {
        echo "Delete Request failed try again!";
    }
}

include('view/header.php');

?>


    <div class="main-container">
        
        <div class="card text-center">
            <h1>PHP Mysqli OOP CRUD (Add, Edit, Delete, View) OOP (Object Oriented Programming)</h1>
        </div>

        <div class="container">
            <?php

            if (isset($_GET['msg']) == "login_success") {
                echo "<div class='alert alert-success alert-dismissible'>
                        Login successfully.
                    </div>";
            }

            if (isset($_GET['msg1']) == "insert") {
                echo "<div class='alert alert-success alert-dismissible'>
                        Your Registration added successfully.
                    </div>";
            }
            //check update 
            if (isset($_GET['msg2']) == "update") {
                echo "<div class='alert alert-success alert-dismissible'>
                        Record update successfully.
                    </div>";
            }
            //for delete
            //check update 
            if (isset($_GET['msg3']) == "delete") {
                echo "<div class='alert alert-danger alert-dismissible'>
                        Record Deleted successfully.
                    </div>";
            }
            ?>
            <div class="heading">
                <h2>View Records</h2>
                <a href="add.php" class="btn btn-primary" style="float:right;">Add new Reocrd</a>
            </div>

            <form action="POST">
                <input type="search" name="" id="live-search" class="search" placeholder="Search here" />
                <input type="button" value="Search" class="btn-search" />
                <a href="home.php" class="back-home">Back to home...</a>
            </form>
            
            <table class="table table-bordered table-striped" id="usersTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>UserName</th>
                        <th class="symbol">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $users = $userobj->displayData('tblusers', "*", null, null, 3);
                    // $user = json_decode($users);
                    foreach ($users as $rs) {
                    ?>

                        <tr>
                            <td><?php echo $rs['id'] ?></td>
                            <td><?php echo $rs['name'] ?></td>
                            <td><?php echo $rs['email'] ?></td>
                            <td><?php echo $rs['username'] ?></td>
                            <td class="symbol">

                                <a href="edit.php?editId=<?php echo $rs['id'] ?>" style="color:green">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>&nbsp;

                                <a href="index.php?deleteId=<?php echo $rs['id'] ?>" style="color:red" onclick="return isDelete()">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
            <?php $userobj->pagination('tblusers',null,null,3); ?>
        </div>
    </div>

<?php
    include('view/footer.php');
?>