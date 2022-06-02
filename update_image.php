<html>

<head>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<?php
$con = mysqli_connect("localhost", "root", "", "kas-masjid");
$id = $_GET['id'];
$select = mysqli_query($con, "select * from tb_masjid where id='$id'");
$row = mysqli_fetch_assoc($select);
?>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
            <div align="center" class="card" style="width: 18rem;">
                <img src=" profile_images/<?php echo $row['profile']; ?>" style="width:220px;height:200px">
                <div class="card-body">

                    <div class="mb-3">
                        <input type="text" name="name" class="form-control value=" <?= $row['name']; ?>  id="formGroupExampleInput" placeholder="Input new name">
                    </div>

                    <div class="mb-3">  
                        <input type="file" name="profile" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                    </div>

                    <a href="display_images.php" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
                    <input type="submit" name="update" value="UPDATE" class="btn btn-success my-3">

                </div>
            </div>

        
    </form>
    <?php
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        if (isset($_FILES['profile']['name']) && ($_FILES['profile']['name'] != "")) {

            $size = $_FILES['profile']['size'];
            $temp = $_FILES['profile']['tmp_name'];
            $type = $_FILES['profile']['type'];
            $profile_name = $_FILES['profile']['name'];
            // 1st delete old file from folder
            unlink("profile_images/$old_image");
            // new image upload to folder
            move_uploaded_file($temp, "profile_images/$profile_name");
        } else {
            $profile_name = $old_image;
        }
        $update = mysqli_query($con, "update tb_masjid set name='$name', profile='$profile_name'  where id='$id'");

        if ($update) {
            echo "<script>alert('data update successfuly!')</script>";
            echo "<script>window.open('http://localhost/kas-masjid/','_self')</script>";
        } else {
            echo "<script>alert('updation failed')</script>";

            echo "<script>window.open('http://localhost/kas-masjid/','_self')</script>";
        }
    }
    ?>
</body>

</html>