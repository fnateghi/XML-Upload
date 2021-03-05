<?php
//Datenbank on the fly anlegen
// SQL SYNTAXE GROß SCHREIBEN, AUFGRUND DER SABERKEIT UND ERKENNBARKEIT
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

// UTF8         Windows          Unix
$myPDO->exec("SET NAMES utf8;Set CHARACTER SET UTF8");
//Datenbank installieren

//Leerzahichen in SQL ist wichtig und muss man machen
$myPDO->exec("CREATE DATABASE IF NOT EXISTS ".DBNAME); 

//Datenbank anbinden
$myPDO->exec("USE ".DBNAME); //bereitstellen
// Datenbanken anzeigen

// Tabellenaufbau //TELEFONBUCH
//Händler Tabelle
$sql[] = "CREATE TABLE IF NOT EXISTS tb_artikel ( 
            id INT(10) AUTO_INCREMENT PRIMARY KEY,
            artikelnummer INT(10), 
            mengeneinheit VARCHAR(100) NOT NULL,
            artikelbezeichnung VARCHAR(100) NOT NULL,
            vpe VARCHAR(10) NOT NULL
            )";
foreach($sql as $do){
    $myPDO->exec($do);
    checkSQLSyntax();
}    

print_r(get_class_methods($myPDO));
echo "<script>window.close();</script>";
?>


https://github.com/shawondeveloper/insertxmldata/blob/master/index.php
