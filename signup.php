<?php
include("database.php");
if(isset($_POST["gmail"])) {
    $gmail = $_POST["gmail"];
    $username = $_POST["username"];
    $phonenumber = $_POST["phonenumber"];
    $password = $_POST["password"];

    $sql = "INSERT INTO parents (gmail, username, phonenumber, password, time_register) values ('$gmail','$username', '$phonenumber', '$password', NOW())";
    $result = mysqli_query($connect, $sql);

    if (($result)) {
        echo "<script>alert('Berjaya signup')</script>";
    } else {
        echo "<script>alert('Tidak berjaya signup')</script>";
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="signup.css">
        <link rel="stylesheet" href="footer.css">
        <title>Signup Page</title>
    </head>
            <div class="wrapper">
            <h2>Signup</h2>
            <form action="signup.php" method="post">
                <div class="input-box">
                    <label for="Email">Email</label><br>
                    <input type="email" name="gmail" placeholder="Email" required>
                </div>
                <div class="input-box">
                    <label for="username">Username</label><br>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-box">
                    <label for="phonenumber">Phone Number</label><br>
                    <input type="text" name="phonenumber" placeholder="Phone Number" required>
                </div>
                <div class="input-box">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" placeholder="password" required>
                </div>
                <button type="submit" class="login-btn" >Sign up</button>
                    <div class="register-link">
                        <p>Already have account?<a href="sign_in.php"> Log In Here</a></p>
                    </div>
                </div>
            </form>
    </body>
    <footer>
        &copy; 2024 Thinkify. For assignment purpose only.
    </footer>
</html>