<?php
require realpath("../inc/website.inc.php");
header('Content-Disposition: attachment; filename="enrollments.csv"');
getCSVDataForEnrollments();

?>

