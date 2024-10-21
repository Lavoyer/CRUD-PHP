<!-- Rafael Lavoyer RA:22208760 -->
<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
?>