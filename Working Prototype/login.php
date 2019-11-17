<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <script src="TermProject.js" type="text/javascript"></script>
        <title>Login</title>
    </head>
    <body>
    <div class="login_container">
        <div class="login_form">
            <form action="verify.php" method="post">
                <h1 style="color: white;">Login</h1>
                <input type="text" name="username" placeholder="Username"/><br/><br/>
                <input type="password" name="password" placeholder="Password"/><br/><br/>
                <input type="submit" name="login" value="Login">
            </form>
            <form action="login.php" method="post">
                <h1 style="color: white;">Create an Account</h1>
                <input type="text" name="create_username" placeholder="Username"/><br/><br/>
                <input type="password" name="create_password" placeholder="Password"/><br/><br/>
                <input type="submit" name="create" value="Create Account">
            </form>
        </div>
        <?php
            if (isset($_POST["create"])) {
                $username = $_POST["create_username"];
                $password = $_POST["create_password"];
                $db = mysqli_connect("db1.cs.uakron.edu:3306", "kff6", "aem8Aquo");
                $insert = $db->query("INSERT INTO ISP_kff6.Users (UserName, Password) VALUES ('$username','$password')");
                if ($insert) {
                    echo "<h2 style='color: green;'>Account was created.</h2>";
                }
                else {
                    echo "<h2 style='color: red;'>Account already exists.</h2>";
                }
                
            }
        ?>
        
    </body>
</html>