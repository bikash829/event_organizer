<?php

function isActiveRoute($route, $class = 'active')
{
    if (url()->current() == $route) {
        return $class;
    }
}


function isAnyRoute($route, $class = 'menu-open active')
{
    if (request()->is($route . "/*") || request()->is($route)) {
        return $class;
    }

}


// function fullName($first_name = '', $last_name = '') // get full name
// {
//     return $first_name . ' ' . $last_name;
// }
function fullName($user) // get full name
{
    return $user->first_name ?? '' . ' ' . $user->last_name ?? '';
}

function getRole($role) // get role names from array
{
    $roles = "";

    foreach ($role as $r) {
        $roles .= $r . ', ';
    }

    return rtrim($roles, ', ');


}

function formattedDate($date) // date format 25 January 2021
{
    $date = new DateTime($date);
    return $date->format('j F Y');
}

use Illuminate\Support\Str;

function wordLimit($string, $limit = 10) // limit words
{
    return Str::words($string, $limit);
}