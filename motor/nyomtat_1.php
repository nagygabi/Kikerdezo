<?php
 include 'dinamic_head.php';
 include 'db_kapcsolat.php';
 include 'fuggv_ossz.php';
 ?> 
 <form action="nyomtat_2.php" method="post">
  <fieldset>
	  <legend><h4>Válaszd ki, melyik leckét szeretnéd nyomtatni:</h4></legend>
	  </br>
	  Hányadik lecke legyen:
		<?php 		
		$lecke_sorsz=0;
		print lecke_szur();//legördülő lista a létező leckékbők	
		?>	  
	  <input type="submit"  value="Küld">
	  </br>
  </fieldset>  
 </form>
 </br>
 <?php
 include 'dinamic_foot.php';
 ?>
