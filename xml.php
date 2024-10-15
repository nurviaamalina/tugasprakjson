<?php header('Content-Type: application/xml');
$xml = new SimpleXMLElement('<persons/>');
$music = $xml->addChild('person');
$music ->addChild('id', 1);
$music ->addChild('title', 'Sisa Rasa');
$music ->addChild('penyanyi', 'Mahalini');
echo $xml->asXML();
?>