<?php
/**
 * application core functions
 */

/**
 * @return string
 * return base url of application
 */
function getBaseUrl(){

    return "http://localhost/paw/personalManager/";
}

function getActionUrl($action){

    return getBaseUrl().'src/'.$action.'.php';
}