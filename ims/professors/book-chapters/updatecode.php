<?php
include('../../config.php');
$user = $_SESSION["role"];

$result = "SELECT * FROM credentials WHERE username = '$user'";
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
       
        $Name_Of_The_Teacher = $_POST['Name_Of_The_Teacher'];
        $Branch = $_POST['Branch'];
        $Title_Of_The_Book_Published= $_POST['Title_Of_The_Book_Published'];
        $Title_Of_The_Chapter_Published_In_The_Book = $_POST['Title_Of_The_Chapter_Published_In_The_Book'];
        $Name_Of_The_Publisher = $_POST['Name_Of_The_Publisher'];
        $National_Or_International = $_POST['National_Or_International'];
        $ISBN_Or_ISSN_Number = $_POST['ISBN_Or_ISSN_Number'];
        $Year_Of_Publication = $_POST['Year_Of_Publication'];
        $Volume_Issue = $_POST['Volume_Issue'];
        $pdffile1 = $_FILES['pdffile1']['name1'];
        $file_tmp1 = $_FILES['pdffile1']['tmp_name1'];
		$pdffile2 = $_FILES['pdffile2']['name2'];
        $file_tmp2 = $_FILES['pdffile2']['tmp_name2'];

        move_uploaded_file($file_tmp1,"uploadsindexit/$pdffile1");
		move_uploaded_file($file_tmp2,"uploadsfrontit/$pdffile2");
        
 
            $query = "UPDATE bookschapter SET Name_Of_The_Teacher = '$Name_Of_The_Teacher', Branch = '$Branch', 
        Title_Of_The_Book_Published = '$Title_Of_The_Book_Published', Title_Of_The_Chapter_Published_In_The_Book = '$Title_Of_The_Chapter_Published_In_The_Book', Name_Of_The_Publisher = '$Name_Of_The_Publisher', 
        National_Or_International = '$National_Or_International', ISBN_Or_ISSN_Number = '$ISBN_Or_ISSN_Number', Year_Of_Publication = '$Year_Of_Publication', 
        Volume_Issue = '$Volume_Issue' WHERE id='$id'  ";

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