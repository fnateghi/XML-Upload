<?php
$con = mysqli_connect("localhost", "root", "", "db_händler");
if (!$con)
{
    echo ' Please Check Your Connection ';
}
if (isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}
$num_per_page = 20;
$start_from = ($page - 1) * 20;
$query = "SELECT * FROM tb_artikel LIMIT $start_from,$num_per_page";
$result = mysqli_query($con, $query);
?>
