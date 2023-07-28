<?php
// echo "hleooo 212";
  $conn = mysqli_connect("localhost","root","Montukhan@2000","projectdb") or die("Connection failed");

  $limit_per_page = 5;

  $page = "";
  if(isset($_POST["page_no"])){
    $page = $_POST["page_no"];
  }else{
    $page = 1;
  }
//   echo "hello workd";
  $offset = ($page - 1) * $limit_per_page;

  $sql = "SELECT * FROM tblusers LIMIT {$offset},{$limit_per_page}";
  $result = mysqli_query($conn,$sql) or die("Query Unsuccessful1.");
  $output= "";
  if(mysqli_num_rows($result) > 0){
    $output .= '<table border="1" width="100%" cellspacing="0" cellpadding="10px" id="usersTable">
      <tr>
        <th width="100px">Id</th>
        <th>Name</th>
        <th>email</th>
        <th>username</th>
        <th>action</th>
      </tr>';
      while($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
                    <td align='center'>{$row["id"]}</td>
                    <td>{$row["name"]}</td>
                    <td>{$row["email"]}</td>
                    <td>{$row["username"]}</td>
                    <td class='symbol'>
                        <a href='edit.php?editId={$row["id"]}' style='color:green'>
                        <i class='fa fa-pencil' aria-hidden='true'></i>
                        </a>&nbsp;
                        <a href='index.php?{$row["id"]}' style='color:red' onclick='return isDelete()'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                        </a>
                    </td>
                    </tr>";
      }
    $output .= "</table>";

    $sql_total = "SELECT * FROM tblusers";

    $records = mysqli_query($conn,$sql_total) or die("Query Unsuccessful2.");
    
    $total_record = mysqli_num_rows($records);
    $total_pages = ceil($total_record/$limit_per_page);

    $output .='<div class="pagination">';
    if($page > 1){
      $prev = $page-1;
      $output .= "<a id='{$prev}' href=''>Prev</a>";
    }
    for($i=1; $i <= $total_pages; $i++){
      if($i == $page){
        $class_name = "active";
      }else{
        $class_name = "";
      }
      $output .= "<a class='{$class_name}' id='{$i}' href=''>{$i}</a>";
    }
    if($page < $total_pages){
      $next = $page+1;
      $output .= "<a id='{$next}' href=''>Next</a>";
    }
    $output .='</div>';

    echo $output;
  }else{
    echo "<h2>No Record Found.</h2>"; 

  }
?>
