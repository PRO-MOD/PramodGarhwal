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
    $connection = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['approve_now'])) {
        $id = $_POST['id'];
        $query = "UPDATE bookschapter SET STATUS = 'approved' WHERE id = $id";
        $result = mysqli_query($connection, $query);
        if ($result) {
            echo "<script>alert('Data has been approved.')</script>";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error updating status: " . mysqli_error($connection);
        }
    }
}
?>
