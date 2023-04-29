<?php
include('../../config.php');
session_start();
$user = $_SESSION["role"];
$result = "SELECT * FROM ecell WHERE username = '$user'";
$query = mysqli_query($connection, $result);
$queryresult = mysqli_num_rows($query); 
    if($queryresult > 0){
        while($row = mysqli_fetch_assoc($query)){ 
            $id = $row['id'];
        }  
    }
    
if(isset($_POST['insertdata']))
{
    $Year = $_POST['Year'];
    $Workshop = $_POST['Workshop'];
    $Branch = $_POST['Branch'];
    $Coordinator= $_POST['Coordinator'];
    $Title = $_POST['Title'];
    $Category = $_POST['Category'];
    $Others = $_POST['Others'];
    $Participants = $_POST['Participants'];
    $Startingdate = $_POST['Startingdate'];
    $Endingdate = $_POST['Endingdate'];
    $pdffile1 = $_FILES['pdffile1']['name'];
    $file_tmp1 = $_FILES['pdffile1']['tmp_name'];
	// $pdffile2 = $_FILES['pdffile2']['name'];
    // $file_tmp2 = $_FILES['pdffile2']['tmp_name'];
    $id = $_POST['id'];

        move_uploaded_file($file_tmp1,"uploadsindexit/$pdffile1");
	    // move_uploaded_file($file_tmp2,"uploadsfrontit/$pdffile2");

    $query = "INSERT INTO workshops
    (`Year`, `Workshop`, `Branch`, `Coordinator`,
     `Title`, `Category`, `Others`, `Participants`, 
     `Startingdate`, `Endingdate`,`pdffile1`, `id`) 
    VALUES ('$Year', '$Workshop', '$Branch', '$Coordinator', 
    '$Title', '$Category', '$Others', '$Participants', '$Startingdate', '$Endingdate','$pdffile1' ,'$id')";
    
    
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>