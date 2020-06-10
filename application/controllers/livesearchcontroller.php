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
        $sql = "select * from " . DEFAULT_SCHEMA . ".films films where films.title COLLATE UTF8_GENERAL_CI LIKE '%" . $searchKey . "%' order by updated_at;";
        $result = $this->model->custom($sql);
        echo $this->prepareSearchResult($result);
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
    function prepareLinkFilmTemplate($film) {
        return '<div class="link-film"><a href="' . BASE_PATH . '/films/view/' . $film['Film']['id'] . '" class="fw-bold no-underline rounded" target="_blank">' . $film['Film']['title'] . '</a></div>';
    }
    // endregion private

    // region override

    function beforeAction()
    {
    }

    function afterAction()
    {
    }
}
