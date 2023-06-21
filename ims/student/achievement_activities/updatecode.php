<?php
include('../../config.php');
$user = $_SESSION["role"];

$result = "SELECT * FROM student WHERE username = '$user'";
$query = mysqli_query($connection, $result);
$queryresult = mysqli_num_rows($query); 
    if($queryresult > 0){
        while($row = mysqli_fetch_assoc($query)){ 
            $id = $row['id'];
            $branch = $row['branch'];
        }  
    }

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
       
        $Name_Of_The_Student = $_POST['Name_Of_The_Student'];
        $Roll_no = $_POST['Roll_no'];
        $Branch = $_POST['Branch'];
        $Year_Of_Study= $_POST['Year_Of_Study'];
        $Current_Year = $_POST['Current_Year'];
        $Extracurricular_Or_Cocurricular = $_POST['Extracurricular_Or_Cocurricular'];
        $Name_Of_Activity = $_POST['Name_Of_Activity'];
        $Others = $_POST['Others'];
        $Organizing_Body = $_POST['Organizing_Body'];
        $Award_Or_Participation = $_POST['Award_Or_Participation'];
        $Dates_From = $_POST['Dates_From'];
        $Dates_To = $_POST['Dates_To'];
        $pdffile1 = $_FILES['pdffile1']['name1'];
        $file_tmp1 = $_FILES['pdffile1']['tmp_name1'];
		// $pdffile2 = $_FILES['pdffile2']['name2'];
        // $file_tmp2 = $_FILES['pdffile2']['tmp_name2'];
        // $user_id = $_POST['id'];

        move_uploaded_file($file_tmp1,"certificates/$pdffile1");
		// move_uploaded_file($file_tmp2,"uploadsfrontit/$pdffile2");
        
 
        $query = "UPDATE achievement SET Name_Of_The_Student = '$Name_Of_The_Student',Roll_no = '$Roll_no', Branch = '$Branch', 
        Year_Of_Study = '$Year_Of_Study', Current_Year = '$Current_Year', Extracurricular_Or_Cocurricular = '$Extracurricular_Or_Cocurricular', 
        Name_Of_Activity = '$Name_Of_Activity', Others = '$Others', Organizing_Body = '$Organizing_Body', 
        Award_Or_Participation = '$Award_Or_Participation', Dates_From = '$Dates_From', Dates_To = '$Dates_To' WHERE id='$id'  ";

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