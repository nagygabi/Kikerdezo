<?php
	include 'dinamic_head.php';
	$lecke =($_POST["lecke"]);	
?>	
    <form method="post" action="feltolt_3.php">
		<fieldset>
			<legend><h4>Angol és magyar szavak bevitele az adatbázisba </h4></legend>			
			Lecke sorszám: <input type="text" name="lecke"  value="<?php print $lecke;?>" size=4>
			</br></br>	
			Angol: <input type="text" name="angol" id="focus" size=70>     
			<br><br>			
			Magyar: <input type="text" name="magyar" size=70>   
			<br><br>   
			Szófaj:
			<select name="szofaj">	
			  <option value="1">főnév</option>
			  <option value="2">ige</option>
			  <option value="3">melléknév</option>
			  <option value="4">határozószó</option>			 
			  <option value="5">egyéb</option>
			</select>
			<br><br> 
		</fieldset>
		</br></br>
		<input type="submit" name="submit" id="button" value="Küld">
		<br><br>
	</form>	
<?php
include 'dinamic_foot.php';
?>