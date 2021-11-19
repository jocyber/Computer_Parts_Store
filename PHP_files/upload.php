<!DOCTYPE html>

<html>
    <head></head>

    <body>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <br><br>
            <button type="submit" name="submit" class="cart_button">Upload</button>
        </form>
    </body>

    <?php

        $table = "products";
        $type = strtolower($folder);

        if(isset($_POST["submit"])) {
            require_once("connect_DB.php");

            $file = $_FILES["file"];

            $fileName = $_FILES["file"]["name"];
            $fileTmpName = $_FILES["file"]["tmp_name"];
            $fileSize = $_FILES["file"]["size"];
            $fileError = $_FILES["file"]["error"];
            $fileType = $_FILES["file"]["type"];

            $fileExt = explode(".", $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $name = $fileExt[0];
            $img_path = '../images/Products/'.$folder.'/';
            $allowed = array("png", "jpg", "jpeg");

            if(in_array($fileActualExt, $allowed)) {
                if($fileError === 0) {
                    if($fileSize < 5000000) {
                        $fileNameNew = uniqid("", true).".".$fileActualExt;
                        $fileDest = "$dbName/".$fileNameNew;

                        move_uploaded_file($name, $fileDest);

                        $price = rand(50, 150); // change based on type of item
                        $price += .99;

                        $img_path = $img_path.$name;

                        $sql = "insert ignore into $table (Name, img_dir, Price, type) values ('$name', '$img_path.$fileExt[1]', $price, '$type')";
                        $conn->query($sql) or die($conn->error);

                       // header("Location: ../html_files/index.php?uploadsucess");
                    }   
                    else {
                        echo "File size is too big to upload to database.";
                    }
                }   
                else {
                    echo "Error occured while uploading file to database.";
                }
            }
        }
    ?>
</html>