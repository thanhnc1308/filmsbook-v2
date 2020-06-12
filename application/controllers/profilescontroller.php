<?php

/**
 * Class handle business logic for watchlist, liked film and review of user
 * @author NCThanh
 */
class ProfilesController extends BaseController
{
    /**
     * action get data for /watchlist
     * @author NCThanh
     */
    function watchlist($query = '')
    {
        $query = $this->prepareQuery($query);
        $sqlWatchList = "select activity.id as activity_id, film_id, user_id, title, avatar from " . DEFAULT_SCHEMA . ".activity activity 
        inner join " . DEFAULT_SCHEMA . ".films films on activity.film_id = films.id
        inner join " . DEFAULT_SCHEMA . ".users users on activity.user_id = users.id
        where users.id = " . $this->getUserId() . " and activity.name = 'watchlist'
        order by " . $query . ";";
        $watchlist = $this->Profile->custom($sqlWatchList);
        $this->set('watchlist', $watchlist);
        $this->set('numberOfWatch', count($watchlist));
    }

    /**
     * func prepare query from raw query
     * @author NCThanh
     */
    function prepareQuery($query)
    {
        if ($query) {
            $query = substr($query, 6);
            switch ($query) {
                case 'created_at':
                    $query = 'activity.created_at';
                    break;
                case 'title':
                    $query = 'films.title';
                    break;
                default:
                    $query = '';
                    break;
            }
        } else {
            $query = 'activity.updated_at';
        }
        return $query;
    }

    /**
     * action get data for /like
     * @author NCThanh
     */
    function likes()
    {
        $sqlLikeList = "select activity.id as activity_id, film_id, user_id, title, avatar from " . DEFAULT_SCHEMA . ".activity activity 
        inner join " . DEFAULT_SCHEMA . ".films films on activity.film_id = films.id
        inner join " . DEFAULT_SCHEMA . ".users users on activity.user_id = users.id
        where users.id = " . $this->getUserId() . " and activity.name = 'like'
        order by activity.updated_at";
        $likeList = $this->Profile->custom($sqlLikeList);
        $this->set('likelist', $likeList);
    }

    /**
     * func do add a film to watchlist
     * @author NCThanh
     */
    function addWatchList()
    {
        $this->doNotRenderHeader = 1;
        $filmId = $_POST['filmId'];
        $userId = $_POST['userId'];
        $sql = "insert into " . DEFAULT_SCHEMA . ".activity (film_id,user_id,name,created_at,updated_at) VALUES (" . $filmId . "," . $userId . ",'watchlist',now() ,now());";
        $result = $this->Profile->executeCommand($sql);
        echo $result;
    }

    /**
     * func do add a film to watchlist
     * @author NCThanh
     */
    function addLike()
    {
        $this->doNotRenderHeader = 1;
        $filmId = $_POST['filmId'];
        $userId = $_POST['userId'];
        $sql = "insert into " . DEFAULT_SCHEMA . ".activity (film_id,user_id,name,created_at,updated_at) VALUES (" . $filmId . "," . $userId . ",'like',now() ,now());";
        $result = $this->Profile->executeCommand($sql);
        echo $result;
    }

    /**
     * func do add a film to watchlist
     * @author NCThanh
     */
    function removeActivity()
    {
        $this->doNotRenderHeader = 1;
        $activityId = $_POST['activityId'];
        $sql = "delete from " . DEFAULT_SCHEMA . ".activity where id = " . $activityId . ";";
        $result = $this->Profile->executeCommand($sql);
        echo $result;
    }

    // region override

    function beforeAction()
    {
        include(dirname(__DIR__).'/../library/checklogin.php');
    }

    function afterAction()
    {
    }
}
