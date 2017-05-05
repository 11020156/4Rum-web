<?php

$context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
$url = 'https://raw.githubusercontent.com/11020156/4Rum/master/FOURum.xml';

// $xml = file_get_contents($url, false, $context);
// $xml = simplexml_load_string($xml);
// print_r($xml);

// $xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");
// echo $xml->book[0]['title'] . "<br>";
// echo $xml->book[0]['category'] . "<br>";
// echo $xml->book[0]['pubDate'] . "<br>";
// echo $xml->book[0]->enclosure['url']; 
// echo $xml->book[0]->enclosure['url']; 
// echo $xml->book[1]->title['lang']; 

foreach($xml->children() as $item) { 
    // echo $item->['title'] . "<br>";
    echo "<br>"; 
} 
?>