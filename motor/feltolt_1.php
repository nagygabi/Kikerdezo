<?php
include 'dinamic_head.php';
include_once("db_kapcsolat.php");
include_once("fuggv_ossz.php");
?>
	<form method="post" action="feltolt_2.php">	
		<fieldset>
		    <legend><h4>Válassz, melyik számú leckébe viszed be a szavakat: </h4></legend>   
			Lecke száma (változtathatsz!):
			<input type="text" name="lecke" id="focus" value="<?php print utolso_lecke_sorsz(); ?>" size=4>
			<br><br>			
		</fieldset>
		<br><br>
		<input type="submit" name="submit" id="button" value="Küld">
		<br><br>
	</form>	
<?php
include 'dinamic_foot.php';
?>