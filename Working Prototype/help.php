<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <script src="TermProject.js" type="text/javascript"></script>
        <title>Help</title>
    </head>
    <body>
        <div class="container">
            <?php
                if (isset($_GET["username"])) {
                    $user = $_GET["username"];
                }
                else {
                    echo "<h1 style='color: white;'>An error has occurred. You are not logged in.</h1>";
                    exit;
                }
            ?>
            <button class="navbar" onclick="location.href='view.php?username=<?php echo $user; ?>'">Home</button>
            <button class="navbar" onclick="location.href='upload.php?username=<?php echo $user; ?>'">Upload</button>
            <button class="navbar" onclick="location.href='account.php?username=<?php echo $user; ?>'">Account</button>
            <button class="navbar" onclick="location.href='prj.html'">Logout</button>
            <button class="navbar" onclick="location.href='help.php?username=<?php echo $user; ?>'">Help</button>
            <div class="help">
                <h2 style="color: white;">Home</h2>
                <p style="color: white;">If you go to the home tab you will be able to view all of the photos that have been uploaded
		            to your library. All of the photos will be in order by upload date and time with the oldest one being in the top left.
		            A photo can be viewed full size by clicking on the desired photo which will then be loaded in a new window.
                </p>
		<h2 style="color: white;">Upload</h2>
                <p style="color: white;">Go to the upload tab to add a new photo to your library. Once on the upload tab just click the
                    'Choose file' button to browse for a picture that you want to add to your library. Once you have selected the picture to add
                    just hit the upload button and it will be added to your library for you!
                </p>
		<h2 style="color: white;">Account</h2>
                <p style="color: white;">If you want to delete your account and have all your photos be deleted just go to the account tab. Once
                    there clicking the 'Delete Account' button will do just that.
                </p>
                <h2 style="color: white;">Logout</h2>
                <p style="color: white;">Once you have finished uploading all of your pictures to the library or are done viewing old memories
                    go to the logout tab and you will be logged out to keep your photos safe from people you do not want viewing them.
                </p>
            </div>
        </div>
    </body>
</html>