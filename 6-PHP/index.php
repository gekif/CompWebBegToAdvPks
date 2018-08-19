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
        <?php
        if (isset($_GET['edit_id'])) {
            $sql = "SELECT *
                    FROM users
                    WHERE id = '{$_GET['edit_id']}'";
            $run = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($run)) {
                $user = $rows['name'];
                $email = $rows['email'];
                $password = $rows['password'];
                $date = $rows['date'];
                $contactNumber = $rows['contact_number'];
            }
            ?>
            <h2>Edit User</h2>
            <form class="col-md-6" method="post">
                <div class="form-group">
                    <label for="edit_user">Name</label>
                    <input type="text" class="form-control" value="<?=$user?>" name="edit_user" required>
                </div>
                <div class="form-group">
                    <label for="edit_email">Email</label>
                    <input type="email" class="form-control" value="<?=$email?>" name="edit_email" required>
                </div>
                <div class="form-group">
                    <label for="edit_password">Password</label>
                    <input type="password" name="edit_password"  class="form-control"  value="<?=$password?>" required>
                </div>
                <div class="form-group">
                    <label for="edit_contact_number">Contact Number</label>
                    <input type="text" name="edit_contact_number" class="form-control"  value="<?=$contactNumber?>" >
                </div>
                <div class="form-group">
                    <input type="hidden" value="<?=$_GET['edit_id']?>" name="edit_user_id">
                    <input type="submit" value="Done Editing" class="btn btn-primary" name="edit_user_btn">
                </div>
            </form>
        <?php } else { ?>
            <h2>Insert New User</h2>
            <form class="col-md-6" method="post">
                <div class="form-group">
                    <label for="username">Name</label>
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
                    <label for="contact_number">Contact Number</label>
                    <input type="text" class="form-control" name="contact_number">
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary" name="submit_user">
                </div>
            </form>
        <?php }
        ?>
        <?php

        $sql = "SELECT id, name, email, contact_number, DATE_FORMAT(DATE(date), '%d-%m-%Y') as date FROM users";
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
                <th>Contact Number</th>
                <th>Joined Date</th>
                <th>Edit</th>
                <th>Delete </th>
            </tr>
        </thead>
        <tbody>
        ";
        $c = 1;
        while ($rows = mysqli_fetch_assoc($run)) {
            echo "
            <tr>
                <td>$c</td>
                <td>{$rows['name']}</td>
                <td>{$rows['email']}</td>
                <td>{$rows['contact_number']}</td>
                <td>{$rows['date']}</td>
                <td><a href='index.php?edit_id={$rows['id']}' class='btn btn-success'>Edit</a></td>
                <td><a href='index.php?del_id={$rows['id']}' class='btn btn-danger'>Delete</a></td>
            </tr>
        ";
            $c++;
        }
        echo  "</tbody>
</table>";

        ?>
    </div>

    </body>
    </html>

<?php
// Inserting New User
if (isset($_POST['submit_user'])) {
    $username = mysqli_real_escape_string($conn, strip_tags($_POST['username']));
    $email = mysqli_real_escape_string($conn, strip_tags($_POST['email']));
    $password = mysqli_real_escape_string($conn, strip_tags($_POST['password']));
    if ($_POST['contact_number']) {
        $contactNumber = mysqli_real_escape_string($conn, strip_tags($_POST['contact_number']));
    }

    $ins_sql = "INSERT INTO users (name, email, password, contact_number) 
                VALUES('$username', '$email', '$password', '$contactNumber')";

    if (mysqli_query($conn, $ins_sql)) { ?>
        <script>window.location = "index.php";</script>
    <?php }
}


//Deleting New User
if (isset($_GET['del_id'])) {
    $del_sql = "DELETE FROM users WHERE id = '{$_GET['del_id']}'";
    if (mysqli_query($conn, $del_sql)) { ?>
        <script>window.location = "index.php";</script>
    <?php }
}

//Updating or editing existing user
if (isset($_POST['edit_user_btn'])) {
    $edit_user = mysqli_real_escape_string($conn, strip_tags($_POST['edit_user']));
    $edit_email = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email']));
    $edit_password = mysqli_real_escape_string($conn, strip_tags($_POST['edit_password']));
    $edit_contact_number = mysqli_real_escape_string($conn, strip_tags($_POST['edit_contact_number']));
    $edit_id = $_POST['edit_user_id'];

    $edit_sql = "UPDATE users SET 
                      name = '{$edit_user}' ,
                      email = '{$edit_email}' ,
                      password = '{$edit_password}',
                      contact_number = '{$edit_contact_number}'
                 WHERE id = '{$edit_id}' ";

    if (mysqli_query($conn, $edit_sql)) { ?>
        <script>window.location = "index.php";</script>
    <?php }
}
?>