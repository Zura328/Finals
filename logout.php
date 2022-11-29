<?php
    session_start();
    session_unset();
    session_destroy();
    echo "<div class='result'>You have successfully logged
    out!</div><br>";
    echo "<a class='button' href='login.php'>Log in</a>";
?>