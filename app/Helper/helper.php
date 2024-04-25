<?php

function isActiveRoute($route, $class = 'active')
{
    if (url()->current() == $route) {
        return $class;
    }
}


function isAnyRoute($route, $class = 'menu-open active')
{
    if (request()->is($route . "/*")) {
        return $class;
    }

}


function fullName($first_name = '', $last_name = '')
{
    return $first_name . ' ' . $last_name;
}