<?php
    $servername = 'sql110.epizy.com';
    $username = 'epiz_33088872';
    $db = 'epiz_33088872_finals';
    $password = 'Wq7560zlnC';
    $conn = new mysqli($servername, $username, $password,$db);
    session_start();
    if($_SESSION != null) {
        $IDNum=$_SESSION["IDNum"];
        $query = mysqli_query($conn,"SELECT * FROM Teachers WHERE teach_id='$IDNum'");
        if(mysqli_num_rows($query)==0){
            header("location: user_home.php");
        }  else header("location: admin_home.php");}
         
    else {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $IDNum = $_POST['IDNum'];
            $Pass = $_POST['pass'];
            $query = mysqli_query($conn,"SELECT * FROM Teachers WHERE teach_id='$IDNum'");
            $row = $query->fetch_assoc(); 
            if(mysqli_num_rows($query)>0 && $row['pass']==$Pass){
                if(isset($_POST['check'])) {
                
                    $cookie_time = 100;
                    $cookie_time_oneset = $cookie_time + time();
                    setcookie($row["teach_id"], $IDNum, $cookie_time_oneset);
                    setcookie($row["pass"], $Pass, $cookie_time_oneset);
                    } else {
                    $cookie_time_remove = time() - $cookie_time;
                    setcookie($row["teach_id"], "", $cookie_time_oneset);
                    setcookie($row["pass"], "", $cookie_time_oneset);
                    }
                    $_SESSION['IDNum'] = $IDNum;
                    $_SESSION['pass'] = $Pass;
                    $_SESSION['login'] = true;
                    header('location: admin_home.php');
            } else
                $query = mysqli_query($conn,"SELECT * FROM Students WHERE School_id='$IDNum'");
                $row = $query->fetch_assoc(); 
                if(mysqli_num_rows($query)>0 && $row['pass']!=$Pass){
                    if(isset($_POST['check'])) {
                        $cookie_time = 100;
                        $cookie_time_oneset = $cookie_time + time();
                        setcookie($row["School_id"], $IDNum, $cookie_time_oneset);
                        setcookie($row["pass"], $Pass, $cookie_time_oneset);
                        } 
                        else {
                        $cookie_time_remove = time() - $cookie_time;
                        setcookie($row["School_id"], "", $cookie_time_oneset);
                        setcookie($row["pass"], "", $cookie_time_oneset);
                        }
                        $_SESSION['IDNum'] = $IDNum;
                        $_SESSION['pass'] = $Pass;
                        $_SESSION['login'] = true;
                        header('location: user_home.php');
                    
                } else echo"<p>Incorrect username or password.</p>";
                
            } 
            
    }
    $conn->close();
    ?>