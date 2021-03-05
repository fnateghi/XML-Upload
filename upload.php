<?php
// Upload Pfad
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Überprüfen, ob die Datei bereits exitiert
if (file_exists($target_file))
{
    echo "Die Datei existiert bereits.";
    $uploadOk = 0;
}
// Dateigröße überprüfen MAX. 5 Megabyte
if ($_FILES["fileToUpload"]["size"] > 5000000)
{
    echo "Die Datei ist zu groß. ";
    $uploadOk = 0;
}
// Nur XML Datei zulassen
if ($FileType != "xml")
{
    echo "Die Datei ist im falschen Format. ";
    $uploadOk = 0;
}
// Check ob $uploadOk von Bedingung auf 0 gesetzt werden
if ($uploadOk == 0)
{
    echo "Datei konnte nicht hochgeladen werden. ";
    // Wenn alles Passt, lade dann hoch
}
else
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
        echo "Die Datei " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " wurde erfolgreich hochgeladen.";
        header('Location: datenseite.php');
        die;
    }
    else
    {
        echo "Ein Fehler ist aufgetreten. ";
    }
}
// Datenbank Connection
$conn = mysqli_connect("localhost", "root", "", "db_händler");
$affectedRow = 0;
$xml = simplexml_load_file("./uploads/daten.xml") or die("Error: Cannot create object");
foreach ($xml->children() as $row)
{
    $art_nr = $row->art_nr;
    $name = $row->name;
    $match = $row->match;
    $vpe = $row->vpe;
    // Trage die Daten in der Tabelle
    $sql = "INSERT INTO tb_artikel(artikelnummer,mengeneinheit,artikelbezeichnung,vpe) VALUES ('" . $art_nr . "','" . $name . "','" . $match . "','" . $vpe . "')";
    $result = mysqli_query($conn, $sql);
    if (!empty($result))
    {
        $affectedRow++;
    }
    else
    {
        $error_message = mysqli_error($conn) . "\n";
    }
}
