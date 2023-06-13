<?php
// Membuat objek SimpleXMLElement
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><MPD xmlns="urn:mpeg:dash:schema:mpd:2011" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="urn:mpeg:dash:schema:mpd:2011 DASH-MPD.xsd" profiles="urn:mpeg:dash:profile:isoff-live:2011" type="static" mediaPresentationDuration="PT0H2M30S"></MPD>');

// Membuat elemen Period
$period = $xml->addChild('Period');
$period->addAttribute('id', '0');

// Membuat elemen AdaptationSet
$adaptationSet = $period->addChild('AdaptationSet');
$adaptationSet->addAttribute('mimeType', 'video/mp4');
$adaptationSet->addAttribute('segmentAlignment', 'true');
$adaptationSet->addAttribute('startWithSAP', '1');
$adaptationSet->addAttribute('contentType', 'video');

// Membuat elemen Representation
$representation = $adaptationSet->addChild('Representation');
$representation->addAttribute('id', 'video_1');
$representation->addAttribute('bandwidth', '1000000');
$representation->addAttribute('width', '640');
$representation->addAttribute('height', '480');
$representation->addAttribute('frameRate', '30');

// Menambahkan elemen BaseURL untuk URL video
$baseURL = $representation->addChild('BaseURL', 'https://example.com/video_1.mp4');

// Menyimpan dokumen XML ke file MPD
$xml->asXML('video.mpd');
