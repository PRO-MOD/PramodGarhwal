<?php
include('../../config.php');

    if(isset($_POST['updatedata']))
    {    $id = $_POST['update_id'];
        $career_year = $_POST['career_year'];
        $branch = $_POST['branch'];
        $guidance_career = $_POST['guidance_career'];
        $title = $_POST['title'];
        $students_attended = $_POST['students_attended'];
        $pdffile = $_FILES['pdffile']['name'];
        $file_tmp = $_FILES['pdffile']['tmp_name'];
    
        move_uploaded_file($file_tmp,"uploadsfdporganised/$pdffile");
        
        $query = "UPDATE career_guidance SET career_year = '$career_year', branch = '$branch', 
        guidance_career = '$guidance_career', title = '$title', students_attended = '$students_attended' WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>