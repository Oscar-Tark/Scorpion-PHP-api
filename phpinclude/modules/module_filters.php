<?php
class Filters
{
    function filter($value)
    {
        return filter_var(strip_tags($value), FILTER_SANITIZE_STRING);
    }

    function filter_name($value)
    {
        return preg_match("/^[a-zA-Z ]*$/",$value);
    }

    function filter_email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
?>
