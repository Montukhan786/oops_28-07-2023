<?php
    include 'user.php';

    $userobj = new Users();

    //insert record
    if(isset($_POST['submit'])){
        
        if($userobj->insertData($_POST,'tblusers')){
            header('location:index2.php?msg1=insert');
        }
        else{
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

        <div class="card text-center" style="padding:15px;">
            <h4>PHP Mysqli OOP CRUD (Add, Edit, Delete, View) OOP (Object Oriented Programming)</h4>
        </div><br><br>

        <div class="container">
            <form action="add.php" method="POST" id="frm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter yout name" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="" class="form-control" placeholder="Enter yout E-mail" required>
                </div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="" class="form-control" placeholder="Enter yout username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="Enter yout password" required>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </div>

            </form>
        </div>

    </div>
    
<?php
    include('view/footer.php'); 
?>