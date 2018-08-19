<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = 'admin';
const DATABASE = 'learn_php';

$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
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
    <div class="jumbotron">
        <h2>Simple CRUD (PHP With MySQL)</h2>
    </div>
    <h2>Insert New User</h2>
    <form class="col-md-6" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <label for="contact-number">Contact Number</label>
            <input type="number" class="form-control" name="contact-number">
        </div>
        <div class="form-group">
            <input type="submit" value="submit" class="btn btn-danger" name="submit">
        </div>
    </form>
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

<?php
if (isset($_POST['submit'])) {
    $username = mysqli_real_connect($conn, strip_tags($_POST['username']));
    $email = mysqli_real_connect($conn, strip_tags($_POST['email']));
    $password = mysqli_real_connect($conn, strip_tags($_POST['password']));
    if ($_POST['contact-number']) {
         $contactNumber = mysqli_real_connect($conn, strip_tags($_POST['contact-number']));
    }
    $date = date('Y-m-d');

    $ins_sql = "INSERT INTO users (name, email, password, contact_number, date) 
                VALUES('$username', '$email', '$password', '$contactNumber', $date)";

    $run = mysqli_query($conn, $ins_sql);

}
?>
