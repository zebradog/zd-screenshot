<?php

$height = isset($_GET['height']) ? $_GET['height'] : 640;
$width = isset($_GET['width']) ? $_GET['width'] : 1080;
$url = isset($_GET['url']) ? $_GET['url'] : 'http://localhost/';
$delay = isset($_GET['delay']) ? $_GET['delay'] : 3;
$refresh = isset($_GET['refresh']) ? 1 : 0;
$name = md5($url.$height.$width);
$filename = $name.'-full.png';
$directory = getcwd().'/img';
$path = $directory.'/'.$filename;

if($refresh || !file_exists($path)){
	exec('/usr/bin/python '.getcwd().'/webkit2png.py -W '.$width.' -H '.$height.' -o '.$name.' -F -D '.$directory.' --delay='.$delay.' '.$url);
}

header('Content-type:image/png');

readfile($path);