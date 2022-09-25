<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<style>
table, th, td {
    border: 1px solid black;
}
table{
    margin-left:300px;
}
</style>


<?php
// -----------------------------------------------Draw The table-----------------------------------
include 'header.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT *
from users
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>email</th><th>Phone Number</th><th>Full Name</th><th>Passward</th><th>edit or delete</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?= $row["ID"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["phoneNum"] ?></td>
            <td><?= $row["fullName"] ?></td>
            <td><?= $row["Passward"] ?></td>
            <td>
                <a href="usersedit.php?id=<?=$row["ID"]?> " class="btn btn-success" >Edit</a>
                <a href="delete.php?id=<?= $row["ID"]?>" class="btn btn-danger">Delete</a>

            </td>
        </tr>
       <?php
       };
    };
       ?>
<?php
  
//    include 'footer.php';
?>
