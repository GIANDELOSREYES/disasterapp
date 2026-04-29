<?php
header("Content-Type: application/json");

$url = "https://earthquake.phivolcs.dost.gov.ph/feed/";

$xml = @simplexml_load_file($url);

$data = [];

if ($xml && isset($xml->channel->item)) {
    foreach ($xml->channel->item as $item) {

        $title = (string)$item->title;
        $time = strtotime((string)$item->pubDate);

        preg_match('/M([0-9.]+)/', $title, $m);
        $mag = $m[1] ?? 0;

        $data[] = [
            "mag" => $mag,
            "place" => $title,
            "time" => date("Y-m-d H:i:s", $time)
        ];
    }
}

echo json_encode($data);