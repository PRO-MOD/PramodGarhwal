<?php
include('../../config.php');
$user = $_SESSION["role"];

$result = "SELECT * FROM ecell";
$query = mysqli_query($connection, $result);
$queryresult = mysqli_num_rows($query); 
    if($queryresult > 0){
        while($row = mysqli_fetch_assoc($query)){ 
            $id = $row['id'];
        }  
    }

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
       
        $Year = $_POST['Year'];
        $Branch = $_POST['Branch'];
        $Workshop= $_POST['Workshop'];
        $Coordinator = $_POST['Coordinator'];
        $Title = $_POST['Title'];
        $Category = $_POST['Category'];
        $Others = $_POST['Others'];
        $Participants = $_POST['Participants'];
        $Startingdate = $_POST['Startingdate'];
        $Endingdate = $_POST['Endingdate'];
        $pdffile1 = $_FILES['pdffile1']['name1'];
        $file_tmp1 = $_FILES['pdffile1']['tmp_name1'];
		// $pdffile2 = $_FILES['pdffile2']['name2'];
        // $file_tmp2 = $_FILES['pdffile2']['tmp_name2'];

        move_uploaded_file($file_tmp1,"uploadsindexit/$pdffile1");
		// move_uploaded_file($file_tmp2,"uploadsfrontit/$pdffile2");
        
 
            $query = "UPDATE aditya SET Year = '$Year', Branch = '$Branch', 
        Workshop = '$Workshop', Coordinator = '$Coordinator', Title = '$Title', 
        Category = '$Category', Others = '$Others', Participants = '$Participants', 
        Startingdate = '$Startingdate',Endingdate = '$Endingdate' ";

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