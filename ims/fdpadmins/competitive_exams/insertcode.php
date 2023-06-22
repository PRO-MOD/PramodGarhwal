<?php
session_start();
include('../../config.php');
$user = $_SESSION["role"];
$result = "SELECT * from fdpadmins WHERE username = '$user'";
$query = mysqli_query($connection, $result);
$queryresult = mysqli_num_rows($query); 
    if($queryresult > 0){
        while($row = mysqli_fetch_assoc($query)){ 
            $id = $row['id'];
            $branch = $row['branch'];
        }  
    }
	
if(isset($_POST['insertdata']))
{
    $Year = $_POST['Year'];
    $Branch = $_POST['Branch'];
    $Registration_number = $_POST['Registration_number'];
    $Name_of_student= $_POST['Name_of_student'];
    $Name_of_exam = $_POST['Name_of_exam'];
    $other = $_POST['other'];
    $pdffile1 = $_FILES['pdffile1']['name'];
    $file_tmp1 = $_FILES['pdffile1']['tmp_name'];
    $user_id= $_POST['user_id'];
	
    move_uploaded_file($file_tmp1,"exams/$pdffile1");

    $query = "INSERT INTO competitiveexams
    (`Year`, `Branch`, `Registration_number`, `Name_of_student`, `Name_of_exam`, `other`,  `pdffile1`, `user_id`,`STATUS`) 
    VALUES ('$Year', '$branch', '$Registration_number', '$Name_of_student', '$Name_of_exam', '$other',  '$pdffile1', '$id','PENDING')";
    
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