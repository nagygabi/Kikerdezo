<?php
include 'dinamic_head.php';
include_once("db_kapcsolat.php");
include_once("fuggv_ossz.php");
 //___ADATOKAT FOGADJA_____________________________________________        
     if ($_SERVER["REQUEST_METHOD"] == "POST") {      
     $lecke_sorsz = test_input($_POST["lecke_sorsz"]); 
     }	
     nullaz($lecke_sorsz);
	 print "<h3>".$lecke_sorsz.". számú leckéből minden szót újra kérdez.</h3>";
	 
include 'dinamic_foot.php';
?>  