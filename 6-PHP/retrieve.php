<?php

include "connection.php";

$sql = "SELECT * FROM users";
$run = mysqli_query($conn, $sql);
/*
while($rows = mysqli_fetch_assoc($run) ) {
    echo $rows['name'] . ' ' . $rows['password'] . '<br>';
}*/

echo "
    <table>
        <thead>
            <tr>
                <th>s.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Contact Number </th>
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
            </tr>
        ";

}
echo  "</tbody>
</table>";

?>


