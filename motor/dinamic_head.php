<?php
include ("motor.php");
$dinamic_content = new MOTOR ("data_file.txt");
?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="author" content="Valami.hu">

<?php
$dinamic_content ->print_meta();
?>

<link rel="stylesheet" href="dinamic_sample.css" type="text/css">
<script type="text/javascript" src="jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="kikerdez.js"></script>
</head>
<body>

	<header id="top">
		    <!--<b><span style="color:red;">(header:id=top)</span></b>-->
		    <h1>Kikérdező</h1>
	</header>  
	
	<div id="body_content">
		<section id="left">
			
			<!--<p style="color:red;"><b>(section:id=left)</p></b>-->
            <!--<b><p style="color:orange;">(body_content:id=body_content)</p></b>-->
            <?php 
            $dinamic_content -> print_menu();
            ?>
            
		</section>
		<article id="center">
		    <!--<b><p style="color:red;">(article:id=center)</p></b>-->
            
		    <?php 
		    $dinamic_content -> print_article_title()
		    ?>
            