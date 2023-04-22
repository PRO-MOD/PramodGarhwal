<?php
session_start();
include('../../config.php');
$user = $_SESSION["role"];
$result = "SELECT * FROM branchadmins WHERE username = '$user'";
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
    $Name_of_Activity = $_POST['Name_of_Activity'];
    $Organizing_Unit = $_POST['Organizing_Unit'];
    $Name_of_Coordinators= $_POST['Name_of_Coordinators'];
    $Name_of_Scheme = $_POST['Name_of_Scheme'];
    $Others = $_POST['Others'];
    $Dates_Conducted = $_POST['Dates_Conducted'];
    $Year_of_Activity = $_POST['Year_of_Activity'];
	$No_of_Student_Volunteer_for_Activity = $_POST['No_of_Student_Volunteer_for_Activity'];
    $No_of_People_benefitted_by_Activity = $_POST['No_of_People_benefitted_by_Activity'];
    // $Affiliating_Institute = $_POST['Affiliating_Institute'];
    // $Name_Of_Publisher = $_POST['Name_Of_Publisher'];
    // $Conference_Date_From = $_POST['Conference_Date_From'];
    // $Conference_Date_To = $_POST['Conference_Date_To'];
    // $Name_Of_Library = $_POST['Name_Of_Library'];
    // $Paper_Webinar = $_POST['Paper_Webinar'];
    // $Conference_Proceedings = $_POST['Conference_Proceedings'];
    // $Registration_Amount = $_POST['Registration_Amount'];
    // $TA_Received = $_POST['TA_Received'];

    $pdffile1 = $_FILES['pdffile1']['name'];
    $file_tmp1 = $_FILES['pdffile1']['tmp_name'];
	// $pdffile2 = $_FILES['pdffile2']['name'];
    // $file_tmp2 = $_FILES['pdffile2']['tmp_name'];
    // $pdffile3 = $_FILES['pdffile3']['name'];
    // $file_tmp3 = $_FILES['pdffile3']['tmp_name'];
    // $pdffile4 = $_FILES['pdffile4']['name'];
    // $file_tmp4 = $_FILES['pdffile4']['tmp_name'];
    $user_id = $_POST['user_id'];
	
    move_uploaded_file($file_tmp1,"Reports/$pdffile1");
	


    $query = "INSERT INTO outreached_program
    (`Name_of_Activity`, `Organizing_Unit`, `Name_of_Coordinators`, `Name_of_Scheme`, `Others`, `Dates_Conducted`, `Year_of_Activity`, `No_of_Student_Volunteer_for_Activity`, `No_of_People_benefitted_by_Activity`, `pdffile1`, `user_id`) 
    VALUES (' $Name_of_Activity', ' $Organizing_Unit', '$Name_of_Coordinators', '$Name_of_Scheme', ' $Others', '$Dates_Conducted', '$Year_of_Activity', '$No_of_Student_Volunteer_for_Activity', '$No_of_People_benefitted_by_Activity', '$pdffile1','$id')";
    
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