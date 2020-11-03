 <?php
 include 'dinamic_head.php';
 include 'db_kapcsolat.php';
 include 'fuggv_ossz.php';
 ?>
 
 
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <fieldset>
	  <legend><h4>Válaszd ki, milyen adatokat szeretnél látni:</h4></legend>
	  </br>
	  Lecke száma:
		<?php 		
		$lecke_sorsz=0;
		print lecke_szur();//legördülő lista a létező leckékbők	
		?>	  
	  <input type="submit" name="submit" id="button" value="Küld">
	  </br>
  </fieldset>  
 </form>
 </br>
 <?php
     //___ADATOKAT FOGADJA_____________________________________________        
     if ($_SERVER["REQUEST_METHOD"] == "POST") {      
     $lecke_sorsz = test_input($_POST["lecke_sorsz"]); 
     }	
	
	 if($lecke_sorsz==0){print "<b><p>Legnagyobb számú lecke szavai: </p></b>". utolso_lecke_kiir();
	 //ha még nincs lekért lecke: az utolsó az alapértelmezett
     }else{print "<b><p>Kért lecke szavai: </p></b>".lecke_kiir($lecke_sorsz);			
	 }//egyébként, azt íratjuk ki, amit a felhasználó kér.
 
 include 'dinamic_foot.php';
 ?>