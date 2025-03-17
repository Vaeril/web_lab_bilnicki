<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" 
integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
<title>Konwerter</title>
</head>
<body>
	
<div style="width:80%; margin: 2em auto; text-align: center;">
	<a href="<?php print(_APP_ROOT); ?>/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="text-align: center; margin: 2em auto; width=80%;" >
<form action="<?php print(_APP_URL);?>/app/converter.php" method="post" class="pure-form">
<fieldset>
<legend>Konwerter liczb</legend>
<div class="pure-g">
		<div class="pure-u-1">
		<label for="id_input_number">Liczba</label>
		</div>
		<div class="pure-u-1" style="margin: 0.5em auto">
		<input id="id_input_number" type="text" name="input" value="<?php out($input) ?>" />
		</div>
		<div class="pure-u-1" style="margin: 0.5em auto"></div>
		<div class="pure-u-1">
		<label for="id_buttons">Wybierz system</label>
		</div>
			<div class="pure-u-1-5"></div>
            <div class="pure-u-1-5">
			<button type="submit" style="margin: 10px; width: 50%" class="pure-button" name="input_type" value="2">Binary</button>
            </div>
            <div class="pure-u-1-5">
			<button type="submit" style="margin: 10px; width: 50%" class="pure-button" name="input_type" value="10">Decimal</button>
            </div>
            <div class="pure-u-1-5">
			<button type="submit" style="margin: 10px; width: 50%" class="pure-button" name="input_type" value="16">Hex</button>
            </div>
</div>
</fieldset>
</form>
</div>

<?php if(isset($messages) && count($messages) > 0) { ?>

<div style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">
<ul>
<?php 
foreach($messages as $msg){
	print("<li>".$msg."</li>");
}
?>
</ul>
</div>
<?php } else {
if(isset($results) && !empty($results)){ ?>

<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
<div style="margin: 1em;">	
Liczba dziesiętna: 
<?php out($results[1]); ?>
</div>

<div style="margin: 1em;">
Liczba szestnastkowa:
<?php out($results[2]); ?>
</div>

<div style="margin: 1em;">	
Liczba binarna: 
<?php out($results[0]); ?>
</div>
</div>

<?php } } ?>

</body>
</html>