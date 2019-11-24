<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <script src="TermProject.js" type="text/javascript"></script>
        <title>Upload</title>
    </head>
    <body>
        <?php
            $user = "";
            if (isset($_GET["username"])) {
                $user = $_GET["username"];
            }
            else {
                echo "<h1 style='color: white;'>An error occurred. User not logged in.</h1>";
                exit;
            }
        ?>
        <div class="container">
            <button class="navbar" onclick="location.href='view.php?username=<?php echo $user; ?>'">Home</button>
            <button class="navbar" onclick="location.href='upload.php?username=<?php echo $user; ?>'">Upload</button>
            <button class="navbar" onclick="location.href='account.php?username=<?php echo $user; ?>'">Account</button>
            <button class="navbar" onclick="location.href='login.html'">Logout</button>
            <button class="navbar" onclick="location.href='help.php?username=<?php echo $user; ?>'">Help</button>
            <form action="upload.php?username=<?php echo $user; ?>" method="post" enctype="multipart/form-data">
                <div class="upload_text" style="color: white; font-size: 18px;">Select image to upload:</div>
                <div class="choose_file" style="color: white; font-size: 18px;"><input type="file" name="image"/></div>
                <div class="upload" style="color: white;"><input type="submit" name="submit" value="UPLOAD"/></div>
            </form>

            <?php
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if ($check !== false) {
                        $image = $_FILES['image']['tmp_name'];
                        $imgContent = addslashes(file_get_contents($image));

                        $db = mysqli_connect("db1.cs.uakron.edu:3306", "kff6", "aem8Aquo");

                        if ($db->connect_error) {
                            die("Connection failed: " . $db->connect_error);
                        }
                        
                        $dataTime = date("Y-m-d H:i:s");

                        $insert = $db->query("INSERT into ISP_kff6.images (image, created) VALUES ('$imgContent', '$dataTime')");

                        $image_id = $db->query("SELECT id FROM ISP_kff6.images WHERE created='$dataTime'");
                        $image_id = mysqli_fetch_array($image_id);
                        $image_id = $image_id["id"];
                        
                        $db->query("INSERT INTO ISP_kff6.owned_images (username, imageID) VALUES ('$user','$image_id')");

                        if ($insert) {
                            echo "File uploaded successfully.";
                        }
                        else {
                            echo "File upload failed, please try again.";
                        } 
                    }
                    else {
                        echo "Please select an image file to upload.";
                    }
                }
            ?>
        </div>
    </body>
</html>

