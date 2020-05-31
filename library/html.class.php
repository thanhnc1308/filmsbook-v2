<?php

/**
 * to aid the template class
 * use a few standard functions for creating links, adding javascript and css
 * can be used only in the views 
 * e.g. $html->includeJs(‘generic.js’);
 */
class HTML {

    function includeImage($dir, $width, $height) {
        $link = '<img width="' . $width . '" height="' . $height . '" src="' . BASE_PATH . '/public/img/' . $dir . '"/>';
        echo $link;
    }
    
    function includeIcon($iconName) {
        $link = '<link rel="shortcut icon" rel="stylesheet" href="' . BASE_PATH . '/public/img/' . $iconName . '" type="image/x-icon" />';
        echo $link;
    }

    function includeJs($fileName) {
        $link = '<script src="' . BASE_PATH . '/public/js/' . $fileName . '.js"></script>';
        echo $link;
    }

    function includeCss($fileName) {
        $link = '<link rel="stylesheet" href="' . BASE_PATH . '/public/css/' . $fileName . '.css" />';
        echo $link;
    }

}
