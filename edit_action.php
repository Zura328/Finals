<?php
        $servername = 'sql110.epizy.com';
        $username = 'epiz_33088872';
        $db = 'epiz_33088872_finals';
        $password = 'Wq7560zlnC';
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