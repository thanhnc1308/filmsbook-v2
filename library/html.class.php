<?php

/**
 * to aid the template class
 * use a few standard functions for creating links, adding javascript and css
 * can be used only in the views 
 * e.g. $html->includeJs(‘generic.js’);
 */
class HTML {

    function includeImage($dir, $width, $height, $classList='') {
        $link = '<img class="' . $classList . '" width="' . $width . '" height="' . $height . '" src="' . BASE_PATH . '/public/img/' . $dir . '"/>';
        echo $link;
    }

    /**
     * func build href from base url
     * @author NCThanh
     */
    function getHref($url) {
        return BASE_PATH . '/' . $url;
    }

    function link($text, $path, $prompt = null, $confirmMessage = "Are you sure?") {
        $path = str_replace(' ', '-', $path);
        if ($prompt) {
            $data = '<a href="javascript:void(0);" onclick="javascript:jumpTo(\'' . BASE_PATH . '/' . $path . '\',\'' . $confirmMessage . '\')">' . $text . '</a>';
        } else {
            $data = '<a href="' . BASE_PATH . '/' . $path . '">' . $text . '</a>';
        }
        return $data;
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
