<?php
    $servername = 'localhost';
    $username = 'root';
    $db = 'finals';
    $password = '5656';
    $conn = new mysqli($servername, $username, $password,$db);
    session_start();
    $IDNum=$_SESSION["IDNum"];
    $sql = "SELECT * FROM Students";
    $result = $conn->query($sql);
    $counter=10000;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    while($row = $result->fetch_assoc()) {
    $name="S_" . $counter;
    if (isset($_POST[$name])) {
        $_SESSION['StudNum'] = $counter;
        header("location: edit_specific.php");
      }
    $counter++;
    }
}
?>