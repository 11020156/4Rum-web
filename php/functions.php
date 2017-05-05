<?php

$curl = curl_init();
curl_setopt_array($curl, Array(
  CURLOPT_URL            => 'https://raw.githubusercontent.com/11020156/4Rum/master/FOURum.xml',
  CURLOPT_USERAGENT      => 'spider',
  CURLOPT_TIMEOUT        => 120,
  CURLOPT_CONNECTTIMEOUT => 30,
  CURLOPT_RETURNTRANSFER => TRUE,
  CURLOPT_ENCODING       => 'UTF-8'
));
$data = curl_exec($curl);
curl_close($curl);
$xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);
//die('<pre>' . print_r($xml], TRUE) . '</pre>');
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>

<?php 
foreach ($xml->channel->item as $item) {

  $e_title       = (string)$item->title; 
$e_link        = (string)$item->link; 
$e_pubDate     = (string)$item->pubDate; 
$e_description = (string)$item->description; 
$e_guid        = (string)$item->guid; 

$e_content     = $item->children("itunes", true);
$e_encoded     = (string)$e_content->image; 
// echo "$e_encoded";

    echo '<div data-role="page" id="page">';
    echo '<h2><a href="' . $item->link . '">' . $item->title . '</a></h2>';
    echo '<p>' . $item->itunesimages . '<a href="' . $item->link . '">Read more: ' . $item->itunesimages . '</a></p>';
    echo '<img src="' . $e_encoded . '" width="100" height="100" alt="' . $item->featuredImage->img['src'] . '" class="' . $item->featuredImage->img['class'] . '">';
    echo '<p>' . $item->description . '<a href="' . $item->link . '">Read more: ' . $item->title . '</a></p>';
    echo '</div>';


}
// foreach ($xml->channel->item as $item) {
//   $creator = $item->children('dc', TRUE);
//   echo '<h2>' . $item->title . '</h2>';
//   echo '<p>pubDate: ' . $item->pubDate . '</p>';
//   echo '<p>category: ' . $item->category . '</p>';
//   echo '<p>summary: ' . $item->itunes . '</p>';
//   echo '<p>url: ' . $item->enclosure['url'] . '</p>';
//   echo '<p>' . $item->description . '</p>';
//   echo '<p><a href="' . $item->link . '">Read more: ' . $item->title . '</a></p>';
// }
?>

</body>
</html>

<!-- https://gist.github.com/betweenbrain/5405671 -->