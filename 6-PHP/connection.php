<?php
$host = 'localhost';
$username = 'root';
$password = 'admin';
$database = 'learn_php';

$conn = mysqli_connect($host, $username, $password, $database);
?>

<!doctype html>
<html lang="en">
<head>
    <title>PHP Project</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="jumbotron"></div>
    <?php

    $sql = "SELECT * FROM users";
    $run = mysqli_query($conn, $sql);
    /*
    while($rows = mysqli_fetch_assoc($run) ) {
        echo $rows['name'] . ' ' . $rows['password'] . '<br>';
    }*/

    echo "
    <table class='table'>
        <thead>
            <tr>
                <th>s.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Contact Number</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        ";
    while ($rows = mysqli_fetch_assoc($run)) {
        echo "
            <tr>
                <td>{$rows['id']}</td>
                <td>{$rows['name']}</td>
                <td>{$rows['email']}</td>
                <td>{$rows['password']}</td>
                <td>{$rows['contact_number']}</td>
                <td>{$rows['date']}</td>
            </tr>
        ";

    }
    echo  "</tbody>
</table>";

    ?>
</div>



</body>
</html>
