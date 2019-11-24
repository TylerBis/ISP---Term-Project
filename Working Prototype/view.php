<html>
       <head>
              <link rel="stylesheet" href="stylesheet.css"/>
              <script src="TermProject.js" type="text/javascript"></script>
              <title>Library</title>
       </head>
       <body>
              <div class="container">
                     <?php
                            $user = "";
                            if (isset($_GET["username"])) {
                                   $user = $_GET["username"];
                            }
                            elseif (isset($_POST["username"])) {
                                   $user = $_POST["username"];
                            }
                            else {
                                   echo "<h1 style='color: white;'>An error occurred. User not logged.</h1>";
                                   exit;
                            }
                            $db = mysqli_connect("db1.cs.uakron.edu:3306", "kff6", "aem8Aquo");
                            $sql="SELECT * FROM ISP_kff6.images JOIN (SELECT imageID FROM ISP_kff6.owned_images WHERE owned_images.username='$user') temp ON images.id=temp.imageID";
                            $query=$db->query($sql);
                            $num=mysqli_num_rows($query);
                            $result=mysqli_fetch_all($query,MYSQLI_ASSOC);
                     ?>
                     
                     <button class="navbar" onclick="location.href='view.php?username=<?php echo $user; ?>'">Home</button>
                     <button class="navbar" onclick="location.href='upload.php?username=<?php echo $user; ?>'">Upload</button>
                     <button class="navbar" onclick="location.href='account.php?username=<?php echo $user; ?>'">Account</button>
                     <button class="navbar" onclick="location.href='login.html'">Logout</button>
                     <button class="navbar" onclick="location.href='help.php?username=<?php echo $user; ?>'">Help</button>

                     <h1 class="title">My Library</h1>
                     <?php
                            for ($i = 0; $i < $num; ++$i) {
                                   echo '<div>';
                                   echo '<a target="_blank" href="#" onclick="openImage(this)"><img class="item" src="data:image/jpeg;base64,'.base64_encode($result[$i]['image']).'"/></a><br/>';
                                   echo '<span style="color: white;">Uploaded: '.$result[$i]['created'].'</span>';
                                   echo '</div>';
                            }
                     ?>
              </div>
       </body>
</html>