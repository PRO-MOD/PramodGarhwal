<?php
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

    if(isset($_POST['updatedata']))
    {   $id = $_POST['update_id'];
       
        $Name_of_Activity = $_POST['Name_of_Activity'];
        $Organizing_Unit = $_POST['Organizing_Unit'];
        $Name_of_Coordinators = $_POST['Name_of_Coordinators'];
        $Name_of_Scheme = $_POST['Name_of_Scheme'];
        $Others = $_POST['Others'];
        $Dates_Conducted = $_POST['Dates_Conducted'];
        $Year_of_Activity = $_POST['Year_of_Activity'];
        $No_of_Student_Volunteer_for_Activity = $_POST['No_of_Student_Volunteer_for_Activity'];
        $No_of_People_benefitted_by_Activity = $_POST['No_of_People_benefitted_by_Activity'];
        $pdffile1 = $_FILES['pdffile1']['name1'];
        $file_tmp1 = $_FILES['pdffile1']['tmp_name1'];
		// $pdffile2 = $_FILES['pdffile2']['name2'];
        // $file_tmp2 = $_FILES['pdffile2']['tmp_name2'];

        move_uploaded_file($file_tmp1,"Reports/$pdffile1");
		// move_uploaded_file($file_tmp2,"uploadsfrontit/$pdffile2");
        
 
            $query = "UPDATE outreached_program SET Name_of_Activity = '$Name_Of_Activity', Organizing_Unit = '$Organizing_Unit', 
        Name_of_Coordinators = '$Name_of_Coordinators', Name_of_Scheme = '$Name_of_Scheme', Others = '$Others', 
        Dates_Conducted = '$Dates_Conducted', Year_of_Activity = '$Year_of_Activity', No_of_Student_Volunteer_for_Activity = '$No_of_Student_Volunteer_for_Activity', 
        No_of_People_benefitted_by_Activity = '$No_of_People_benefitted_by_Activity' WHERE id='$id'  ";

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