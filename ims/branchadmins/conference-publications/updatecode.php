<?php
include('../../config.php');
$user = $_SESSION["role"];

$result = "SELECT * FROM branchadmins WHERE username = '$user'";
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
       
        $Name_Of_The_Teacher = $_POST['Name_Of_The_Teacher'];
        $Branch = $_POST['Branch'];
        $Title_Of_The_Paper= $_POST['Title_Of_The_Paper'];
        $Title_Of_The_Proceedings = $_POST['Title_Of_The_Proceedings'];
        $Name_Of_The_Conference = $_POST['Name_Of_The_Conference'];
        $National_Or_International = $_POST['National_Or_International'];
        $Name_Of_Organizing_Institute = $_POST['Name_Of_Organizing_Institute'];
	    $Year_Of_Publication = $_POST['Year_Of_Publication'];
        $ISBN_Or_ISSN_Number = $_POST['ISBN_Or_ISSN_Number'];
        $Affiliating_Institute = $_POST['Affiliating_Institute'];
        $Name_Of_Publisher = $_POST['Name_Of_Publisher'];
        $Conference_Date_From = $_POST['Conference_Date_From'];
        $Conference_Date_To = $_POST['Conference_Date_To'];
        $Name_Of_Library = $_POST['Name_Of_Library'];
        $Paper_Webinar = $_POST['Paper_Webinar'];
        $Conference_Proceedings = $_POST['Conference_Proceedings'];
        $Registration_Amount = $_POST['Registration_Amount'];
        $TA_Received = $_POST['TA_Received'];

        $pdffile1 = $_FILES['pdffile1']['name'];
        $file_tmp1 = $_FILES['pdffile1']['tmp_name'];
	    $pdffile2 = $_FILES['pdffile2']['name'];
        $file_tmp2 = $_FILES['pdffile2']['tmp_name'];
        $pdffile3 = $_FILES['pdffile3']['name'];
        $file_tmp3 = $_FILES['pdffile3']['tmp_name'];
        $pdffile4 = $_FILES['pdffile4']['name'];
        $file_tmp4 = $_FILES['pdffile4']['tmp_name'];

        move_uploaded_file($file_tmp1,"Paper_Details/$pdffile1");
		move_uploaded_file($file_tmp2,"Conference_Paper/$pdffile2");
        move_uploaded_file($file_tmp3,"Conference_Certificate/$pdffile3");
        move_uploaded_file($file_tmp4,"Application_Letter/$pdffile4");

        $query = "UPDATE conferencepublication SET Name_Of_The_Teacher = '$Name_Of_The_Teacher', Branch = '$Branch', 
        Title_Of_The_Paper = '$Title_Of_The_Paper', Title_Of_The_Proceedings = '$Title_Of_The_Proceedings', Name_Of_The_Conference = '$Name_Of_The_Conference', 
        National_Or_International = '$National_Or_International',  Name_Of_Organizing_Institute = '$Name_Of_Organizing_Institute',Year_Of_Publication= '$Year_Of_Publication', ISBN_Or_ISSN_Number = '$ISBN_Or_ISSN_Number', 
        Affiliating_Institute = '$Affiliating_Institute',Name_Of_Publisher = '$Name_Of_Publisher',Conference_Date_From = '$Conference_Date_From', Conference_Date_To = '$Conference_Date_To', 
        Name_Of_Library = '$Name_Of_Library',Paper_Webinar = '$Paper_Webinar',Conference_Proceedings = '$Conference_Proceedings',Registration_Amount = '$Registration_Amount',
        TA_Received = '$TA_Received' WHERE id='$id' ";
         $query_check_run = mysqli_query($connection, $query_check);
         $data = mysqli_fetch_assoc($query_check_run);
         $status = $data['STATUS'];
         if($status == 'APPROVED'){
             echo '<script> alert("Data has already been approved and cannot be updated."); </script>';
             header("Location:index.php");
             exit();
         }
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