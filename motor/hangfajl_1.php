<?php
 include 'dinamic_head.php'; 
?>
 <form action="hangfajl_2.php" method="post">
  <fieldset>
	  <legend><h4>Válaszd ki a tartományt, amelyik szavakhoz szeretnéd feltölteni a hangfájlt:</h4></legend>
	  </br>
	  Legkisebb ID: <input type="text" name="min_id" size=5 >
	  </br></br>
	  Legnagyobb ID: <input type="text" name="max_id" size=5>
	  </br></br>
	  <input type="submit" name="submit" id="button" value="Küld"> 
	  </br></br>	 
  </fieldset>  
 </form>
<?php
include 'dinamic_foot.php';
?>