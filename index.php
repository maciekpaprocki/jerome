<?php

include 'vendor/autoload.php';

use MatthiasMullie\Minify;

define('BASE',dirname(__FILE__).'/hidden/');
define('DEV',true);

if(!DEV){
    $css = (new Minify\CSS(BASE.'style.css'))->minify();
}else{
    $css = file_get_contents(BASE.'style.css');
}
if(!DEV){
    $js = (new Minify\CSS(BASE.'script.js'))->minify();
}else{
    $js = file_get_contents(BASE.'script.js');
}

ob_start();
include BASE.'index.html';
$res = ob_get_contents();
ob_end_clean();
$res = str_replace(['{css}','{js}'], [$css,$js], $res);
if(!DEV){
    include BASE.'minifyhtml.php';
    $res = html_compress($res);
    echo $res;
}else{
    echo $res;
}

