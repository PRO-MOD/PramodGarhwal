<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="global.css">

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1;
            background-color: #2196f3;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar img {
            width: 50px;
            margin-right: 10px;
        }

        .navbar .name {
            color: #f2f2f2;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            line-height: 1.5;
            margin: 0;
            padding: 5px 0;
        }

        .navbar a {
            color: #f2f2f2;
            text-decoration: none;
            padding: 10px 16px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 30px;
            background-color: #2196f3;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
        }

        .footer a,
        .footer p {
            color: #f2f2f2;
            text-decoration: none;
            padding: 3px 10px;
        }

        .footer a:hover {
            background-color: #ddd;
            color: black;
        }
        
        .footer p {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <img class="logo" src="https://i.postimg.cc/wvDjdZdp/logo.png" alt="image">
        <h5 class="name">AGNEL CHARITIES' <br>
            FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY <br>
            Agnel Technical Education Complex Sector 9-A, Vashi, Navi Mumbai, Maharashtra, India PIN - 400703</h5>
        <a href='../../logout.php'>Logout</a>
    </div>

    <!-- Your page content goes here -->

    <div class="footer">
        <a href="../developer-page.php">Developers</a>
        <p>Information Management System</p>
        <p>© 2022 FCRIT. All Rights Reserved.</p>
    </div>

    
</body>

</html>
