<?php

function hrefType($link_type, $result)
{
    if ($link_type == 1) {
        return '#';
    }
    if ($link_type == 2) {
        return $result;
    }
    if ($link_type == 3) {
        return url()->current() . $result;
    }
    if ($link_type == 4) {
        return $result;
    }
    if ($link_type == 5) {
        return $result;
    }
    return $result;
}

function targetType($link_type)
{
    $result = '';
    $self = '_self';
    $blank = '_blank';

    if ($link_type == 2) {
        $result = $self;
        return $result;
    }
    if ($link_type == 3) {
        $result = $blank;
        return $result;
    }
    if ($link_type == 4) {
        $result = $self;
        return $result;
    }
    if ($link_type == 5) {
        $result = $blank;
        return $result;
    }
    return $result;
}
