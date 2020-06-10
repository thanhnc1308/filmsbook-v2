<?php

class LiveSearchController {
    function beforeAction()
    {
    }

    function search($searchKey)
    {
        echo 'test' . $searchKey;
        return 'test';
    }

    function afterAction()
    {
    }
}
