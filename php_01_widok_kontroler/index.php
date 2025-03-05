<?php
// tutaj jest to wymagane. Częściej  wykorzystywany, jest do załączania bibliotek
// _once sprawia, że nie będzie bez sensu ładowania bibliotek wielokrotnie
// dirname (__FILE__) zwraca lokalizację, w której się znajdujemy. Dzięki temu możemy np. zapamiętać lokalizację danego skryptu
require_once dirname(__FILE__).'/config.php';

//przekierowanie przeglądarki klienta (redirect)
//header("Location: "._APP_URL."/app/calc_view.php");

//przekazanie żądania do następnego dokumentu ("forward")
// tutaj się załącza skrypt. De facto działa tak jak require
include _ROOT_PATH.'/app/calc_view.php';