<?php
include_once("db_kapcsolat.php");
// ____________________________________________________________________________
//inputot megtisztítja szóköz, speciáis char...
// ____________________________________________________________________________
 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

// ____________________________________________________________________________
//feltölti az űrlap adatait az adatbázisba
// ____________________________________________________________________________
 function feltolt($lecke, $angol, $magyar, $szofaj){
	 global $MySqliLink;
     $InsertIntoStr = "INSERT INTO angol 
	 (lecke, angol, magyar, szofaj)VALUES
	 ('$lecke','$angol','$magyar', '$szofaj')";  
	 if (!mysqli_query($MySqliLink,$InsertIntoStr)){
	 echo " MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink);
	 }	 
	 print "Feltöltve!";
 }

// ____________________________________________________________________________
//random adja a kérdéseket: lecke_sorsz van választva
// ____________________________________________________________________________
 
 function random_kerdes($lecke_sorsz){ 
         global $MySqliLink;
	
		 $SelectStr = "SELECT count( * ) FROM angol
		 WHERE lecke=$lecke_sorsz and jo_valasz_szam=0		  
		 ";
		 $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
		 while($row = mysqli_fetch_array($result))
		 {
		 $sor_db = $row['count( * )']-1;
		 print "<p>Szavak száma, amiből kérdez: ".$sor_db."</p></br>";
		 }	  
		 $random_szam = rand(0,$sor_db);
		 //print "Sorszám:".$random_szam."<br>";
		 $sql = "
		 SELECT *
		 from angol
		 WHERE lecke=$lecke_sorsz and jo_valasz_szam=0
		 LIMIT $random_szam,1";
		 return $sql;
 }
 
