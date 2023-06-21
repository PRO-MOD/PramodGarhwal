<?php
include('../../config.php');
$user = $_SESSION["role"];

$result = "SELECT * FROM nss WHERE username = '$user'";
$query = mysqli_query($connection, $result);
$queryresult = mysqli_num_rows($query); 
    if($queryresult > 0){
        while($row = mysqli_fetch_assoc($query)){ 
            $id = $row['id'];
        }  
    }
#w
    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
       
        $year_held = $_POST['year_held'];
        $workshop_seminar = $_POST['workshop'];
        $coordinator = $_POST['coordinator'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $others = $_POST['others'];
        $no_of_participants = $_POST['no_of_participants'];
        $starting_date = $_POST['starting_date'];
        $ending_date = $_POST['ending_date'];
        $pdffile1 = $_FILES['pdffile1']['name'];
        $file_tmp1 = $_FILES['pdffile1']['tmp_name'];
		// $pdffile2 = $_FILES['pdffile2']['name2'];
        // $file_tmp2 = $_FILES['pdffile2']['tmp_name2'];

        move_uploaded_file($file_tmp1,"uploads/$pdffile1");
		// move_uploaded_file($file_tmp2,"uploadsfrontit/$pdffile2");
        
 
            $query = "UPDATE workshops SET year_held = '$year_held', 
        workshop_seminar = '$workshop_seminar', coordinator = '$coordinator', title = '$title', 
        category = '$category', others = '$others', no_of_participants = '$no_of_participants', 
        starting_date = '$starting_date',ending_date = '$ending_date' ";

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