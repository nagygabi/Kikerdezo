<?php
include 'dinamic_head.php';
include_once("db_kapcsolat.php");
include_once("fuggv_ossz.php");
?>
<form method="post" action="kikerdez_m_2.php">
    <fieldset><br>
    <legend>Melyik leckéből kéri a kikérdezést:</legend>
	Lecke:
	<?php
	print lecke_szur();	
    ?>  
    <br><br>
    <input type="submit" name="submit" id="button" value="Küld">
    <br><br>
    </fieldset>
</form>
<br><br>
<?php
include 'dinamic_foot.php';
?>