<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" 
integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
<title>Konwerter</title>
</head>
<body>

<div style="text-align: center; margin: 2em auto; width=80%;" >
<form action="<?php print(_APP_URL);?>/app/converter.php" method="post" class="pure-form">
<fieldset>
<legend>Logowanie</legend>
<div class="pure-g">
		<div class="pure-u-1">
		<label for="id_input_number">Login</label>
		</div>
		<div class="pure-u-1" style="margin: 0.5em auto">
		<input id="id_login" type="text" name="login" value="<?php out($form['login']); ?>" />
		</div>
		<div class="pure-u-1">
		<label for="id_input_number">Hasło</label>
		</div>
		<div class="pure-u-1" style="margin: 0.5em auto">
		<input id="id_pass" type="password" name="password" />
		</div>
		<div class="pure-u-1" style="margin: 0.5em auto"></div>
		<div class="pure-u-1">
        <input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
</div>
</fieldset>
</form>
</div>

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>


</body>
</html>