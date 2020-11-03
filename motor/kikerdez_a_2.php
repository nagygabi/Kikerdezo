<?php
include 'dinamic_head.php';
include 'db_kapcsolat.php';
include 'fuggv_ossz.php';


    // VÁLTOZÓT FOGAD_________________________________________ 
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 $lecke_sorsz = test_input($_POST["lecke_sorsz"]);     
     }
	
	$sql = random_kerdes($lecke_sorsz);

    $magyar = $MySqliLink->query($sql);
	$sor = $magyar->fetch_array(MYSQLI_ASSOC);
	$m_valasz = $sor["magyar"]; 

	$angol = $MySqliLink->query($sql);
	if($angol->num_rows==0){$a_valasz = "Nincs a keresésnek megfelelő szó.(Vagy elfogyott, amit nem tudtál)";
	}else{ $sor = $angol->fetch_array(MYSQLI_ASSOC);
	$a_valasz = $sor["angol"]; }	
	
	$id = $MySqliLink->query($sql);	
	$sor = $id->fetch_array(MYSQLI_ASSOC);
	$id_valasz = $sor["Id"];
?>	
 <form action="kikerdez_a_3.php" method="post" autocomplete="off" >
	  <fieldset>			  
	  <legend>Új lecke/szófaj választása(kérdés: angol)</legend>
	  Választott lecke sorszáma: <input type="text" name="lecke_sorsz" value="<?php print $lecke_sorsz;?>" size="4">
	  </br>
	  <p class="nyit"> &nbsp; Az írott kérdést itt nyitod-csukod!</p>
	  <div class="ki_be_csuk">
	  Kérdés (angol): <input type="text" name="angol" value="<?php print $a_valasz; ?>" size="70">
	  </br>	 
	  </div>
	  <?php		
	    print  sound_UK($a_valasz)."</br>";
	    print  sound_US($a_valasz)."</br>";
	  ?>
	  </br>     	
	  Ide írd a választ (magyar), vagy egy <b>m</b> betűt, ha tudod: <input type="text" name="valasz_magyar" required="on" id="focus" maxlength="200" size="70" >
	  </br>
	  <div class="rejtett"><!--REJTETT------------------------------------------------------------>	  	  
	  Jó válasz magyarul: <input type="text" name="magyar" value="<?php print $m_valasz;?>" size="70">
	  </br></br>	  	  
	  Id: <input type="text" name="id" value="<?php print $id_valasz;?>" size="70">
	  </br></br>
	  </div><!--EDDIG---REJTETT------------------------------------------------------------>	  
	  </fieldset></br></br>  
	  <input type="submit" name="submit" id="button" value="Küld">
	  </br></br>	  
      </form></br></br>
<?php
include 'dinamic_foot.php';
?>