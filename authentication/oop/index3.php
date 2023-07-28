
<?php
include('user.php');
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

if (isset($_GET['page-nr'])) {
    $id = $_GET['page-nr'];
} else {
    $id = 1;
}
include('view/header.php');
?>

<head>
    <link rel="stylesheet" href="css/pagination.css">
</head>

<body id="<?php echo $id ?>">


    <div class="main-content">

        <h3 class="delete-success-text">Deleted Successfully!</h3>

        <form action="POST">
            <input type="search" name="" id="live-search" class="search" placeholder="Search here" />
            <input type="button" value="Search" class="btn-search" />
            <a href="home.php" class="back-home">Back to home...</a>
        </form>

        <h3 id="notfound">Record Not Found!!!</h3>

        <!-- Dispaly the rows -->
        <div class="content">
            <table>
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
            
        </div>
        <?php $userobj->pagination('tblusers',null,null,3); ?> 

        <div class="dummy-table">
         
        </div>


        <div class="page-select-div">
            <form method="GET">
                <label for="select-page" style="margin-top:5px;">No of record per Page</label>
                <select name="select-page" id="select-page" selected="$_GET['select-page']">
                    <option><?php echo $_GET['select-page']; ?></option>
                    <!-- <option disabled>Choose an option</option> -->
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>

                <input type="submit" value="Submit" name="submit" class="btn-search"/>
            </form>
        </div>


    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#live-search").keyup(function() {
                var input = $(this).val();
                // alert(input);

                if (input != "") {
                    $.ajax({
                        url: "pagination.php",
                        method: "POST",
                        data: {
                            input: input
                        },
                        success: function(data) {
                            // document.getElementsByClassName('content') = '';
                            $(".dummy-table").html(data);
                            // $(".content").css("display","block");
                            
                        }
                    });
                }
                else{
                    $(".dummy-table").css("display","none");
                    $(".content").css("display","initial");
                    $("#notfound").css("display","none");
                }
            });
        });

        let links = document.querySelectorAll('.page-numbers > a');
        let bodyId = parseInt(document.body.id) - 1;
        links[bodyId].classList.add("active");

        //check confirm message for delete data
        function checkdelete(){
            return confirm("Are you want to delete this record?");
        }


    </script>

<?php 
    include('view/footer.php');
?>