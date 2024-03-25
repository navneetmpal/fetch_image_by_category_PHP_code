<?php
include 'config.php';
if(isset($_GET['category'])) {
    $category = $_GET['category'];
    $query = "SELECT image FROM tasks WHERE category = '$category'";
    $data = mysqli_query($con, $query);
    if(!$data) {
        die("Error in SQL query: " . mysqli_error($con));
        $output = 'no data found';
    }
    $output = '';
    while($row = mysqli_fetch_array($data)) {
        $output .= '<img src="' . $row['image'] . '" alt="' . $row['image'] . '">';
    }
    echo $output;
}
?>
