<?php
session_start();
include("customer.php");
if(isset($_POST["update"])){
    $gmail = $_POST['gmail'];
    $student = $_POST['student'];
    $age = $_POST['age'];
    $ic = $_POST['ic'];

    $sql = "UPDATE kids SET gmail = '$gmail', student = '$student', age = '$age', ic = '$ic' WHERE gmail = $gmail";
    $result = mysqli_query($connect, $sql);query: 
    if ($result)
        echo "<script>Alert('Berjaya kemaskini')</script>";
    else
        echo "<script>Alert('Tidak berjaya kemaskini')</script>";
    echo "<script>window.location='index.php'</script>";
}

if(isset($_POST["gmail"])) {
    $gmail = $_POST['gmail'];

    $sql = "SELECT * FROM kids WHERE gmail = '$gmail' ";
    $result = mysqli_query($connect,$sql);
    if ($result->num_rows > 0) {
       $parents = mysqli_fetch_assoc($result);
    } else {
        $parents = [];
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="update.css">
        <title>Update Page</title>
    </head>
    <header>
    <div class="navbar">
            <img src="images/logo.png" alt="Your Logo" />
            <div>
                <a href="index.php">Home</a>
                <div class="dropdown">
                    <a href="our_programs.php">Our Programs</a>
                    <div class="dropdown-content">
                        <a href="mathematics.php">Mathematics</a>
                        <a href="science.php">Science</a>
                    </div>
                </div>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <a href="studypack.php">StudyPack</a>
                    <a href="branch.php">Branch</a>
                    <a href="contact.php">Contact Us</a>
                    <a href="list_subject.php">Subject Registration</a>
                    <a href="table_list_kid.php">Register Kid here!</a>
                    <a href="update.php">
                        <img src="/images/profile.jpg" class="profile">
                    </a>
                    <?php else: ?>
                    <a href="studypack.php">StudyPack</a>
                    <a href="branch.php">Branch</a>
                    <a href="signup.php">Register Now!</a>
                    <a href="contact.php">Contact Us</a>
                    <a href="sign_in.php">Login</a>
                <?php endif; ?>
            </div>
    </header>
    <body>
            <div class="bigbox">
            <form action="update.php" method="post">
            <h1>Update User</h1>
                <div class="box">
                    <div class="container">
                        <h3>Gmail:</h3>
                        <select name="gmail" id="gmail" required>
                        <option value="" disabled selected>Select Guardian Email</option>
                        <?php
                        $sql = "SELECT gmail FROM parents";
                        $data = mysqli_query($connect, $sql);
                        while ($parent = mysqli_fetch_array($data)) {
                            echo "<option value='" . $parent['gmail'] . "'>" . $parent['gmail'] . "</option>";
                        }
                        ?>
                    </select>
                    </div>
                    <div class="container">
                        <h3>Student name:</h3>
                        <input type="text" name="student" placeholder="<?php echo isset($parents['username']) ? htmlspecialchars($parents['username']) : ''; ?>">
                    </div>
                    <div class="container">
                        <h3>Age:</h3>
                        <input type="text" name="age" placeholder="<?php echo isset($parents['phonenumber']) ? htmlspecialchars($parents['phonenumber']) : ''; ?>">
                    </div>
                    <div class="container">
                        <h3>IC:</h3>
                        <input type="text" name="ic" placeholder="<?php echo isset($parents['password']) ? htmlspecialchars($parents['password']) : ''; ?>">
                    </div>
                </div> 
                <button type="submit" name="update">Update</button>
                <button type="button" onclick="window.location.href='logout.php'">Log out</button> 
            </div>
        </form>
    </body>
    <div class="footer">
        &copy; 2024 Thinkify. For assignment purpose only.
    </div>
</html>