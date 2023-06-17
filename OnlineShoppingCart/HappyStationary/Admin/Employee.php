<?php
define('TITLE', 'Employee');
define('PAGE', 'Employee');
include '../Connection.php';
include 'includes/header.php';
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email = $_SESSION['email'];
} else{
    echo "<script> location.href='Login.php'</script>";
}
 ?>

<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-2">List of Employees</p>
    <?php
    $sql = "Select * from employee";
    $result = $con->query($sql);
    if($result->num_rows > 0){
    ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
       <?php while($row = $result->fetch_assoc()){
        echo '<tr>';
         echo '<th scope="row">'.$row['emp_id'].'</th>';
         echo '<td>'.$row['emp_name'].'</td>';
         echo '<td>'.$row['emp_email'].'</td>';
         echo '<td>';
         echo '
         <form action="editEmployee.php" method="POST" class="d-inline">
         <input type="hidden" name="emp_id" value='.$row["emp_id"].'>
         <button
            type="submit"
            class="btn btn-info mr-3"
            name="view"
            value="View"
           >
            <i class="fas fa-pen"></i>
            </button>
            </form>
            <form action="" method="POST" class="d-inline">
            <input type="hidden" name="emp_id" value='.$row["emp_id"].'>
            <button
            type="submit"
            class="btn btn-secondary"
            name="delete"
            value="Delete"
           >
            <i class="fas fa-trash-alt"></i>
            </button>
            </form>
          </td>
          </tr>';
        } ?>
    </tbody>
</table>
<?php } else {
    echo "0 Result";
} 

if(isset($_REQUEST['delete'])){
    $sql = "delete from employee where emp_id = {$_REQUEST['emp_id']}";
    if($con->query($sql) == True){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    } else{
        echo "Unabale to Delete Data";
    }
}

?>
</div>
</div>

<!--div row close header-->
<div>
    <a class="btn btn-danger box" href="AddEmployee.php"><i class="fa fa-plus fa-2x" aria-hidden="true"></i>
</a>
</div>
</div>

<!-- Footer Section Begin -->
<?php include 'includes/footer.php';?>
<!-- Footer Section End -->