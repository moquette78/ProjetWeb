 <!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>
<?php 
$today=date("Y-m-d"); 
echo $today ;
?>
<body>
	<form method="Post" action="cible.html" >
		<label>Recherche : </label><input type="text" name="search"> </br>
		<label>Date de debut : </label><input type="date" min="2018-01-01" required name="date_d"> <br/
		<label>Date de fin : </label><input type="date" max="<?php echo $today ; ?>" required name="date_f"> <br/>
		<input type="submit"> 
		
	</form>
</body>

</html> 

