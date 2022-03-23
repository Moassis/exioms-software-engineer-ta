<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
$server="localhost";
$username="root";
$password="";
//Create connection
$con=mysqli_connect($server, $username, $password);
// Check connection
if (!$con) {
  die("connection to this database failed due to".mysqli_connect_error());
}

//INSERT INTO `summary` (`Member Name`, `Parent Name(Who referred member)`, `Total Downline Members`, `L0 Commission`, `L1 Commission`, `L2 Commission`, `L3 Commission`) VALUES ('Ravindra', 'Nath', '7', '90', '40', '60', '70');

$sql = "SELECT * FROM `report 1 (summary)`.`summary`";
$result = $con->query($sql);

if ($result->num_rows > 0) {

    echo "<h3>Report 1 (Summary)</h3>";
    echo "<table><tr><th>Member Name</th><th>Parent Name(Who referred member)</th><th>Total Earned Commision</th><th>Total Downline Members</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Member Name"]. "</td><td>" . $row["Parent Name(Who referred member)"]. "</td><td>" . ($row["L0 Commission"]+$row["L1 Commission"]+$row["L2 Commission"]+$row["L3 Commission"]). "</td><td>" . $row["Total Downline Members"]. "</td></tr>";
    }
    echo "</table>";

    $result = $con->query($sql);

    echo "<h3>Report 2 (Level Wise Commission)</h3>";
    echo "<table><tr><th>Name</th><th>L0 Commission</th><th>L1 Commission</th><th>L3 Commission</th><th>L4 Commission</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Member Name"]. "</td><td>" . ($row["L0 Commission"]*5/100). "</td><td>" . ($row["L1 Commission"]*3/100). "</td><td>" . ($row["L2 Commission"]*2/100). "</td><td>" . ($row["L3 Commission"]*1/100). "</td></tr>";
    }
    echo "</table>";
    
} 
else {
    echo "0 results";
}

if ($con->query($sql) == TRUE) {
    echo "Success";
} 
else {
    echo "Error creating table: " . $con->error;
}
$con->close();
?>

</body>
</html>