<?php
class Dates
{
    function check_format($date, $format)
    {
        if(strcmp($date, date($format, strtotime($date))) == 0)
            return true;
        return false;
    }

    function to_sql_date($date)
    {
        return date("Y-m-d", strtotime($date));
    }

    function to_sql_datetime($datetime)
    {
        return date("Y-m-d h:i:s", strtotime($datetime));
    }
}
?>