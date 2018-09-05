<?php

include 'db.php';

if (isset($_REQUEST['submit_form'])) {
    $ins_sql = "INSERT INTO ajax.users (u_name, u_email, u_number, u_notes) VALUES (
                    '$_REQUEST[username]', 
                    '$_REQUEST[email]', 
                    '$_REQUEST[contactnumber]', 
                    '$_REQUEST[notes]'
                )";
    $run_sql = mysqli_query($conn, $ins_sql);
}

$sql = "SELECT * FROM ajax.users";
$run = mysqli_query($conn, $sql);

$c = 1;

while ($rows = mysqli_fetch_assoc($run)) {
    echo "
        <tr>
            <td>$c</td>
            <td>$rows[u_name]</td>
            <td>$rows[u_email]</td>
            <td>$rows[u_number]</td>
            <td>$rows[u_notes]</td>
            <td><button class=\"btn btn-success\">Edit</button> <button class=\"btn btn-danger\">Delete</button></td>
        </tr>
    ";
    $c++;
}

