
<?php
include 'dinamic_head.php';
include_once("db_kapcsolat.php");
include_once("fuggv_ossz.php");
?>
 <form action="nullaz_2.php" method="post">
  <fieldset>
	  <legend><h4>Válaszd ki, melyik leckéből kérdezze újra az összes szót:</h4></legend>
	  </br>
	  Hányadik lecke legyen:
		<?php 
		$lecke_sorsz=0;
		print lecke_szur();//legördülő lista a létező leckékbők	
		?>	  
	  <input type="submit" name="submit" id="button" value="Küld">
	  </br></br>
  </fieldset>  
 </form>
<?php 
include 'dinamic_foot.php';
?>  

