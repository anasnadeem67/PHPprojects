<?php
include 'Connection.php';
include 'header.php';
?>

<html>
<head>
    <title>Pagination</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php

        if (isset($_GET['Cate_id'])) {
            $Cate_id = $_GET['Cate_id'];
        } else {
            $Cate_id = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($Cate_id-1) * $no_of_records_per_page;

       

        $total_pages_sql = "SELECT COUNT(*) FROM products";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM table LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
        }
        mysqli_close($con);
    ?>
    <ul class="pagination">
        <li><a href="?Cate_id=1">First</a></li>
        <li class="<?php if($Cate_id <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($Cate_id <= 1){ echo '#'; } else { echo "?Cate_id=".($Cate_id - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?Cate_id=".($Cate_id + 1); } ?>">Next</a>
        </li>
        <li><a href="?Cate_id=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</body>
</html>