<?php

function validate_string($str)
{
    return trim(htmlspecialchars(substr($str, 0, 200), ENT_QUOTES, 'UTF-8')) ?? '';
}

function validate_int($int)
{
    return (int) $int;
}
