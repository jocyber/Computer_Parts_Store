<!DOCTYPE html>

<html>
    <head></head>

    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submit">Upload</button>
        </form>
    </body>

    <?php
        $serverName = "localhost:3307";
        $username = "root";
        $password = "";
        $dbName = "computer_store";

        $table = "systems";

        if(isset($_POST["submit"])) {
            $conn = mysqli_connect($serverName, $username, $password, $dbName);
        
            if(!$conn) {
                die("Connection to the database failed: ".mysqli_connect_error());
            }

            $file = $_FILES["file"];

            $fileName = $_FILES["file"]["name"];
            $fileTmpName = $_FILES["file"]["tmp_name"];
            $fileSize = $_FILES["file"]["size"];
            $fileError = $_FILES["file"]["error"];
            $fileType = $_FILES["file"]["type"];

            $fileExt = explode(".", $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $name = $fileExt[0];
            $img_path = '../images/Products/';
            $allowed = array("png", "jpg", "jpeg");

            if(in_array($fileActualExt, $allowed)) {
                if($fileError === 0) {
                    if($fileSize < 5000000) {
                        $fileNameNew = uniqid("", true).".".$fileActualExt;
                        $fileDest = "$dbName/".$fileNameNew;

                        move_uploaded_file($name, $fileDest);

                        $price = rand(30, 150);

                        $img_path = $img_path.$name;

                        $sql = "insert ignore into $table (Name, img_dir, Price) values ('$name', '$img_path.$fileExt[1]' ,'$price.99')";
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
            else {
                echo "file not allowed, stupid";
            }
        }
    ?>
</html>