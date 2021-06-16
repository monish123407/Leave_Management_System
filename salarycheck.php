<?php
require('top.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:salary.php?id='.$_SESSION['USER_ID']);
	die();
}
else
{
	die('Access denied');
}

?>