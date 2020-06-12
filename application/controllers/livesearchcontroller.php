<?php

/**
 * class handles live search on navbar input search
 * @author NCThanh
 */
class LiveSearchController
{
    private $model;

    function __construct()
    {
        $this->model = new BaseModel();
    }

    /**
     * func do search on search key
     * @author NCThanh
     */
    function search($searchKey)
    {
        // prepare search key
        $searchKey = $this->prepareSearchKey($searchKey);
        $sql = "select * from " . DEFAULT_SCHEMA . ".films films where films.title LIKE '%" . $searchKey . "%' order by updated_at;";
        $result = $this->model->custom($sql);
        echo $this->safe_json_encode($result);
        // echo $this->prepareSearchResult($result);
    }

    // region private
    /**
     * func prepare and escape sql injection search key
     * @author NCThanh
     */
    function prepareSearchKey($searchKey)
    {
        $searchKey = substr($searchKey, 3, strlen($searchKey) - 3);
        $searchKey = urldecode($searchKey);
        return $this->model->escapeSecureSQL($searchKey);
    }

    /**
     * func prepare response text
     * @author NCThanh
     */
    function prepareSearchResult($result)
    {
        if (count($result) == 0) {
            return 'Not found!';
        } else {
            $hint = "";
            foreach ($result as $film) {
                $hint = $hint . $this->prepareLinkFilmTemplate($film);
            }
            return $hint;
        }
    }

    /**
     * func prepare link tag to render in client
     * @author NCThanh
     */
    function prepareLinkFilmTemplate($film)
    {
        return '<div class="link-film"><a href="' . BASE_PATH . '/films/view/' . $film['Film']['id'] . '" class="fw-bold no-underline rounded" target="_blank">' . $film['Film']['title'] . '</a></div>';
    }
    // endregion private

    function safe_json_encode($value, $options = 0, $depth = 512, $utfErrorFlag = false)
    {
        $encoded = json_encode($value, $options, $depth);
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                return $encoded;
            case JSON_ERROR_DEPTH:
                return 'Maximum stack depth exceeded';
            case JSON_ERROR_STATE_MISMATCH:
                return 'Underflow or the modes mismatch';
            case JSON_ERROR_CTRL_CHAR:
                return 'Unexpected control character found';
            case JSON_ERROR_SYNTAX:
                return 'Syntax error, malformed JSON';
            case JSON_ERROR_UTF8:
                $clean = $this->utf8ize($value);
                if ($utfErrorFlag) {
                    return 'UTF8 encoding error';
                }
                return $this->safe_json_encode($clean, $options, $depth, true);
            default:
                return 'Unknown error';
        }
    }

    function utf8ize($mixed)
    {
        if (is_array($mixed)) {
            foreach ($mixed as $key => $value) {
                $mixed[$key] = $this->utf8ize($value);
            }
        } else if (is_string($mixed)) {
            return utf8_encode($mixed);
        }
        return $mixed;
    }

    // region override

    function beforeAction()
    {
    }

    function afterAction()
    {
    }
}
