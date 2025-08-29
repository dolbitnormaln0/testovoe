<?php
$response = file_get_contents("https://catfact.ninja/facts");
$data = json_decode($response, true);
$lastPage = $data['last_page'];
$response = file_get_contents("https://catfact.ninja/facts?page=" . $lastPage);
$pageData = json_decode($response, true);
$shortest = null;
$text=0;
foreach ($pageData['data'] as $fact) {
    if  ($fact['length'] < $shortest || $shortest==0) {
        $shortest = $fact['length'];
        $text = $fact['fact'];
    }
}
echo "Самый короткий факт с последней страницы имеет длину " . $shortest."</br>";
echo $text;
