<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn === false) {
    die("ERROR: Could not connect." . mysqli_connect_error());
}

$name = $_REQUEST['name'];
$gender = $_REQUEST['gender'];
$email = $_REQUEST['email'];

$work = $_REQUEST['work'];
$workJson = json_encode($work);

$inquiry = $_REQUEST['inquiry'];
$feedback = $_REQUEST['feedback'];

$sql = "INSERT INTO feedback VALUES ('$name', '$gender', '$email', '$workJson', '$inquiry', '$feedback')";

if (mysqli_query($conn, $sql)) {
    echo "Data stored in a database successfully!";
    echo nl2br("\n$name\n $gender\n $email\n $workJson\n $inquiry\n $feedback");
} else {
    echo "ERROR: $sql. " . mysqli_error($conn);
}

mysqli_close($conn);
?>