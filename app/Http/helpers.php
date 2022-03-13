<?php
    function setActiveRoute($name)
    {
        return request()->routeIs($name) ? 'active' : '';
    }

    function menuOpen($name)
    {
        return request()->routeIs($name) ? 'menu-open' : '';
    }
