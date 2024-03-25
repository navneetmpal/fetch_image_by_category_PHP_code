<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
include "config.php";
?>
<table border="1px" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th colspan="2">Action</th>
    </tr>
    <?php
    $query = "SELECT * FROM optiontypes";
    $data = mysqli_query($con, $query);
    $result = mysqli_num_rows($data);
    if($result) {
        while($row = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['type'];?></td>
                <td>
                    <a href="#" class="view-images" data-category="<?php echo $row['type'];?>" data-toggle="modal" data-target="#imageModal">View</a>
                </td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="3">No records found</td>
        </tr>
        <?php
    }
    ?>
</table>
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Image Slideshow</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="carousel-inner">
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $(".view-images").click(function(e){
        e.preventDefault();
        var category = $(this).data("category");   
        $.ajax({
            url: "get_images.php",
            type: "GET",
            data: { category: category },
            success:function(data){
                var images = $(data);
                $("#carousel-inner").empty();
                images.each(function(index, image) {
                    var carouselItem = $('<div class="carousel-item"></div>');
                    carouselItem.append(image).css('max-height', '500px');
                    $("#carousel-inner").append(carouselItem);
                });
                $("#carousel-inner .carousel-item:first").addClass("active");
                $('#carouselExampleIndicators').carousel();
            }
        });
    });
});
</script>

