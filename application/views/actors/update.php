<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if($actor_id)
    header('Location: ' . $html->getHref('actors/view/' . $actor_id));