<?php
session_start();
echo 'Welcome '.$_SESSION['username'];
echo '<br><a href="home.php?action=logout">Logout</a>';
?>