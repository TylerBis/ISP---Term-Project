<?php
       if (isset($_POST["username"]) && isset($_POST["password"])) {
              $db = mysqli_connect("db1.cs.uakron.edu:3306", "kff6", "aem8Aquo");
              $username = $_POST["username"];
              $password = $_POST["password"];
              $query = $db->query("SELECT * FROM ISP_kff6.Users WHERE UserName='$username' AND Password='$password'");
              if (mysqli_num_rows($query) > 0) {
                header("Location: view.php?username='$username'");
                die();
              }
              else {
                header("Location: login.html");
                die();
              }
       }
?>
