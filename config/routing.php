<?php

/**
 * specify default controller and action
 * can also specify custom redirects using regular expressions
 * redirect i.e. http://localhost/framework/admin/categories/view 
 * will become http://localhost/framework/admin/categories_view 
 * where admin is the controller and categories_view is the action
 * This will enable us to create an administration centre with pretty URLs.
 */
$routing = array(
    '/profiles\z/' => 'profiles/watchlist'
//    '/admin\/(.*?)\/(.*?)\/(.*)/' => 'admin/\1_\2/\3'
);

$default['controller'] = 'films';
$default['action'] = 'index';
