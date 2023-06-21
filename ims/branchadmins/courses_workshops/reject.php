<?php
if (isset($_POST['deny'])) {
    header("Location: " . $_SERVER['PHP_SELF']);
    echo "<script>alert('Data has been denied.')</script>";
    exit();
} else {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "teacher_portal";

    // Create connection
    $mysqli = new Mysqli("localhost", "root", "", "teacher_portal");
    $connection = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['reject'])) {
        $id = $_POST['id'];
        $query = "UPDATE courses SET STATUS = 'rejected' WHERE id = $id";
        $mysqli->query($query);
        header("Location: " . $_SERVER['PHP_SELF']);
        echo "<script>alert('Data has been rejected.')</script>";
        exit();
    }
}
?>
