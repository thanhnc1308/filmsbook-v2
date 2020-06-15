<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Film extends BaseModel {
    var $hasManyAndBelongsToMany = array(
        'Genre' => 'Genre',
        'Company' => 'Company',
        'Country' => 'Country',
        'Actor' => 'Actor'
    );
    
    var $hasMany = array(
        'Review' => 'Review'
    );

    /**
     * func get activity_id of watchlist
     * @author NCThanh
     */
    function getStatusWatchList($userId, $filmId) {
        $filmId = $this->escapeSecureSQL($filmId);
        $sqlWatchList = "select activity.id as activity_id from " . DEFAULT_SCHEMA . ".activity activity 
        where user_id = " . $userId . " and film_id = " . $filmId . " and activity.name = 'watchlist' ;";
        $watchlist = $this->custom($sqlWatchList);
        if ($watchlist && count($watchlist) > 0) {
            return $watchlist[0]['Activity']['activity_id'];
        } else {
            return -1;
        }
    }

    /**
     * func get activity_id of like
     * @author NCThanh
     */
    function getStatusLike($userId, $filmId) {
        $filmId = $this->escapeSecureSQL($filmId);
        $sqlLike = "select activity.id as activity_id from " . DEFAULT_SCHEMA . ".activity activity 
        where user_id = " . $userId . " and film_id = " . $filmId . " and activity.name = 'like' ;";
        $watchlist = $this->custom($sqlLike);
        if ($watchlist && count($watchlist) > 0) {
            return $watchlist[0]['Activity']['activity_id'];
        } else {
            return -1;
        }
    }
}