<?php




function isActiveRoute($route, $class = 'active')
{
    if (url()->current() == $route) {
        // if (request()->is($route)) {

        return $class;
    }
}


function isAnyRoute($route, $class = 'menu-open active')
{
    if (request()->is($route . "/*")) {
        return $class;
    }

}
