<?php
include 'user.php';
$userobj = new Users();

//delete record
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    if ($userobj->deleteRecord('tblusers', "id='" . $deleteId . "'")) {
        header('location:index2.php?msg3=delete');
    } else {
        echo "Delete Request failed try again!";
    }
}

include('view/header.php');
?>

    <head>

        <link rel="stylesheet" href="css/index.css">
        <!-- <link rel="stylesheet" href="css/style.css"> -->
    </head>

    <div class="main-container">
        
        <div class="card text-center">
            <h3>PHP Mysqli OOP CRUD operations</h3>
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

            <form action="POST" id="crud-form">
                <input type="search" name="" id="live-search" class="search" placeholder="Search here" />
                <input type="button" value="Search" class="btn-search" />
                <a href="home.php" class="back-home">Back to home...</a>
            </form>
            
            <div id="table-data">
                
            </div>
            
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            function loadTable(page){
            $.ajax({
                url: "search.php",
                type: "POST",
                data: {page_no :page },
                success: function(data) {
                $("#table-data").html(data);
                // console.log(data);
                }

            });
            }
            loadTable();

            //Pagination Code
            $(document).on("click",".pagination a",function(e) {
            e.preventDefault();
            var page_id = $(this).attr("id");

            loadTable(page_id);
            });

            $("#live-search").keyup(function(){
                var searchResult = $(this).val();
                
                if(searchResult != ''){
                    $.ajax({
                        url:"search.php",
                        method:"post",
                        data:{
                            searchResult :searchResult
                        },
                        success: function(data){
                            $("#table-data").html(data);
                        }

                    });
                }
                
            });




        });

    </script>

</body>

</html>