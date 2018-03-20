<?php
require("inc/db.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

//Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Select all the rows in the markers table
$sql = "SELECT * FROM markers WHERE 1";
$query = $db->query($sql);
$result = $query->fetchAll();


// Iterate through the rows, adding XML nodes for each
for($i = 0; $i <count($result);$i++){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("name",$result[$i]['name']);
  $newnode->setAttribute("address", $result[$i]['address']);
  $newnode->setAttribute("lat", $result[$i]['lat']);
  $newnode->setAttribute("lng", $result[$i]['lng']);
  $newnode->setAttribute("type", $result[$i]['type']);
}

echo $dom->saveXML();




?>