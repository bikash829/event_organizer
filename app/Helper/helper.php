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

function getRole($role)
{
    $roles = "";

    foreach ($role as $r) {
        $roles .= $r . ', ';
    }

    return rtrim($roles, ', ');


}

function formattedDate($date)
{
    $date = new DateTime($date);
    return $date->format('j F Y');
}