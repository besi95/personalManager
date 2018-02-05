<?php
include 'config.php';

$userId = $_GET['userId'];

$exportQuery = "SELECT *,concat(perdorues.emri,' ',perdorues.mbiemri) as zoterues FROM `nr_telefoni`
                INNER JOIN perdorues ON perdorues.perdorues_id = nr_telefoni.perdorues_id WHERE nr_telefoni.perdorues_id = '{$userId}'";
$result = $conn->query($exportQuery);


$userid = 'user_id-' . $userId;

$string = '<kontakteTelefonike>';

while ($row = $result->fetch_assoc()) {

    $id = $row['nr_id'];
    $emer = $row['emer_kontakti'];
    $numri = $row['numri'];
    $tipi = $row['tipi'];
    $shteti = $row['shteti'];
    $perdoruesId = $row['perdoruesId'];
    $zoteruesEmer = $row['zoterues'];


    $string .= '<kontakt>';
    $string .= '<kontaktId>' . $id . '</kontaktId>';
    $string .= '<emerKontakti>' . $emer . '</emerKontakti>';
    $string .= '<numri>' . $numri . '</numri>';
    $string .= '<tipi>' . $tipi . '</tipi>';
    $string .= '<shteti>' . $shteti . '</shteti>';
    $string .= '<perdoruesId>' . $perdoruesId . '</perdoruesId>';
    $string .= '<zoteruesEmer>' . $zoteruesEmer . '</zoteruesEmer>';
    $string .= '</kontakt>';


}

$string .= '</kontakteTelefonike>';


file_put_contents('xml/' . $userid . '.xml', $string);
chmod('xml/' . $userid . '.xml', 0664);


$xml = new DOMDocument();
$xml->load('xml/' . $userid . '.xml');

$xsl = new DOMDocument;
$xsl->load('xslt/kontakt.xsl');

$proc = new XSLTProcessor();
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);