// ____________________________________________________________________________
//milyen leckék léteznek: legördülő menübe
// ____________________________________________________________________________
 function lecke_szur(){
    global $MySqliLink;
	$SelectStr = "SELECT DISTINCT lecke FROM angol
	ORDER by lecke DESC";

	$result = mysqli_query($MySqliLink,$SelectStr) OR die
	("Hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
	$kiir="";
	 $kiir.= "<select name=\"lecke_sorsz\">";	 
	while($sor = mysqli_fetch_array($result))
	  {$kiir.= "<option value = ".$sor['lecke'].">".$sor['lecke']."</option>";         
	  }
	$kiir.= "</select>";
	$kiir.= "</br></br>";
    return	$kiir;
}
// ____________________________________________________________________________
//legnagyobb számú lecke száma
// ____________________________________________________________________________
 
 function utolso_lecke_sorsz(){
	global $MySqliLink;
	    $sql = "SELECT *
				from angol
				WHERE lecke=(SELECT MAX(lecke) FROM angol);
				";
		$angol = $MySqliLink->query($sql);
        $sor = $angol->fetch_array(MYSQLI_ASSOC);
		print $sor["lecke"];		
}

// ____________________________________________________________________________
//utolsó leckét táblázatba kiírja
// ____________________________________________________________________________
 function utolso_lecke_kiir(){
	global $MySqliLink;
            $sql = "
			SELECT *
			from angol
			WHERE lecke=(SELECT MAX(lecke) FROM angol);
			";
			
            $kiir="";			
			$angol = $MySqliLink->query($sql);
			if($angol->num_rows==0){$kiir.= "Nincs ilyen adat";
			}else{				
				$kiir.= "<table>";
			$kiir.= "<tr>
				<td>ID</td>
				<td>Lecke</td>				
				<td>Szófaj</td>
				<td>Magyar</td>
				<td>Angol</td>				
				</tr>";
			while ($sor = $angol->fetch_array(MYSQLI_ASSOC)):
				$kiir.= "<tr>";		
				$kiir.= "<td>".$sor["Id"]."</td> ";//id
				$kiir.= "<td>".$sor["lecke"]."</td>";//lecke				
				$kiir.= "<td>".$sor["szofaj"]."</td>";//szofaj
				//_____________________________________________
                switch($sor["szofaj"]){	//magyar			
				 case "főnév_noun":				
				     $kiir.= "<td class=\"fonev\">".$sor["magyar"]."</td>";
				     break;
				 case "ige_verb":				
				    $kiir.= "<td class=\"ige\">".$sor["magyar"]."</td>";
				    break;
				 case "melléknév_adjectives":				
				     $kiir.= "<td class=\"melleknev\">".$sor["magyar"]."</td>";
				     break;
				 case "határozószó_adverb":				
				     $kiir.= "<td class=\"hatarozoszo\">".$sor["magyar"]."</td>";
				     break;				
				default:
                     $kiir.= "<td>".$sor["magyar"]."</td>";
                }				
				//_____________________________________________
				  switch($sor["szofaj"]){	//angol			
				 case "főnév_noun":				
				     $kiir.= "<td class=\"fonev\">".$sor["angol"]."</td>";
				     break;
				 case "ige_verb":				
				    $kiir.= "<td class=\"ige\">".$sor["angol"]."</td>";
				    break;
				 case "melléknév_adjectives":				
				     $kiir.= "<td class=\"melleknev\">".$sor["angol"]."</td>";
				     break;
				 case "határozószó_adverb":				
				     $kiir.= "<td class=\"hatarozoszo\">".$sor["angol"]."</td>";
				     break;					 
				default:
                     $kiir.= "<td>".$sor["angol"]."</td>";
                }				
				
				$kiir.= "</tr>";    		
			endwhile;
			$kiir.=  "</table> <br/> <br/>";}
			return $kiir;
}
// ____________________________________________________________________________
//választott leckét táblázatba kiírja
// ____________________________________________________________________________
 function lecke_kiir($lecke_sorsz){
	global $MySqliLink;
           $sql = "
			SELECT *
			from angol
			WHERE lecke=$lecke_sorsz
            order by angol			
			";	
            $kiir="";
			$angol = $MySqliLink->query($sql);
			if($angol->num_rows==0){$kiir.= "Nincs ilyen adat";
			}else{
				$kiir.= "<table>";
			$kiir.= "<tr>
				<td>ID</td>
				<td>Lecke</td>				
				<td>Szófaj</td>
				<td>Magyar</td>
				<td>Angol</td>				
				</tr>";
			while ($sor = $angol->fetch_array(MYSQLI_ASSOC)):

				$kiir.= "<tr>";		
				$kiir.= "<td>".$sor["ID"]."</td> ";//id
				$kiir.= "<td>".$sor["lecke"]."</td>";//lecke				
				$kiir.= "<td>".$sor["szofaj"]."</td>";//szófaj
				
                //_____________________________________________
                switch($sor["szofaj"]){	//magyar			
				 case "főnév_noun":				
				     $kiir.= "<td class=\"fonev\">".$sor["magyar"]."</td>";
				     break;
				 case "ige_verb":				
				    $kiir.= "<td class=\"ige\">".$sor["magyar"]."</td>";
				    break;
				 case "melléknév_adjective":				
				     $kiir.= "<td class=\"melleknev\">".$sor["magyar"]."</td>";
				     break;
				 case "határozószó_adverb":				
				     $kiir.= "<td class=\"hatarozoszo\">".$sor["magyar"]."</td>";
				     break;				 
				default:
                     $kiir.= "<td>".$sor["magyar"]."</td>";
                }				
				//_____________________________________________
				  switch($sor["szofaj"]){	//angol			
				 case "főnév_noun":				
				     $kiir.= "<td class=\"fonev\">".$sor["angol"]."</td>";
				     break;
				 case "ige_verb":				
				    $kiir.= "<td class=\"ige\">".$sor["angol"]."</td>";
				    break;
				 case "melléknév_adjective":				
				     $kiir.= "<td class=\"melleknev\">".$sor["angol"]."</td>";
				     break;
				 case "határozószó_adverb":				
				     $kiir.= "<td class=\"hatarozoszo\">".$sor["angol"]."</td>";
				     break;					 
				default:
                     $kiir.= "<td>".$sor["angol"]."</td>";
                }				
				
				$kiir.= "</tr>";    		
			endwhile;
			$kiir.=  "</table> <br/> <br/>";}
			return $kiir;
}
// ____________________________________________________________________________
//Jó_válasz_számot nulláz, így a kikérdező újra minden szót kérdez
// ____________________________________________________________________________
 function nullaz($lecke_sorsz){
	global $MySqliLink;
	 $UpdateStr = "UPDATE angol SET jo_valasz_szam = 0
	 WHERE lecke=$lecke_sorsz";
	 
	 if (!mysqli_query($MySqliLink,$UpdateStr)) {
	   die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
	 }else
	 return true;
 }
// ____________________________________________________________________________
//Hangfájok linkjét teszi ki:US
// ____________________________________________________________________________
 function sound_US($word, $folder='./US/') {	
      return '<a href="'.$folder.$word.'.mp3'.'">US:<img src="sound.gif"/></a>';
	  } 
// ____________________________________________________________________________
//Hangfájok linkjét teszi ki:UK
// ____________________________________________________________________________	  
function sound_UK($word, $folder='./UK/') {	
      return '<a href="'.$folder.$word.'.mp3'.'">UK:<img src="sound.gif"/></a>';
	  }
 	  
?>		