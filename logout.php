<?php
session_start();
unset($_SESSION['sid']);
unset($_SESSION);
session_cache_expire();
session_destroy();
header("Location:Homepage.php");
?>