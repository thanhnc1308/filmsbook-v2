<?php

/**
 * Set and get cache data
 * The data is stored in a flat text-file in the cache directory
 * i.e: the describe function of the SQLQuery class uses this cache function
 */
class Cache {

    function get($fileName) {
        $fileName = ROOT . DS . 'tmp' . DS . 'cache' . DS . $fileName;
        if (file_exists($fileName)) {
            $handle = fopen($fileName, 'rb');
            $variable = fread($handle, filesize($fileName));
            fclose($handle);
            return unserialize($variable);
        } else {
            return null;
        }
    }

    function set($fileName, $variable) {
        $fileName = ROOT . DS . 'tmp' . DS . 'cache' . DS . $fileName;
        $handle = fopen($fileName, 'a');
        fwrite($handle, serialize($variable));
        fclose($handle);
    }

}
