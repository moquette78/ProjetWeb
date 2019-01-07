 <?php

//TODO Timestemps muessen sitzen; also old_time <= new_time 

$json =  file_get_contents("../JSON/document.json");
$json = json_decode($json,true);

$keywords = array(); //Here are the idexes of the user;  
$indexes_ofUser = array_keys($json["user"],$_REQUEST['user']) ; 
 foreach(array_keys($json["user"],$_REQUEST['user']) as $index){
		$keywords[] = $json["keyword"][$index];
	}

$q = $_REQUEST["q"];

$hint = "";



$counter = 0; // lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($keywords as $name) {
        if (stristr($q, substr($name, 0, $len)) && (($_REQUEST["start"] <= $json["date"][$indexes_ofUser[$counter]]  && $json["date"][$indexes_ofUser[$counter++]]  <= $_REQUEST["end"]) || ( $_REQUEST["start"] === "" && $_REQUEST["end"] === "")   )) {
		 
			if ($hint === "") {
				$hint = $name;
			    } else {
				$hint .= ",$name";
			    }
        }
    
}
}
//&& ($_REQUEST["start"] <= $json["date"][$indexes_ofUser[$counter]]  && $json["date"][$indexes_ofUser[$counter++]]  <= $_REQUEST["end"])

// Output "no suggestion" if no hint was found or output correct values


echo $hint === "" ? "no suggestion" : $hint; 

?> 
