<?php
/**
 * Created by PhpStorm.
 * User: zaidoh
 * Date: 05/01/18
 * Time: 18:10
 */
function layout(){
return \Request::is('admin/*')?'layouts.admin':'layouts.app';
}

function isAdmin(){
    return \Request::is('admin/*')? true:false;
}