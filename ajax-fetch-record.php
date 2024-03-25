<?php
    include "config.php";
    
    $category = $_POST['type'];
    $query="SELECT image from tasks WHERE category = '" . $category . "'";
    $result = mysqli_query($con,$query);
    // $cust = mysqli_fetch_array($result);
    
    // if($cust) {
    //     echo json_encode($cust);
    // } else {
    //     echo "Error: " . $sql . "" . mysqli_error($con);
    // }


     $images = array();
        if($result && mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $images[] = $row['image'];
            }

            // Return image paths as JSON response
            echo json_encode(array('images' => $images));
            exit;
        } else {
            echo json_encode(array('error' => 'No images found for the specified category.'));
            exit;
        }
    ?>
?>
