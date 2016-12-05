<?php

include 'mapconnect.php';
echo "<br>";
$myfile = fopen("cities1", "r") or die("Unable to open file!");
$str="";

while(!feof($myfile)){
	$str=$str . fgets($myfile);
	}
fclose($myfile);

//vzimame purvo longitude i posle latitude
$numbers=get_numerics($str);
$x=0;
for($i=3;$i<sizeof($numbers);$i=$i+3){
$arrayOfNumbers[$x]=$numbers[$i-2];
$arrayOfNumbers[$x+1]=$numbers[$i-1];
$x=$x+2;
}

print_r($arrayOfNumbers);



//vzimame samo imenata na gradove
$names=explode("\"",$str);

$z=0;
for($i=5;$i<sizeof($names);$i=$i+16){
$arrayOfNames[$z]=$names[$i];
$z++;
}

// Uspeshna zaqvka ot php script;
//$newline = "INSERT INTO mappoints
//		(mapID, pointLat,pointLong,pointText)
//		VALUES(1, 9, 13, 'Check1')";
//
// if(!$insertmap = $con->query($newline)){
//   die('There was an error running the query [' . $con->error . ']');
// }

print_r($arrayOfNumbers);
for($i=0,$j=1;$i<sizeof($arrayOfNames);$i++,$j=$j+2){

echo  "<br>" . $arrayOfNames[$i] . $arrayOfNumbers[$j] . "  The next is " . $arrayOfNumbers[$j-1] . "<br>" ;
}




//for($i=1,$j=0;$i<sizeof($arrayOfNames);$i++,$j=$j+2){
//$newline = "INSERT INTO mappoints
//		(mapID, pointLat,pointLong,pointText)
//		VALUES(4, $arrayOfNumbers[$j], $arrayOfNumbers[$j-1], '$arrayOfNames[$i]')";
//	 
// if(!$insertmap = $con->query($newline)){
//    die('There was an error running the query [' . $con->error . ']');
//  }
//}


echo "<br>" . " Everything was good";

//funkciq za otdelqne na vsichki chisla v stringa
function get_numerics ($str) {
    preg_match_all('(-?\d+(?:\.\d+)?+)', $str, $matches);
    return $matches[0];
}

?>
