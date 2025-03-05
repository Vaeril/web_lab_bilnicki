<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<style>
	body {font-family:verdana}
</style>
<title>Konwerter</title>
</head>
<body>

<div style="    text-align: center;
    			padding: 20px 20px 40px 20px;
    			border-radius: 15px;">
<form action="<?php print(_APP_URL);?>/app/converter.php" method="post">
	<label for="id_input_number">Liczba</label><br />
		<input id="id_input_number" type="text" name="input" value="<?php if(isset($input)) print($input); ?>" /><br /><br />
	<label for="id_buttons">Wybierz system</label><br />
		<button type="submit" style="margin: 10px;" name="input_type" value="2">Binary</button>
		<button type="submit" style="margin: 10px;" name="input_type" value="10">Decimal</button>
		<button type="submit" style="margin: 10px;" name="input_type" value="16">Hex</button>
</form>
</div>

<?php if(isset($messages)) { ?>

<div style="    text-align: center;
    			padding: 20px 20px 40px 20px;
    			border-radius: 5px;">
<ul>
<?php 
foreach($messages as $msg){
	print("<li>".$msg."</li>");
}
?>
</ul>
</div>
<?php } else { ?>

<div style="width:33% float left">	

Liczba: 
<?php if(isset($decimal)) echo $decimal; ?>

</div>

<div style="width:33% float left">	

Liczba: 
<?php if(isset($hex)) echo $hex; ?>

</div>

<div style="width:33% float left">	

Liczba: 
<?php if(isset($binary)) echo $binary; ?>

</div>

<?php } ?>

</body>
</html>