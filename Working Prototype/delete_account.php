<html>
    <head>
            <link rel="stylesheet" href="stylesheet.css"/>
            <script src="TermProject.js" type="text/javascript"></script>
            <title>Library</title>
    </head>
    <body>
        <div class="container">
            <?php
                $db = mysqli_connect("db1.cs.uakron.edu:3306", "kff6", "aem8Aquo");
                if (isset($_GET["username"])) {
                    $user = $_GET["username"];
                    echo "<p style='color: white;'> Connected and username is $user";                    
                    $query = "DELETE FROM ISP_kff6.Users WHERE UserName='$user'";
                    $insert = $db->query("DELETE FROM ISP_kff6.Users WHERE UserName='$user'");
                    if ($insert) {
                        echo "<h1 style='color: red;'>Account has been deleted.</h1>";
                        exit;
                    }
                }
                else {
        
                    echo "<h1 style='color: white;'>An error has occurred. You are not logged in.</h1>";
                    exit;
                }
            ?>
            <button class="navbar" onclick="location.href='view.php?username=<?php echo $user; ?>'">Home</button>
            <button class="navbar" onclick="location.href='upload.php?username=<?php echo $user; ?>'">Upload</button>
            <button class="navbar" onclick="location.href='account.php?username=<?php echo $user; ?>">Account</button>
            <button class="navbar" onclick="location.href='prj.html'">Logout</button>
            <button class="navbar" onclick="location.href='help.php?username=<?php echo $user; ?>'">Help</button>
            <button class="delete_btn" onclick="location.href='delete_account.php?username=<?php echo $user; ?>'">Delete Account</button>
        </div>
    </body>
</html>