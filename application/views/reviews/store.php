<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if($status == 0) {
    include(dirname(__DIR__) . '/../library/checklogin.php');
} else {
    header('Location: ' . $html->getHref('reviews'));
}