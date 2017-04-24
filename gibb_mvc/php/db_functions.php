<?php
/*
 *  @autor Michael Abplanalp
 *  @version Februar 2017
 *  Dieses Modul beinhaltet sämtliche Datenbankfunktionen.
 *  Die Funktionen formulieren die SQL-Anweisungen und rufen dann die Funktionen
 *  sqlQuery() und sqlSelect() aus dem Modul basic_functions.php auf.
 */

/*
 * Datenbankfunktionen zur Tabelle user
 */
function db_select_user() {
	$sql = "select * from user";
	return sqlSelect($sql);
}
?>