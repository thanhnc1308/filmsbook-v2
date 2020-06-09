<?php

/**
 * Class handle business logic for watchlist, liked film and review of user
 * @author NCThanh
 */
class ProfilesController extends BaseController {

    /**
     * action get data for /watchlist
     * @author NCThanh
     */
    function watchlist() {
        $sqlWatchList = "select activity.id as activity_id, film_id, user_id, title, avatar from project1.activity activity 
        inner join project1.films films on activity.film_id = films.id 
        inner join project1.users users on activity.user_id = users.id
        where users.id = 2 and activity.name = 'watchlist'
        order by activity.updated_at";
        $watchlist = $this->Profile->custom($sqlWatchList);
        $this->set('watchlist', $watchlist);
        $this->set('username', 'Username1');
        $this->set('numberOfWatch', count($watchlist));
    }

    /**
     * action get data for /watchlist
     * @author NCThanh
     */
    function like() {
        $sqlWatchList = "select activity.id as activity_id, film_id, user_id, title, avatar from project1.activity activity 
        inner join project1.films films on activity.film_id = films.id 
        inner join project1.users users on activity.user_id = users.id
        where users.id = 2 and activity.name = 'watchlist'
        order by activity.updated_at";
        $watchlist = $this->Profile->custom($sqlWatchList);
        $this->set('watchlist', $watchlist);
        $this->set('username', 'Username1');
        $this->set('numberOfWatch', count($watchlist));
    }

    // region override

    function beforeAction() {
        
    }

    function afterAction() {
        
    }

}
