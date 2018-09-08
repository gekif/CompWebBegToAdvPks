<?php

include 'db.php';

if (isset($_REQUEST['submit_form'])) {

    $user_name = mysqli_real_escape_string($conn, strip_tags($_REQUEST['username']));
    $email = mysqli_real_escape_string($conn, strip_tags($_REQUEST['email']));
    $contactnumber = mysqli_real_escape_string($conn, strip_tags($_REQUEST['contactnumber']));
    $notes = mysqli_real_escape_string($conn, strip_tags($_REQUEST['notes']));


    $ins_sql = "INSERT INTO ajax.users (u_name, u_email, u_number, u_notes) VALUES (
                    '$user_name', 
                    '$email', 
                    '$contactnumber', 
                    '$notes')";
    $run_sql = mysqli_query($conn, $ins_sql);
}

if (isset($_REQUEST['del_id'])) {
    $del_sql = "DELETE FROM ajax.users WHERE u_id = '$_REQUEST[del_id]'";
    $del_run = mysqli_query($conn, $del_sql);
}

if (isset($_REQUEST['edit_form'])) {
    $user_name = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_username']));
    $email = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_email']));
    $contactnumber = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_contactnumber']));
    $notes = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_notes']));

    $edit_sql = "UPDATE ajax.users SET 
                      u_name = '$user_name',
                      u_email = '$email',
                      u_number = '$contactnumber',
                      u_notes = '$notes'
                 WHERE u_id = '$_REQUEST[edit_id]'
                ";
    mysqli_query($conn, $edit_sql);
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
            <td class='text-left'><button class=\"btn btn-success\" data-toggle='modal' data-target='#edit_person$rows[u_id]' data-backdrop='static'>Edit</button> <button class=\"btn btn-danger\" onclick=\"delete_func('$rows[u_id]');\">Delete</button>
            
            <div class=\"modal fade\" id=\"edit_person$rows[u_id]\">
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <button class=\"close\" data-dismiss=\"modal\">&times;</button>
                        <h4>Edit Person</h4>
                    </div>
                    <div class=\"modal-body\">
                        <form onsubmit=\"return edit_form($rows[u_id]);\" id=\"edit_form$rows[u_id]\">
                            <div class=\"form-group\">
                                <label>Name</label>
                                <input type=\"text\" id=\"edit_username$rows[u_id]\" class=\"form-control\" value='$rows[u_name]' required>
                            </div>
                            <div class=\"form-group\">
                                <label>Email</label>
                                <input type=\"email\" id=\"edit_email$rows[u_id]\" class=\"form-control\" value='$rows[u_email]' required>
                            </div>
                            <div class=\"form-group\">
                                <label>Contact Number</label>
                                <input type=\"number\" id=\"edit_contactnumber$rows[u_id]\" class=\"form-control\" value='$rows[u_number]' required>
                            </div>
                            <div class=\"form-group\">
                                <label>Notes</label>
                                <textarea class=\"form-control\" id=\"edit_notes$rows[u_id]\">$rows[u_notes]</textarea>
                            </div>
                            <div class=\"form-group\">
                                <button class=\"btn btn-info btn-block btn-lg\">Done Editing</button>
                            </div>
                        </form>
                    </div>
                    <div class=\"modal-header\">
                        <div class=\"text-right\">
                            <button class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </td>
        </tr>
    ";
    $c++;
}

