<?php
$con=mysqli_connect("localhost","detectdiagnostic_detect_db","detectdiagnostic_detect_db") or die (mysqli_error());
$db=mysqli_select_db($con,'detectdiagnostic_detect_db')or die (mysqli_error());
?>