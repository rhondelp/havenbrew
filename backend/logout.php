<?php
session_start(); //
session_unset(); // e clear niya fullname gamit  
session_destroy(); // 
header("Location: ../login.php?logged_out=true");
exit();
?>
