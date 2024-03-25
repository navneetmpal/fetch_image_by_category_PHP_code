<?php
include 'config.php';
?>
<table border="1px" cellpadding="10" cellspacing="0">
    <tr>
        <!-- <th>ID</th>
        <th>category</th> -->
        <th>image</th>
    </tr>
    <?php
    $category=$_GET['category'];
    $select = "SELECT image FROM tasks WHERE category='$category'";
    $data=mysqli_query($con,$select);
    $result=mysqli_num_rows($data);
    if($result){
        while($row=mysqli_fetch_array($data)){
           ?>
            <tr>
                <td>
                    <img src="<?php echo $row['image']; ?>" width="80" height="80">
                </td>
            </tr>
           <?php
        }
    }else{
        ?>
        <tr>
            <td>no Record found</td>
        </tr>
        <?php
    }
?>