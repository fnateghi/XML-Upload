<?php
//Datenbank on the fly anlegen
// SQL SYNTAXE GROß SCHREIBEN, AUFGRUND DER SAUBERKEIT UND ERKENNBARKEIT
//Konstante
define("HOST","localhost");//MySQLdomain
define("USER","root");//Username zur Datenbank
define("PASS","");//Passwort zur Datenbank
define("DBNAME","DB_händler");// Name festlegen

try {
$myPDO = new PDO("mysql:host=".HOST , USER , PASS ); //der Aufbau die Verbindung 
}
catch(PDOException $e){ //eigene Klasse auf PHP Server
    //code hier abbrechen
    exit("Error".$e->getMessage());//Fehler anzeigen
}
//Funktion syntax Test
function checkSQLSyntax(){
    global $myPDO;
    $arr = $myPDO->errorInfo(); //liefert Fehlerarray
    // 0/1  23534   Text
    echo $arr[2];
}
?>