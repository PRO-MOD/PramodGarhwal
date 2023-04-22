<?php
session_start();
include('../../config.php');

if(isset($_POST['insertdata']))
{
    $career_year = $_POST['career_year'];
    $branch = $_POST['branch'];
    $guidance_career = $_POST['guidance_career'];
    $title = $_POST['title'];
    $students_attended = $_POST['students_attended'];
    $pdffile = $_FILES['pdffile']['name'];
    $file_tmp = $_FILES['pdffile']['tmp_name'];
    

    move_uploaded_file($file_tmp,"uploadsfdporganised/$pdffile");

    $query = "INSERT INTO career_guidance
    (`career_year`, `branch`, `guidance_career`, `title`, `students_attended`, `pdffile`,`STATUS`) 
    VALUES ('$career_year', '$branch', '$guidance_career', '$title', '$students_attended','$pdffile','PENDING')";

    
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