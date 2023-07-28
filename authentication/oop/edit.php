<?php
    include 'user.php';

    $userobj = new Users();

    //edit record
    if(isset($_GET['editId']) && !empty($_GET['editId'])){
        $editId = $_GET['editId'];
        $rs = $userobj->displayRecordById($editId);
    }

    //update record
    if(isset($_POST['update'])){
        if($userobj->updateRecord($_POST,'tblusers',"id='" . $_POST['id'] . "'")){
            header('location:index2.php?msg2=update');
        }else{
            echo "Registration failed try again!"; 
        }
        // echo "<pre>";
        // print_r($_POST);
    }
    include('view/header.php');
?>

    <head>
        <!-- <link rel="stylesheet" href="css/add.css"> -->
    </head>
    <div class="main-container">

        <div class="card text-center">
            <h3>PHP Mysqli OOP CRUD operations</h3>
        </div><br><br>


        <div class="container">
            <form action="edit.php" method="POST" id="frm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="" class="form-control" value="<?php echo $rs['name']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="" class="form-control" value="<?php echo $rs['email']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="" class="form-control" value="<?php echo $rs['username']; ?>"required>
                </div>

                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $rs['id'] ?>">
                    <input type="submit" value="Update" name="update" class="btn btn-primary" style="float:right;">
                </div>

            </form>
        </div>
    </div>
    
<?php
    include('view/footer.php');
?>