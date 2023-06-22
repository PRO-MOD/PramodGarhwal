<?php
include('../../config.php');
session_start();
$user = $_SESSION["role"];
$result = "SELECT * FROM aiclub WHERE username = '$user'";
$query = mysqli_query($connection, $result);
$queryresult = mysqli_num_rows($query); 
if ($queryresult > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $id = $row['id'];
    }
}

if (isset($_POST['insertdata'])) {
    $year_held = $_POST['year_held'];
        $workshop_seminar = $_POST['workshop_seminar'];
        $coordinator = $_POST['coordinator'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $others = $_POST['others'];
        $no_of_participants = $_POST['no_of_participants'];
        $starting_date = $_POST['starting_date'];
        $ending_date = $_POST['ending_date'];
        $pdffile1 = $_FILES['pdffile1']['name'];
        $file_tmp1 = $_FILES['pdffile1']['tmp_name'];
        //$branch= $_POST['branch'];
        $id = $_POST['id'];

    move_uploaded_file($file_tmp1,"uploads/$pdffile1");

    $query = "INSERT INTO workshops
    (`year_held`, `workshop_seminar`, `coordinator`,
     `title`, `category`, `others`, `no_of_participants`, 
     `startingdate`, `endingdate`,`pdffile1`, `id`,`STATUS`) 
    VALUES ('$year_held', '$workshop_seminar', '$coordinator', 
    '$title', '$category', '$others', '$no_of_participants', '$starting_date', '$ending_date','$pdffile1' ,'$id','PENDING')";
    

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
?>
